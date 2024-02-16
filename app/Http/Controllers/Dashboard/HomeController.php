<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Resources\PostResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\AduanResource;
use App\Models\Post;
use App\Models\tag;
use App\Models\Aduan;
use App\Services\FooterService;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function home() {
        $categories = CategoryResource::collection(Category::latest()->take(4)->get());
        $posts = PostResource::collection(Post::latest()->take(4)->get());
        $tags = TagResource::collection(Tag::all());
        $dataTags = TagResource::collection(Tag::all());
        $aduans = AduanResource::collection(Aduan::latest()->take(4)->get());
        $footerData = FooterService::getFooterData();
        return Inertia::render('Home', compact('categories', 'posts', 'dataTags', 'tags', 'aduans', 'footerData'));
    }
}
