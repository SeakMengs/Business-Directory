<?php

namespace App\Http\Controllers;

use App\Models\NormalUser;
use Illuminate\Http\Request;

class NormalUserController extends Controller
{
    public function __construct()
    {
        // user must be logged in to access this controller
        $this->middleware('userAuth:normalUser')->except('logout');
    }

    public function profile($name)
    {
        // this is unofficial query. created for testing purposes
        // first() returns the first record that matches the query
        $data = NormalUser::where('name', $name)->first();

        if (!$data) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        return view('normal_user_profile');
    }


    public function editProfile($username)
    {
        // TODO: query normal_user where username match username

        return view('edit-normaluser-account');
    }

    public function saveProfileEdit(Request $request)
    {
        return 'TODO later';
    }

}
