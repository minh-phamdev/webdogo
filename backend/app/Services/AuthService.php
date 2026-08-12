<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(array $data): array
    {
        return DB::transaction(function () use ($data) {
            $activeStatus = UserStatus::where('code', 'ACTIVE')->first();

            if (!$activeStatus) {
                throw new \RuntimeException(
                    'User status ACTIVE chưa được cấu hình.'
                );
            }

            $customerRole = Role::where('code', 'CUSTOMER')->first();

            if (!$customerRole) {
                throw new \RuntimeException(
                    'Role CUSTOMER chưa được cấu hình.'
                );
            }

            $user = User::create([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'] ?? null,
                'password' => $data['password'],
                'status_id' => $activeStatus->id,
            ]);

            $user->roles()->attach($customerRole->id);

            $token = $user->createToken('auth-token')->plainTextToken;

            return [
                'user' => $user->load(['roles', 'status']),
                'token' => $token,
                'token_type' => 'Bearer',
            ];
        });
    }
public function login(array $data): array
{
    $user = User::with(['roles', 'status'])
        ->where('email', $data['email'])
        ->first();

    if (!$user || !password_verify($data['password'], $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Email hoặc mật khẩu không chính xác.'],
        ]);
    }

    if (!$user->status || $user->status->code !== 'ACTIVE') {
        throw ValidationException::withMessages([
            'email' => ['Tài khoản hiện không thể đăng nhập.'],
        ]);
    }

    $token = $user->createToken('auth-token')->plainTextToken;

    return [
        'user' => $user,
        'token' => $token,
        'token_type' => 'Bearer',
    ];
}
    }
