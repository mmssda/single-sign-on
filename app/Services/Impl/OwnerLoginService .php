<?php

namespace App\Services\Impl;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\LoginServiceInterface;

class OwnerLoginService implements LoginServiceInterface
{
     public function login(array $credentials): array
    {

      
        $user = User::where('email', $credentials['email'])
                    ->where('role', 'owner')
                    ->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return ['success' => false, 'message' => 'Email atau password salah'];
        }

        Auth::login($user);

        return [
            'success' => true,
            'redirect' => route('owner.dashboard'),
        ];
    }
} 