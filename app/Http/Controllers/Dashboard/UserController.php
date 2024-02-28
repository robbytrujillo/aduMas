<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Inertia\Response;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response {
        $perPage = request('perPage') ?: 5;

        $users = User::query() 
            ->when(request('search'), function($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->paginate($perPage)
            ->appends(request()->query());

        $users = UserResource::collection($users);

        $filters = request()->only(['search', 'perPage']);

        return Inertia::render('Admin/Users/UserIndex', compact('users', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response {
        return Inertia::render('Admin/Users/Create', [
            'roles' => RoleResource::collection(Role::all()),
            'permissions' => PermissionResource::collection(Permission::all()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::default()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->input('roles.*.name'));
        $user->syncPermissions($request->input('permissions.*.name'));
        return to_route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public  function show(String $id) {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) {
        $user->load(['roles', 'permissions']);
        return Inertia::render('Admin/Users/Edit', [
            'user' => new UserResource($user),
            'roles' => RoleResource::collection(Role::all()),
            'permissions' => PermissionResource::collection(Permission::all()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string|maxL255',
            'email' => 'required|string|email|max:255|' . Rule::unique('users', 'email')->ignore($user),
            'roles' => ['sometimes', 'array'],
            'permissions' => ['sometimes', 'array'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->input('roles.*.name'));
        $user->syncPermissions($request->input('permissions.*.name'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) {
        $user->delete();
        return back();
    }

}    


