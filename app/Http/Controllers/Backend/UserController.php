<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;

class UserController extends Controller
{
    private $userService;
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->paginate();
        // $users = User::paginate(15);
        return view('backend.user.index', [
            'users' => $users,
        ]);
    }
}
