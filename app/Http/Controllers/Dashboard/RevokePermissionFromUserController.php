<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RevokePermissionFromUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, Permission $permission): RedirectResponse {
        $user->revokePermissionTo($permission);
        return back();
    }
}
