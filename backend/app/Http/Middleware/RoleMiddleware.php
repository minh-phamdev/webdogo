<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {
        $user = $request->user();

        // Chưa đăng nhập
        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }

        // Tài khoản không ACTIVE
        if (!$user->status || $user->status->code !== 'ACTIVE') {
            return response()->json([
                'message' => 'Tài khoản không hoạt động.',
            ], 403);
        }

        // Lấy danh sách role của user
        $userRoles = $user->roles
            ->pluck('code')
            ->toArray();

        // Kiểm tra role
        foreach ($roles as $role) {
            if (in_array($role, $userRoles, true)) {
                return $next($request);
            }
        }

        // Không có quyền
        return response()->json([
            'message' => 'Bạn không có quyền thực hiện thao tác này.',
        ], 403);
    }
}
