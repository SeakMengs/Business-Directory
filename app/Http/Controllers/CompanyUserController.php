<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Service;
use App\Models\Category;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use App\Models\CompanyContact;
use App\Models\CompanyGallery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyUserController extends Controller
{
    public function __construct()
    {
        // user must be logged in to access this controller
        $this->middleware('userAuth:companyUser')->except('logout');
    }

    public function uploadToCloudinary($image)
    {
        // ignore the warning (i'm not sure why it's there but it works, maybe I use low version of cloudinary package)
        $uploadedFileUrl = cloudinary()->upload($image->getRealPath(), [
            'folder' => 'business-directory'
        ])->getSecurePath();

        return $uploadedFileUrl;
    }

    public function profile($username)
    {

        // this is unofficial query. created for testing purposes
        // first() returns the first record that matches the query
        $data = CompanyUser::where('name', $username)->first();

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

    public function editCompany($username, $companyName)
    {
        // TODO: query company where username match username and companyName match companyName, join with service, company_gallery, company_contact

        return view('edit-company');
    }

    public function saveCompanyEdit(Request $request)
    {
        return 'TODO later';
    }

    public function addCompany($username)
    {
        // TODO: query all categories

        $categories = Category::get();

        return view('add-company', [
            'categories' => $categories,
        ]);
    }
    public function addCompanySave(Request $request, $username)
    {
        // dd($request);

        $validator = Validator::make(
            $request->all(),
            [
                // make sure the name is unique in the company table
                'name' => ['required', 'max:255', 'unique:company,name'],
                'description' => 'required',
                // make sure the category match the category in the category table
                'category' => ['required', 'exists:category,category_id'],
                'email' => ['required', 'email', 'unique:company,email'],
                'website' => ['required', 'url'],
                // max:2048 means the image size must be less than 2MB
                'logo' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
                'street' => ['required', 'max:255'],
                'city' => ['required', 'max:255'],
                'district' => ['required', 'max:255'],
                'commune' => ['required', 'max:255'],
                'village' => ['required', 'max:255'],
                // make sure the phone number is numeric and has 10-12 digits only
                // .* means the field is an array
                'phone_number.*' => ['required', 'numeric', 'digits_between:8,12', 'distinct'],
                'photo_url.*' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
                // make sure the service array does not contain duplicate value
                'service.*' => ['required', 'max:255', 'distinct'],
            ],
            [
                'name.required' => 'The company name is required',
                'name.max' => 'The company name must not exceed 255 characters',
                'name.unique' => 'The company name is already taken',
                'description.required' => 'The company description is required',
                'category.required' => 'The company category is required',
                'category.exists' => 'The company category is invalid',
                'email.required' => 'The company email is required',
                'email.email' => 'The company email is invalid',
                'email.unique' => 'The company email is already taken',
                'website.required' => 'The company website is required',
                'website.url' => 'The company website is invalid',
                'logo.required' => 'The company logo is required',
                'logo.mimes' => 'The company logo must be jpeg, jpg, or png',
                'logo.max' => 'The company logo must not exceed 2MB',
                'logo.image' => 'The company logo must be an image',
                'street.required' => 'The company street is required',
                'street.max' => 'The company street must not exceed 255 characters',
                'city.required' => 'The company city is required',
                'city.max' => 'The company city must not exceed 255 characters',
                'district.required' => 'The company district is required',
                'district.max' => 'The company district must not exceed 255 characters',
                'commune.required' => 'The company commune is required',
                'commune.max' => 'The company commune must not exceed 255 characters',
                'village.required' => 'The company village is required',
                'village.max' => 'The company village must not exceed 255 characters',
                'phone_number.*.required' => 'The company phone number is required',
                'phone_number.*.numeric' => 'The company phone number must be numeric',
                'phone_number.*.digits_between' => 'The company phone number must be between 8-12 digits',
                'phone_number.*.distinct' => 'The company phone number must not contain duplicate value',
                'photo_url.*.required' => 'The company photo is required',
                'photo_url.*.image' => 'The company photo must be an image',
                'photo_url.*.max' => 'The company photo must not exceed 2MB',
                'photo_url.*.mimes' => 'The company photo must be jpeg, jpg, or png',
                'service.*.required' => 'The company service is required',
                'service.*.max' => 'The company service must not exceed 255 characters',
                'service.*.distinct' => 'The company service must not contain duplicate value',
            ]
        );

        if ($validator->fails()) {
            // redirect back to the same page with errors and old inputs
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // Check auth again to make sure the user is logged in
        if (Auth::guard('companyUser')->check()) {
            // get the user id
            $userId = Auth::guard('companyUser')->user()->company_user_id;
        } else {
            // redirect to login page if the user is not logged in
            return redirect()->route('login.company');
        }

        // https://stackoverflow.com/questions/17861412/calling-other-function-in-the-same-controller
        // call function inside the same controller
        $logoUrl = $this->uploadToCloudinary($request->file('logo'));

        $saveCompany = Company::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => $logoUrl,
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'commune' => $request->input('commune'),
            'village' => $request->input('village'),
            'company_user_id' => $userId,
        ]);

        $savedComapnyId = $saveCompany->company_id;

        // Save the company contacts
        foreach ($request->input('phone_number') as $phone_number) {
            CompanyContact::create([
                'company_id' => $savedComapnyId,
                'phone_number' => $phone_number,
            ]);
        }

        // Save the company services
        foreach ($request->input('service') as $service) {
            // echo $service;
            Service::create([
                'company_id' => 1,
                'name' => $service,
            ]);
        }

        // Save the company photos
        foreach ($request->file('photo_url') as $photo) {
            $photoUrl = $this->uploadToCloudinary($photo);

            CompanyGallery::create([
                'company_id' => $savedComapnyId,
                'photo_url' => $photoUrl,
            ]);
        }

        return redirect()->back()->with('success', 'Company added successfully');
    }
}
