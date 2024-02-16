<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Request as Requests;
use App\Http\Resources\PermissionResource;
use App\Http\Requests\StorePermissionRequest;
use Inertia\Response;
use Inertia\Inertia;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response {
        $perPage = request('perPage') ?: 5;

        $permissions = Permission::query()
            ->when(request('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate($perPage)
            ->appends(request()->query());

        $permissions = PermissionResource::collection($permissions);

        $filters = request()->only(['search', 'perPage']);

        return Inertia::render('Admin/Permissions/PermissionIndex', compact('permissions', 'filters'));
    }
}
