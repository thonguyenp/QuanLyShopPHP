<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissions): Response
    {
        $user = Auth::guard('admin')->user();

        // Không đăng nhập
        if (!$user) {
            abort(403, 'Bạn không có quyền truy cập');
        }

        // Người dùng không có role, hoặc role không có quyền đó
        if (
            !$user->role ||
            !$user->role->permissions->contains('name', $permissions)
        ) {
            abort(403, 'Bạn không có quyền truy cập');
        }

        return $next($request);
    }

}
