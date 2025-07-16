<?php

namespace App\Services\Impl;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\LoginServiceInterface;
use App\User;

class OwnerLoginService implements LoginServiceInterface
{
    public function login(array $credentials): bool
    {
        
      return Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);
    }
} 
