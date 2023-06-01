<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

                return redirect()->route('user.company.profile')->with('success', 'Login success');
            }
        } else {
            return redirect()->back()->with('error', 'Login failed');
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

                return redirect()->route('user.normal.profile')->with('success', 'Login success');
            }
        } else {
            return redirect()->route('home')->with('error', 'Login failed');
        }
    }
}