<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class UsersRoleMiddleware
{

    public function handle($request, Closure $next, $guard = null)
    {
        if ( $request->user()->hasAnyRole(['CEO', 'Admin','Analyst','Finance']) ) {
            return $next($request);
        }

        return redirect('/myloan');
    }
}
