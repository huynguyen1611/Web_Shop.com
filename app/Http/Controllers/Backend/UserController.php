<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $userService;
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $query = User::query();
        if ($request->keyword) {
            $query->where('name', 'LIKE', '%' . $request->keyword . '%');
        }
        if ($request->filled('role_id') && $request->role_id != 0) {
            $query->where('role_id', $request->role_id);
        }
        $roles = Role::all();
        $users = $this->userService->paginate();
        $users = $query->latest()->paginate(15);
        // $users = $query->latest()->get();
        // $users = User::paginate(15);
        return view('backend.user.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
