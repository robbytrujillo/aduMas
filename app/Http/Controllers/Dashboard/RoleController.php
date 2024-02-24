<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Request as Requests;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use Inertia\Inertia;
use Inertia\Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response {
        $perPage = request('perPage') ?: 5;

        $roles = Role::query()
            ->when(request('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate($perPage)
            ->appends(request()->query());

        $roles = RoleResource::collection($roles);

        $filters = request()->only(['search', 'perPage']);

        return Inertia::render('Admin/Roles/RoleIndex', compact('roles', 'filters'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response {
        return Inertia::render('Admin/Roles/Create', [
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request) {
        $role = Role::create(['name' => $request->name]);
        if ($request->has('permission')) {
            $role->syncPermissions($request->input('permissions.*.name'));
        }
        return to_route('roles.index');
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $role = Role::findById($id);
        $role->load('permissions');

        return Inertia::render('Admin/Roles/Edit', [
            'role' => new RoleResource('role'),
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, string $id) {
        $role = Role::findById($id);
        $role->update([
            'name' => $request->name
        ]);

        $role->syncPermissions($request->input('permissions.*.name'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $role = Role::findById($id);
        $role->delete();
        return back();
    }

}

