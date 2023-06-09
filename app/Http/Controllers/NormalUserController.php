<?php

namespace App\Http\Controllers;

use App\Models\NormalUser;
use App\Models\SavedCompany;
use Illuminate\Http\Request;

class NormalUserController extends Controller
{
    public function __construct()
    {
        // user must be logged in to access this controller
        $this->middleware('userAuth:normalUser')->except('logout');
    }

    public function profile($username, $userId)
    {
        // TODO:: query normal_user where userId match userId join with savedCompany and company. the company must be joined with category
        $data = NormalUser::with('savedCompanies.company.category')->where('normal_user_id', $userId)->first();

        if (!$data) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        // return response()->json($data);

        return view('normal_user_profile', [
            'user' => $data,
        ]);
    }

    public function editProfile($username, $userId)
    {
        // TODO:: query normal_user where userId match userId
        $data = NormalUser::where('normal_user_id', $userId)->first();

        if (!$data) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        return view('edit-normaluser-account', [
            'user' => $data,
        ]);

    }

    public function saveEditProfile(Request $request, $username, $userId)
    {
        return 'TODO later';
    }

    public function removeSavedCompany(Request $request, $username, $userId)
    {
        $company_id = $request->query('company_id');

        if ($company_id) {
            // we check by user_id and company_id because we prevent other user to delete other user's saved company.
            $removeSavedCompany = SavedCompany::where([
                'normal_user_id' => $userId,
                'company_id' => $company_id,
            ])->delete();

            return redirect()->back()->with('success', 'Company has been removed from your saved company list');
        } else {
            return redirect()->back()->with('error', 'Remove saved company failed');
        }
    }
}
