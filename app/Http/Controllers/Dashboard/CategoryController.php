<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(): Response {
        $perPage = request('perPage') ?: 5;

        $categories = Category::query()
            ->when(request('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate($perPage)
            ->appends(request()->query());

        $categories = CategoryResource::collection($categories);
        
        $filters = request()->only(['search', 'perPage']);

        return Inertia::render('Admin/Categories/CategoryIndex', compact('categories', 'filters'));
    }

    public function create(): Response {
        $this->authorize('create', Category::class);
        return Inertia::render('Admin/Categories/Create');
    }

    public function store(StoreCategoryRequest $request) {
        $this->authorize('create', Category::class);
        $image = $request->file('image');
        $image->storeAs('pubic/categories', $image->hashName());

        $category = Category::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);

        $category->save();
        if ($category) {
            // return success with Api Resource
            return redirect()->route('categories.index');
        }
    }

    public function edit(Category $category): Response {
        $this->authorize('update', $category);
        return Inertia::render('Admin/Categories/Edit', [
            'category' => new CategoryResource($category)
        ]);
    }

    public function update(Request $request, Category $category): RedirectResponse {
        $category->name = $request->name;

        $category->slug = Str::slug($request->name, '-');
        if ($request->file('image') && $request->file('image')->isValid()) {
            Storage::disk('local')->delete('public/categories/' .basename($category->image));

            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hashName());
            $category->image = $image->hashName();
        }

        $category->save();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category) {
        $this->authorize('delete', $category);
        Storage::delete($category->image);
        $category->delete();
        return back();
    }
}
