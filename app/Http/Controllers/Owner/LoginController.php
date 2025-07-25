<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Contracts\OwnerServiceInterface;

class LoginController extends Controller
{
    
    protected $loginService;

    public function __construct(OwnerServiceInterface $loginService)
    {
       
        $this->loginService = $loginService; 
    
    }

  
    public function login(Request $request)
    {
       
        $credentials = $request->only('email', 'password');

        if ($this->loginService->login($credentials)) {
            // Redirect ke halaman yang dimaksud sebelumnya atau ke default
           return redirect()->route('owner.dashboard');
        }

    
        return back()->withErrors(['email' => 'Login gagal']);
    }
}
