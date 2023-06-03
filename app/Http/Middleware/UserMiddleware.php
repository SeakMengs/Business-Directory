<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    protected $guard;

    public function __construct()
    {
        // dd(Auth::guard('normalUser')->check(), Auth::guard('companyUser')->check());

        // because we use multiple guards, we need to check which guard is currently logged in
        if (Auth::guard('normalUser')->check()) {
            $guard = 'normalUser';
        } else if (Auth::guard('companyUser')->check()) {
            $guard = 'companyUser';
        } else {
            $guard = null;
        }

        $this->guard = $guard;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if ($this->guard) {
            if (Auth::guard($this->guard)->user()->role == $role) {

                // get current dynamic name from route
                $currentName = $request->route()->parameter('name');

                // prevent user with the same role from accessing other user's data
                if (Auth::guard($this->guard)->user()->name != $currentName) {
                    return response("You do not have access to view " . $currentName . '\'s data', 401);
                }

                // if the user is authorized, continue with the request
                return $next($request);

            } else if (Auth::guard($this->guard)->user()->role != $role) {

                return response("You are a " . $this->guard . " but you try to access " . $role . ' page, unauthorized', 401);

            }
        }

        // return an unauthorized page if the user is not authorized (not logged in or not the correct role)
        return response()->view('unauthorized', [], 401);
    }
}
