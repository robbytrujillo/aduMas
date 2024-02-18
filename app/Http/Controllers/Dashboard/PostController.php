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
    //
}
