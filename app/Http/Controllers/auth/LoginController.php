<?php

namespace App\Http\Controllers\auth;

use App\Models\CompanyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NormalUser;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginOption()
    {
        return view('login-option');
    }

    public function companyUserLoginView()
    {
        return view('company-user-login');
    }

    public function normalUserLoginView()
    {
        return view('normal-user-login');
    }

    public function companyUserLogin(Request $request)
    {
        $validate = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
            ]
        );

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::guard('companyUser')->attempt($credentials)) {

            if (Auth::guard('companyUser')->user()->role == 'companyUser') {
                // logout from companyUser guard if normalUser is logged in
                Auth::guard('normalUser')->logout();

                // check if user has been banned
                if (Auth::guard('companyUser')->user()->is_banned) {
                    Auth::guard('companyUser')->logout();
                    return redirect()->back()->withErrors(['error' => 'The account has been banned']);
                }

                do {
                    $token = Str::random(80);
                } while (CompanyUser::where('api_token', $token)->first());

                CompanyUser::where('company_user_id', Auth::guard('companyUser')->user()->company_user_id)->update([
                    'api_token' => $token
                ]);

                return redirect()->route('user.company.name.id.profile', [
                    'name' => Auth::guard('companyUser')->user()->name,
                    'id' => Auth::guard('companyUser')->user()->company_user_id
                ])->with('success', 'Login success');
            }

        } else {
            return redirect()->back()->withErrors(['error' => 'Credentials does not match']);
        }
    }

    public function normalUserLogin(Request $request)
    {
        $validate = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
            ]
        );

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];


        if (Auth::guard('normalUser')->attempt($credentials)) {
            if (Auth::guard('normalUser')->user()->role == 'normalUser') {
                // logout from normalUser guard if companyUser is logged in
                Auth::guard('companyUser')->logout();

                // check if user has been banned
                if (Auth::guard('normalUser')->user()->is_banned) {
                    Auth::guard('normalUser')->logout();
                    return redirect()->back()->withErrors(['error' => 'The account has been banned']);
                }

                do {
                    $token = Str::random(80);
                } while (NormalUser::where('api_token', $token)->first());

                NormalUser::where('normal_user_id', Auth::guard('normalUser')->user()->normal_user_id)->update([
                    'api_token' => $token
                ]);

                return redirect()->route('user.normal.name.id.profile', [
                    'name' => Auth::guard('normalUser')->user()->name,
                    'id' => Auth::guard('normalUser')->user()->normal_user_id
                ])->with('success', 'Login success');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Credentials does not match']);
        }
    }
}
