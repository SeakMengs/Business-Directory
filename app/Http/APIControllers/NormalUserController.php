<?php

namespace App\Http\APIControllers;

use App\Models\NormalUser;
use App\Models\SavedCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        // return view('normal_user_profile', [
        //     'user' => $data,
        // ]);
        return response()->json([
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

        // return view('edit-normaluser-account', [
        //     'user' => $data,
        // ]);
        return response()->json([
                'user' => $data,
        ]);

    }

    public function saveEditProfile(Request $request, $username, $userId)
    {

        // store the first two input field because by default we place value in the input field
        $storeInput = [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];

        // if the change password check is checked
        // we validate password
        if (isset($request['change_password'])) {
            // add hash password to the storeInput array
            $storeInput['password'] = bcrypt($request->input('new_password'));

            // after knowing that the user want to change the password
            // we validate the password first
            $validatePassword = Validator::make(
                $request->input(),
                [
                    // password:companyUser is for custom validation rule
                    // it checks if the password is correct
                    // https://laravel.com/docs/8.x/validation#rule-password
                    'old_password' => ['required', 'min:8', 'password:normalUser'],
                    'new_password' => ['required', 'min:8', 'confirmed'],
                    'new_password_confirmation' => ['required', 'min:8'],
                ],
                [
                    'old_password.password' => 'The old password is incorrect',
                    'old_password.required' => 'The old password is required',
                    'old_password.min' => 'The old password must be at least 8 characters',
                    'new_password.required' => 'The new password is required',
                    'new_password.min' => 'The new password must be at least 8 characters',
                    'new_password.confirmed' => 'The new password confirmation does not match',
                    'new_password_confirmation.required' => 'The new password confirmation is required',
                    'new_password_confirmation.min' => 'The new password confirmation must be at least 8 characters',
                ]
            );

            if ($validatePassword->fails()) {
                return redirect()->back()->withErrors($validatePassword)->withInput($request->all());
            }
        }

        $validator = Validator::make(
            $request->input(),
            [
                // name must be unique but can be the same as the current name
                // https://stackoverflow.com/questions/22405762/laravel-update-model-with-unique-validation-rule-for-attribute
                'name' => ['required', 'max:255', 'unique:normal_user,name,' . $userId . ',normal_user_id'],
                'email' => ['required', 'email', 'max:255', 'unique:normal_user,email,' . $userId . ',normal_user_id'],
            ],
            [
                'name.required' => 'The name is required',
                'name.max' => 'The name must not exceed 255 characters',
                'name.unique' => 'The name is already taken',
                'email.required' => 'The email is required',
                'email.email' => 'The email is invalid',
                'email.max' => 'The email must not exceed 255 characters',
                'email.unique' => 'The email is already taken',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $saveChange = normalUser::where('normal_user_id', $userId)->update($storeInput);

        if (!$saveChange) {
            // return redirect()->back()->withErrors('error', 'Failed to save changes');
            return response()->json(['error' => 'Failed to save changes'], 400);
        } else {
            // return redirect()->route('user.normal.name.id.profile.edit', [
            //     'name' => $storeInput['name'],
            //     'id' => $userId,
            // ])->with('success', 'Changes saved');

            return response()->json([
                'name' => $storeInput['name'],
                'id' => $userId,
                'success' => 'Changes saved'], 200);
        }
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

            // return redirect()->back()->with('success', 'Company has been removed from your saved company list');
            return response()->json(['success' => 'Company has been removed from your saved company list'], 200);
        } else {
            // return redirect()->back()->with('error', 'Remove saved company failed');
            return response()->json(['error' => 'Remove saved company failed'], 400);
        }
    }
}
