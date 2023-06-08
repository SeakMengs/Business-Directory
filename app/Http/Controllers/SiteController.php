<?php

namespace App\Http\Controllers;

use App\Models\CompanyUser;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function test() {
        $data = CompanyUser::with('companies.feedbacks', 'companies.contacts')->get();

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
        $categories = Category::all();

        // return response()->json($categories);

        return view('categoryshow', ['categories' => $categories]);

    }

    public function categoryName($categoryName) {
        // TODO: query category by category name
        $category = Category::where('name', $categoryName)->first();

        return view('category-name', ['category' => $category]);
    }

    public function companyDetail($categoryName, $companyName) {
        // TODO: query company by company name
        $category = Category::where('name', $categoryName)->first();

        if ($category) {
            $company = $category->companies()->where('name', $companyName)->first();

            if ($company) {
                // return view('company-name', ['company' => $company]);
                return response()->json([
                    'company' => $company,
                ]);
            }
        }

        return response()->json([
            'company' => $company,
        ]);
        // return view('company-detail');
    }

}
