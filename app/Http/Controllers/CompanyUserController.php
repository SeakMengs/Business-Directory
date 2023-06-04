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

    public function editProfile($username)
    {
        // TODO: query company_user where username match username

        return view('edit-company-account');
    }

    public function saveProfileEdit(Request $request)
    {
        return 'TODO later';
    }

    public function editCompany($username, $companyName) {
        // TODO: query company where username match username and companyName match companyName, join with service, company_gallery, company_contact

        return view('edit-company');
    }

    public function saveCompanyEdit(Request $request)
    {
        return 'TODO later';
    }

    public function addCompany($username) {

        return view('add-company');
    }
}
