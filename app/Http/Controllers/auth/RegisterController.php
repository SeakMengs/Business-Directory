<?php

namespace App\Http\Controllers\auth;

use App\Models\NormalUser;
use App\Models\CompanyUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function signUpOption()
    {
        return view('sign-up-option');
    }

    public function normalUserSignUpView()
    {
        return view('normal-user-sign-up');
    }

    public function companyUserSignUpView()
    {
        return view('company-user-sign-up');
    }

    public function normalUserRegister(Request $request)
    {

        // Validate the form data. First parameter is the request object, second parameter is the validation rules
        // https://stackoverflow.com/questions/45007905/custom-laravel-validation-messages
        $validate = $request->validate(
            [
                'name' => ['required', 'unique:normal_user'],
                'email' => ['required', 'unique:normal_user'],
                'password' => ['required', 'confirmed', 'min:8'],
                'password_confirmation' => ['required', 'min:8', 'same:password'],
            ],
            [
                'name.required' => 'Username is required',
                'name.unique' => 'Username already exists',
                'password.required' => 'Password is required',
                'password.confirmed' => 'Password does not match',
                'password.min' => 'Password must be at least 8 characters',
                'password_confirmation.required' => 'Password confirmation is required',
                'password_confirmation.min' => 'Password confirmation must be at least 8 characters',
                'password_confirmation.same' => 'Password confirmation does not match',
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exists',
                'email.email' => 'Email is not valid',
            ]
        );

        $saveUser = NormalUser::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($saveUser) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('normalUser')->attempt($credentials)) {
                if (Auth::guard('normalUser')->user()->role == 'normalUser') {
                    // logout from normalUser guard if companyUser is logged in
                    Auth::guard('companyUser')->logout();

                    do {
                        $token = Str::random(80);
                    } while (NormalUser::where('api_token', $token)->first());

                    NormalUser::where('normal_user_id', Auth::guard('normalUser')->user()->normal_user_id)->update([
                        'api_token' => $token
                    ]);

                    return redirect()->route('user.normal.name.id.profile', [
                        'name' => Auth::guard('normalUser')->user()->name,
                        'id' => Auth::guard('normalUser')->user()->normal_user_id
                    ])->with('success', 'Register success');
                }
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create user']);
        }
    }

    public function companyUserRegister(Request $request)
    {
        // Validate the form data. First parameter is the request object, second parameter is the validation rules
        // https://stackoverflow.com/questions/45007905/custom-laravel-validation-messages
        $validate = $request->validate(
            [
                'name' => ['required', 'unique:company_user'],
                'email' => ['required', 'unique:company_user'],
                'password' => ['required', 'confirmed', 'min:8'],
                'password_confirmation' => ['required', 'min:8', 'same:password'],
            ],
            [
                'name.required' => 'Username is required',
                'name.unique' => 'Username already exists',
                'password.required' => 'Password is required',
                'password.confirmed' => 'Password does not match',
                'password.min' => 'Password must be at least 8 characters',
                'password_confirmation.required' => 'Password confirmation is required',
                'password_confirmation.min' => 'Password confirmation must be at least 8 characters',
                'password_confirmation.same' => 'Password confirmation does not match',
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exists',
                'email.email' => 'Email is not valid',
            ]
        );

        $saveUser = CompanyUser::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($saveUser) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('companyUser')->attempt($credentials)) {
                if (Auth::guard('companyUser')->user()->role == 'companyUser') {
                    // logout from companyUser guard if normalUser is logged in
                    Auth::guard('normalUser')->logout();

                    do {
                        $token = Str::random(80);
                    } while (CompanyUser::where('api_token', $token)->first());

                    CompanyUser::where('company_user_id', Auth::guard('companyUser')->user()->company_user_id)->update([
                        'api_token' => $token
                    ]);

                    return redirect()->route('user.company.name.id.profile', [
                        'name' => Auth::guard('companyUser')->user()->name,
                        'id' => Auth::guard('companyUser')->user()->company_user_id
                    ])->with('success', 'Register success');
                }
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create user']);
        }
    }
}
