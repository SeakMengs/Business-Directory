<?php

namespace App\Http\APIControllers;

use App\Models\Rate;
use App\Models\Company;
use App\Models\Service;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\CompanyUser;
use App\Models\SavedCompany;
use Illuminate\Http\Request;
use App\Models\CompanyContact;
use App\Models\CompanyGallery;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompanyUserController extends Controller
{
    public function __construct()
    {
        // user must be logged in to access this controller
        $this->middleware('userAuth:companyUser')->except('logout');
    }

    // Not being used due to caching problem that make request to img return 404
    public function uploadToCloudinary($image)
    {
        // ignore the warning (i'm not sure why it's there but it works, maybe I use low version of cloudinary package)
        $uploadedFileUrl = cloudinary()->upload($image->getRealPath(), [
            'folder' => 'business-directory',
            // don't cache the image
            'invalidate' => true,
            'cache_invalidation' => true,
        ])->getSecurePath();

        return $uploadedFileUrl;
    }

    public function uploadToImgur($image) {
        $client_id = env('IMGUR_CLIENT_ID');

        // https://stackoverflow.com/questions/63060351/how-to-upload-images-to-imgur-using-laravel
        // upload image to imgur api to my account
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                'authorization' => 'Client-ID ' . $client_id,
                // if we want to store the image to our account
                // 'authorization' => 'Bearer '. env('IMGUR_ACCESS_TOKEN'),
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'image' => base64_encode(file_get_contents($image)),
            ],
        ]);

        // get link
        return json_decode($response->getBody()->getContents())->data->link;
    }

    public function profile($username, $userId)
    {
        // TODO: Join relationship of company_user and many companies
        $data = CompanyUser::with('companies')->where('company_user_id', $userId)->first();

        if (!$data) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        // return response()->json($data);

        // return view('company_profile', [
        //     'userData' => $data,
        // ]);
        return response()->json([
            'userData' => $data,
        ]);
    }

    public function editProfile($username, $userId)
    {
        // TODO: query company_user where $userId match

        $data = CompanyUser::where('company_user_id', $userId)->first();

        // return view('edit-company-account', [
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
                    'old_password' => ['required', 'min:8', 'password:companyUser'],
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
                'name' => ['required', 'max:255', 'unique:company_user,name,' . $userId . ',company_user_id'],
                'email' => ['required', 'email', 'max:255', 'unique:company_user,email,' . $userId . ',company_user_id'],
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

        $saveChange = CompanyUser::where('company_user_id', $userId)->update($storeInput);

        if (!$saveChange) {
            // return redirect()->back()->withErrors('error', 'Failed to save changes');
            return response()->json(['error' => 'Failed to save changes'], 400);
        } else {
            // return redirect()->route('user.company.name.id.profile.edit', [
            //     'name' => $storeInput['name'],
            //     'id' => $userId,
            // ])->with('success', 'Changes saved');
            return response()->json([
                'name' => $storeInput['name'],
                'id' => $userId,
                'success' => 'Changes saved'], 200);
        }
    }

    public function editCompany(Request $request, $username, $userId)
    {
        // get company_id from query parameter
        $companyId = $request->query('company_id');

        // TODO: query company join with contacts, services, and galleries & query categories separately
        // NOTE: we make sure that the company is owned by the user
        // NOTE: I created a function called contacts in the Company model (it's used to get the contacts of the company)
        $company = Company::with('contacts', 'services', 'galleries')->where([['company_id', $companyId], ['company_user_id', $userId]])->first();

        // join with DB

        $categories = Category::get();

        // json view
        // return response()->json($company);

        // return view('edit-company', [
        //     'company' => $company,
        //     'categories' => $categories,
        // ]);
        return response()->json([
            'company' => $company,
            'categories' => $categories,
        ]);
        
    }

    public function addCompany($username, $userId)
    {
        // TODO: query all categories

        $categories = Category::get();

        // return view('add-company', [
        //     'categories' => $categories,
        // ]);
        return response()->json([
                'categories' => $categories
        ]);
        
    }
    public function addCompanySave(Request $request, $username, $userId)
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
        $logoUrl = $this->uploadToImgur($request->file('logo'));

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
        foreach ($request->input('services') as $service) {
            // echo $service;
            Service::create([
                'company_id' => $savedComapnyId,
                'name' => $service,
            ]);
        }

        // Save the company photos
        foreach ($request->file('photo_url') as $photo) {
            $photoUrl = $this->uploadToImgur($photo);

            CompanyGallery::create([
                'company_id' => $savedComapnyId,
                'photo_url' => $photoUrl,
            ]);
        }

        // return redirect()->back()->with('success', 'Company added successfully');
        return response()->json(['success' => 'Company added successfully'], 200);
    }

    public function removeCompany(Request $request, $username, $userId)
    {
        $company_id = $request->query('company_id');

        // make sure the person who is removing the company is the owner of the company
        // NOTE: we delete the company and all its related data because we cannot use foreign key constraint on planetscale
        $removeCompany = Company::where([['company_id', $company_id], ['company_user_id', $userId]])->delete();

        if ($removeCompany) {
            $removeContacts = CompanyContact::where('company_id', $company_id)->delete();
            $removeServices = Service::where('company_id', $company_id)->delete();
            $removeGalleries = CompanyGallery::where('company_id', $company_id)->delete();
            $removeFeedbacks = Feedback::where('company_id', $company_id)->delete();
            $removeRates = Rate::where('company_id', $company_id)->delete();
            $removeSavedCompanies = SavedCompany::where('company_id', $company_id)->delete();

            // return redirect()->back()->with('success', 'Company has been removed');
            return response()->json(['success' => 'Company has been removed'], 200);
        } else {
            // return redirect()->back()->with('error', 'Remove company failed');
            return response()->json(['error' => 'Remove company failed'], 400);
        }
    }

    public function saveEditCompany(Request $request, $username, $userId)
    {
        $company_id = $request->query('company_id');

        $storeUpdateCompany = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'district' => $request->input('district'),
            'commune' => $request->input('commune'),
            'village' => $request->input('village'),
            // Logo to be added if the user upload a new logo
        ];
        $storeUpdateContact = $request->input('phone_number');
        $storeUpdateService = $request->input('services');

        //* These can be null
        $addContacts = $request->input('add_phone_number');
        $addServices = $request->input('add_service');
        $addGalleries = $request->file('add_gallery');

        $deleteContacts = $request->input('delete_phones');
        $deleteServices = $request->input('delete_services');
        $deleteGalleries = $request->input('delete_galleries');
        //* End of these can be null

        // for testing purpose
        // dd($storeUpdateCompany, $storeUpdateContact, $storeUpdateService, $addContacts, $addServices, $addGalleries, $deleteContacts, $deleteServices, $deleteGalleries);

        $validator = Validator::make(
            $request->all(),
            [
                // I put $company_id to ignore if the current company name is the same as the new company name & same apply for all the other fields
                'name' => ['required', 'max:255', 'unique:company,name,' . $company_id . ',company_id'],
                // make sure the category match the category in the category table
                'category' => ['required', 'exists:category,category_id'],
                'email' => ['required', 'email', 'unique:company,email,' . $company_id . ',company_id'],
                'website' => ['required', 'url'],
                'street' => ['required', 'max:255'],
                'city' => ['required', 'max:255'],
                'district' => ['required', 'max:255'],
                'commune' => ['required', 'max:255'],
                'village' => ['required', 'max:255'],
                'phone_number.*' => ['required', 'numeric', 'digits_between:8,12', 'distinct'],
                'services.*' => ['required', 'max:255', 'distinct'],
                'add_phone_number.*' => ['unique:company_contact,phone_number', 'numeric', 'digits_between:8,12', 'distinct'],
                'add_service.*' => ['required', 'unique:service,name'],
                'add_gallery.*' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            ],
            [
                'name.required' => 'Company name is required',
                'name.max' => 'Company name cannot be more than 255 characters',
                'name.unique' => 'Company name already exist',
                'category.required' => 'Category is required',
                'category.exists' => 'Category does not exist',
                'email.required' => 'Email is required',
                'email.email' => 'Email is invalid',
                'email.unique' => 'Email already exist',
                'website.required' => 'Website is required',
                'website.url' => 'Website is invalid',
                'street.required' => 'Street is required',
                'street.max' => 'Street cannot be more than 255 characters',
                'city.required' => 'City is required',
                'city.max' => 'City cannot be more than 255 characters',
                'district.required' => 'District is required',
                'district.max' => 'District cannot be more than 255 characters',
                'commune.required' => 'Commune is required',
                'commune.max' => 'Commune cannot be more than 255 characters',
                'village.required' => 'Village is required',
                'village.max' => 'Village cannot be more than 255 characters',
                'phone_number.*.required' => 'Phone number is required',
                'phone_number.*.numeric' => 'Phone number must be numeric',
                'phone_number.*.digits_between' => 'Phone number must be between 8 to 12 digits',
                'phone_number.*.distinct' => 'Phone number must be unique',
                'services.*.required' => 'Service is required',
                'services.*.max' => 'Service cannot be more than 255 characters',
                'services.*.distinct' => 'Service must be unique',
                'add_phone_number.*.unique' => 'Phone number already exist',
                'add_phone_number.*.numeric' => 'Phone number must be numeric',
                'add_phone_number.*.digits_between' => 'Phone number must be between 8 to 12 digits',
                'add_phone_number.*.distinct' => 'Phone number must be unique',
                'add_service.*.required' => 'Service is required',
                'add_service.*.unique' => 'Service already exist',
                'add_gallery.*.required' => 'Gallery is required',
                'add_gallery.*.image' => 'Gallery must be an image',
                'add_gallery.*.mimes' => 'Gallery must be a jpeg, jpg, png',
                'add_gallery.*.max' => 'Gallery cannot be more than 2MB',
            ]
        );

        if ($validator->fails()) {
            // redirect back to the same page with errors and old inputs
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // dd($storeUpdateCompany);
        if ($request->file('logo')) {
            $storeUpdateCompany['logo'] = $this->uploadToImgur($request->file('logo'));
        }

        // Update the company
        $updateCompany = Company::where([['company_id', $company_id], ['company_user_id', $userId]])->update($storeUpdateCompany);

        if ($updateCompany) {

            if ($storeUpdateContact) {
                // Update the company contact
                foreach ($storeUpdateContact as $contact_id => $value) {
                    $updateContact = CompanyContact::where([['contact_id', $contact_id], ['company_id', $company_id]])->update(['phone_number' => $value]);
                }
            }

            if ($storeUpdateService) {
                // Update the company service
                foreach ($storeUpdateService as $service_id => $value) {
                    $updateService = Service::where([['service_id', $service_id], ['company_id', $company_id]])->update(['name' => $value]);
                }
            }

            if ($addContacts) {
                // Add the company contact
                foreach ($addContacts as $key => $phone) {
                    $addContact = CompanyContact::create([
                        'company_id' => $company_id,
                        'phone_number' => $phone,
                    ]);
                }
            }

            if ($addServices) {
                // Add the company service
                foreach ($addServices as $key => $service_name) {
                    $addService = Service::create([
                        'company_id' => $company_id,
                        'name' => $service_name,
                    ]);
                }
            }

            if ($addGalleries) {
                // Add the company gallery
                foreach ($request->file('add_gallery') as $key => $photo) {
                    $addGallery = CompanyGallery::create([
                        'company_id' => $company_id,
                        'photo_url' => $this->uploadToImgur($photo),
                    ]);
                }
            }

            if ($deleteContacts) {
                // Delete the company contact
                foreach ($deleteContacts as $key => $contact_id) {
                    $deleteContact = CompanyContact::where([['contact_id', $contact_id], ['company_id', $company_id]])->delete();
                }
            }

            if ($deleteServices) {
                // Delete the company service
                foreach ($deleteServices as $key => $service_id) {
                    $deleteService = Service::where([['service_id', $service_id], ['company_id', $company_id]])->delete();
                }
            }

            if ($deleteGalleries) {
                // Delete the company gallery
                foreach ($deleteGalleries as $key => $gallery_id) {
                    $deleteGallery = CompanyGallery::where([['gallery_id', $gallery_id], ['company_id', $company_id]])->delete();
                }
            }
            // return redirect()->back()->with('success', 'Company has been updated successfully');
            return response()->json(['success' => 'Company has been updated successfully'], 200);
        } else {
            // return redirect()->back()->with('success', 'Company failed to update');
            return response()->json(['error' => 'Company failed to update'], 400);
        }

    }
}
