<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use App\Models\CompanyUser;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function test()
    {
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

    public function categories()
    {
        // TODO: query all categories
        $categories = Category::all();

        // return response()->json($categories);

        return view('categoryshow', ['categories' => $categories]);

    }

    public function categoryShowCompany($categoryName)
    {
        // TODO: query companies join with contacts, rate by category name
        $category_id = Category::where('name', $categoryName)->get();

        if (count($category_id) == 0) {
            return view('category-show-company', [
                'cateNotFound' => true,
                'categoryName' => $categoryName,
            ]);
        } else {
            $category_id = $category_id[0]->category_id;
        }

        $companies = Company::with('contacts', 'rates')
            ->withAvg('rates as avg_star_rate', 'star_number')
            ->where('category_id', $category_id)->get();

        // return response()->json($companies);

        return view('category-show-company', [
            'cateNotFound' => false,
            'companies' => $companies,
            'categoryName' => $categoryName,
        ]);
    }

    public function companyDetail($categoryName, $companyName)
    {
        // TODO: query company by company name join with contacts, rates, feedbacks service rates
        // https://laravel.com/docs/8.x/eloquent-relationships#average-aggregate
        $company = Company::with('contacts', 'rates', 'feedbacks.normalUser', 'services', 'rates')
            ->withAvg('rates as avg_star_rate', 'star_number')
            ->where('name', $companyName)->first();

        // return response()->json($company);

        return view('company-detail', [
            'company' => $company,
            'categoryName' => $categoryName,
            'companyName' => $companyName,
        ]);
    }

    public function search(Request $request)
    {
        $search_by = $request->input('search_by');
        $search_query = $request->input('search_query');
        $result = [];

        // if ($search_query) {
            if ($search_by == 'company') {
                $result = Company::with('contacts', 'rates', 'category')
                    ->withAvg('rates as avg_star_rate', 'star_number')
                    ->where('name', 'like', '%' . $search_query . '%')->get();
            } else if ($search_by == 'category') {
                $result = Category::where('name', 'like', '%' . $search_query . '%')->get();
            }
        // }

        // return response()->json($result);

        return view('search-results', [
            'search_query' => $search_query,
            'search_by' => $search_by,
            'result' => $result,
        ]);
    }
}
