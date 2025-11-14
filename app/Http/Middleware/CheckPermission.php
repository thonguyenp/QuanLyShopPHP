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

        // Kiểm tra quyền của người dùng
        if (!$user || !$user->role->$permissions->contain('name', $permissions))
        {
            abort(403, 'Bạn không có quyền truy cập');
        }
        return $next($request);
    }
}
