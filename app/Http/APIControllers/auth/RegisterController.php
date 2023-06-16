<?php

namespace App\Http\APIControllers\auth;

use App\Models\NormalUser;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\APIControllers\Controller;
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

                    // return redirect()->route('user.normal.name.profile')->with('success', 'Login success');
                    return response()->json(['success' => 'Login success'], 200);
                }
            }
        } else {
            // return redirect()->back()->withErrors(['error' => 'Failed to create user']);
            return response()->json(['error' => 'Failed to create user'], 400);
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

                    // return redirect()->route('user.company.name.profile')->with('success', 'Login success');
                    return response()->json(['success' => 'Login success'], 200);
                }
            }
        } else {
            // return redirect()->back()->withErrors(['error' => 'Failed to create user']);
            return response()->json(['error' => 'Failed to create user']);
        }
    }
}
