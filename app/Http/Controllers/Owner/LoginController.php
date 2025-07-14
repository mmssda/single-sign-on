<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\LoginServiceInterface;

class LoginController extends Controller
{
    
    private $loginService;

    public function __contruct(LoginServiceInterface $loginService)
    {
        $this->$loginService = $loginService; 
    }

  
    public function login(Request $request)
    {
        return $this->loginService->login($request->only('email', 'password'));
    }
}
