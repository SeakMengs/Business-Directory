<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyUserController extends Controller
{
    public function __construct()
    {
        // user must be logged in to access this controller
        $this->middleware('userAuth:companyUser')->except('logout');
    }

    public function profile()
    {
        return view('company_profile');
    }

    public function editProfile()
    {
        return view('edit-company-account');
    }
}
