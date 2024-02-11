<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\Inertia;
use App\Models\Aduan;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index(): Response {
        $totalAduan = Aduan::count();
        $totalUser = User::count();
    }
}
