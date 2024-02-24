<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Aduan;
use Illuminate\Support\Str;
use Inertia\Response;
use Inertia\Inertia;
use App\Http\Requests\StoreTagRequest;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\TagResource;
use App\Http\Resources\AduanWithLastStatusResource;
use App\Services\FooterService;

class TagController extends Controller
{
    public function index() {
        $perPage = request('perPage') ?: 5;

        $tags = Tag::query()
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate($perPage)
            ->appends(request()->query());

        $posts = TagResource::collection($tags);

        $filters = request()->only(['search', 'perPage']);

        return Inertia::render('Admin/Tags/TagIndex', compact('tags', 'filters'));
    }

    public function create() {
        return Inertia::render('Admin/Tags/Create');
    }

    public function store(StoreTagRequest $request) {
        $tag = Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        return redirect()->route('tags.index');
    }
}
