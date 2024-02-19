<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TagResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request as Requests;
use Inertia\Response;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use App\Services\FooterService;

class PostController extends Controller
{
    public function index(): Response {
        $perPage = request('perPage') ?: 5;

        $posts = Post::with('user', 'category')
            ->when(request('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->paginate($perPage)
            ->appends(request()->query());

        $posts = PostResource::collection($posts);

        $filters = request()->only(['search', 'perPage']);

        return Inertia::render('Admin/Posts/PostIndex', compact('posts', 'filters'));
    }

    public function create(): Response {
        $this->authorize('create', [Post::class]);
        return Inertia::render('Admin/Posts/Create', [
            'categories' => CategoryResource::collection(Category::all()),
            'tags' => TagResource::collection(Tag::all())
        ]);
    }

    public function store(StorePostRequest $request) {
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        $post = Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'category_id' => $request->selectedCategory,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
            'description' => $request->description
        ]);

        $post->tags()->attach($request->tags);

        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(Post $post) {
        $post->load(['category', 'tags']);

        return Inertia::render('Admin/Posts/Edit', [
            'post' => new PostResource($post),
            'categories' => CategoryResource::collection(Category::all()),
            'tags' => TagResource::collection(Tag::all()),
        ]);
    }

    public function show($slug) {
        $post = Post::with('user', 'category', 'tags')->where('slug', $slug)->first();

        if ($post) {
            $post->increment('views_count');
            $popularPosts = Post::orderBy('views_count', 'desc')
                ->whereNotIn('id', [$post->id])
                ->take(3)
                ->get();
            
            $categories = Category::all();
            $categoryCounts = [];
            foreach ($categories as $category) {
                $count = Post::whereHas('category', function ($query) use ($category) {
                    $query->where('id', $category->id);
                })->count();

                $categoryCounts[] = [
                    'name' => $category->name,
                    'total' => $count,
                    'slug' => $category->slug
                ];
            }

            $tags = Tag::all();
            $tagCounts = [];
            foreach ($tags as $tag) {
                $count = $tag->posts()->count();

                $tagCounts[] = [
                    'name' => $tag->name,
                    'total' => $count,
                    'slug' => $tag->slug
                ];
            }

            $footerData = FooterService::getFooterData();
            return Inertia::render('Post/Detail', [
                'post' => new PostResource($post),
                'popularPosts' => PostResource::collection($popularPosts),
                'categoryCounts' => $categoryCounts,
                'tagCounts' => $tagCounts,
                'footerData' => $footerData,
            ]);
        } else {
        }
    }

    public function update(Request $request, Post $post): RedirectResponse {
        $request->validate([
            'category' => 'required|exists:categories,name',
        ]);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->slug = Str::slug($request->title, '-');
        $category = Category::where('name', '$request->category')->first();
        $post->category_id = $category->id;
        $post->tags()->sync($request->tags);

        if ($request->file('image') && $request->file('image')->isValid()) {
            Storage::disk('local')->delete('public/posts/'.basename($post->image));
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
            $post->image = $image->hashName();
        }

        $post->save();
        return redirect()->route('posts.index');
    }

    public function postByTag($slug) {
        $tag = Tag::where('slug', $slug)->first();

        if ($tag) {
            $posts = Post::with('user', 'tags')
                ->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tags.id', $tag->id);
                })->paginate(10);

            $postCount = Post::whereHas('tags', function ($query) use ($tag) {
                $query->where('tags.id', $tag->id);
            })->count();

            $footerData = FooterService::getFooterData();
            return Inertia::render('Post/PostByTag', [
                'tag' => new CategoryResource($tag),
                'posts' => PostResource::collection($posts),
                'postCount' => $postCount,
                'footerData' => $footerData,
            ]);
        } else {
        }
    }
    public function postByCategory($slug) {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $posts = Post::with('user', 'category')
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('category_id', $category->id);
                })->paginate(10);

            $postCount = Post::whereHas('category', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            })->count();

            $footerData = FooterService::getFooterData();
            return Inertia::render('Post/PostByCategory', [
                'category' => new CategoryResource($category),
                'posts' => PostResource::collection($posts),
                'postCount' => $postCount,
                'footerData' => $footerData,
            ]);
        } else {
        }
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}



