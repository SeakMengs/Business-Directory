<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use Illuminate\Http\Request;

class CompanyUserController extends Controller
{
    public function __construct()
    {
        // user must be logged in to access this controller
        $this->middleware('userAuth:companyUser')->except('logout');
    }


    public function profile($name)
    {

        // this is unofficial query. created for testing purposes
        // first() returns the first record that matches the query
        $data = CompanyUser::where('name', $name)->first();

        if (!$data) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        return view('company_profile');
    }

    public function editProfile()
    {
        return view('edit-company-account');
    }
}
