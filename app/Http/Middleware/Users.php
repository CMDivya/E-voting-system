<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Users
{
public function handle($request, Closure $next)
    {
        if(Auth::user()->type == 'voter'){
            redirect()->route('vote.index');
            return $next($request);
        } else {
            abort(404);
        }
    }
}