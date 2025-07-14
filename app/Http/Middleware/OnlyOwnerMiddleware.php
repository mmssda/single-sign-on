<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OnlyOwnerMiddleware
{
   
    public function handle($request, Closure $next)
    {
          if (Auth::check() && Auth::user()->user_type === 'owner') {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
