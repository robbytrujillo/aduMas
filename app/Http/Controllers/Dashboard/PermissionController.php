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

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response {
        return Inertia::render('Admin/Permissions/create');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request) {
        Permission::create($request->validated());
        return to_route('permissions.index');
    }

     /**
     * Display the specified resource.
     */
    public function show(String $id) {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $permission = Permission::findById($id);

        return Inertia::render('Admin/Permissions/Edit', [
            'permission' => new PermissionResource($permission)
        ]);
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(StorePermissionRequest $request, string $id) {
        $permission = Permission::findById($id);
        $permission->update($request->validated());
        return to_route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public  function destroy(string $id) {
        $permission = Permission::findById($id);
        $permission->delete();
        return back();
    }
}
