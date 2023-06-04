<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function test() {
        $data = CompanyUser::with('companies.feedbacks')->get();

        // with id
        // $data = CompanyUser::with('companies.feedbacks')->where('company_user_id', 2)->get();

        // doesn't have to add the 'user' object name but it's better to do so
        // so that we know what the object is
        return response()->json([
            'user' => $data,
        ]);

        // example
        // return response()->json($data);
    }

    public function categories() {
        // TODO: query all categories

        return view('categoryshow');
    }

    public function categoryName($categoryName) {
        // TODO: query category by category name

        return view('category-name');
    }

    public function companyName($categoryName, $companyName) {
        // TODO: query company by company name

        return view('company-name');
    }

}
