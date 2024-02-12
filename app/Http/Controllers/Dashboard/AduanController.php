<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAduanRequest;
use App\Http\Resources\AduanWithLastStatusResource;
use Illuminate\Http\Request;
use App\Models\Aduan;
use App\Models\User;
use App\Models\AduanStatus;
use Inertia\Inertia;
use Inertia\Response;
use App\Services\FooterService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AduanController extends Controller
{
    
}
