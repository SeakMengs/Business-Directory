<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalUserController extends Controller
{
    public function __construct()
    {
        // user must be logged in to access this controller
        $this->middleware('userAuth:normalUser')->except('logout');
    }

    public function profile()
    {
        return view('normal_user_profile');
    }

    public function editProfile()
    {
        return view('edit-normaluser-account');
    }
}
