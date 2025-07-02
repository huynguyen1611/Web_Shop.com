<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        // dd(Auth::user()->role->name);
        if (!$user) {
            return redirect()->route('auth.admin')->with('error', 'Bạn phải đăng nhập để truy cập vào trang này!'); // hoặc login route
        }

        $userRole = strtolower($user->role->name); // ép về chữ thường
        $roles = array_map('strtolower', $roles);  // ép các role được truyền vào cũng về chữ thường

        if (!in_array($userRole, $roles)) {
            abort(403, 'Bạn không có quyền truy cập vào trang này.');
        }

        return $next($request);
    }
}
