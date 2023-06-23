<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    protected $guard;
    protected $currentUserId;

    public function __construct()
    {
        // dd(Auth::guard('normalUser')->check(), Auth::guard('companyUser')->check());

        // because we use multiple guards, we need to check which guard is currently logged in
        if (Auth::guard('normalUser')->check()) {
            $guard = 'normalUser';
            $currentUserId = Auth::guard('normalUser')->user()->normal_user_id;
        } else if (Auth::guard('companyUser')->check()) {
            $guard = 'companyUser';
            $currentUserId = Auth::guard('companyUser')->user()->company_user_id;
        } else {
            $guard = null;
            $currentUserId = null;
        }

        $this->guard = $guard;
        $this->currentUserId = $currentUserId;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // role is the middleware parameter
    public function handle(Request $request, Closure $next, $role)
    {

        if ($this->guard) {
            if (Auth::guard($this->guard)->user()->role == $role) {

                // check if user has been banned
                if (Auth::guard($this->guard)->user()->is_banned) {
                    Auth::guard($this->guard)->logout();

                    $redirectTo = $this->guard == 'normalUser' ? 'login.user' : 'login.company';
                    return redirect()->route($redirectTo)->withErrors(['error' => 'The account has been banned']);
                }

                // get current dynamic name from route
                $currentName = $request->route()->parameter('name');
                $currentId = $request->route()->parameter('id');

                if ($currentName) {
                    // if currentName and currentId is not null, check if the user is authorized to access the data
                    if (Auth::guard($this->guard)->user()->name != $currentName || $currentId != $this->currentUserId) {
                        // prevent user with the same role from accessing other user's data
                        return response("You do not have access to view " . $currentName . '\'s data', 401);
                    }
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
