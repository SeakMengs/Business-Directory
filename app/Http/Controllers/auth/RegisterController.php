<?php

namespace App\Http\Controllers\auth;

use App\Models\NormalUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyUser;

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
            ]
        );

        $saveUser = NormalUser::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($saveUser) {
            return redirect()->route('user')->with('success', 'User created successfully');
        } else {
            return redirect()->back()->with('error', 'User creation failed');
        }
    }

    public function companyUserRegister(Request $request)
    {

        // $test = CompanyUser::get();
        // dd($test);

        // Validate the form data. First parameter is the request object, second parameter is the validation rules
        // https://stackoverflow.com/questions/45007905/custom-laravel-validation-messages
        // $validate = $request->validate(
        //     [
        //         'name' => ['required', 'unique:normal_user'],
        //         'password' => ['required', 'confirmed', 'min:8'],
        //         'password_confirmation' => ['required', 'min:8', 'same:password'],
        //     ],
        //     [
        //         'name.required' => 'Username is required',
        //         'name.unique' => 'Username already exists',
        //         'password.required' => 'Password is required',
        //         'password.confirmed' => 'Password does not match',
        //         'password.min' => 'Password must be at least 8 characters',
        //         'password_confirmation.required' => 'Password confirmation is required',
        //         'password_confirmation.min' => 'Password confirmation must be at least 8 characters',
        //         'password_confirmation.same' => 'Password confirmation does not match',
        //     ]
        // );

        $saveUser = CompanyUser::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($saveUser) {
            return redirect()->route('user')->with('success', 'User created successfully');
        } else {
            return redirect()->back()->with('error', 'User creation failed');
        }
    }
}
