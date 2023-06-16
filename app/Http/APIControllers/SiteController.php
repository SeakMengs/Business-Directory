<?php

namespace App\Http\APIControllers;

use App\Models\Company;
use App\Models\Category;
use App\Models\CompanyUser;
use App\Models\Feedback;
use App\Models\Rate;
use App\Models\Report;
use App\Models\SavedCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function home()
    {
        return view('homepage');
    }

    public function test()
    {
        $data = CompanyUser::with('companies.feedbacks.normalUser', 'companies.contacts')->get();

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

        // return view('categoryshow', ['categories' => $categories]);
        return response()->json(['categories' => $categories]);


    }

    public function categoryShowCompany($categoryName)
    {
        // TODO: query companies join with contacts, rate by category name
        $category_id = Category::where('name', $categoryName)->get();

        if (count($category_id) == 0) {
            // return view('category-show-company', [
            //     'cateNotFound' => true,
            //     'categoryName' => $categoryName,
            // ]);
            return response()->json([
                    'cateNotFound' => true,
                    'categoryName' => $categoryName
            ]);
            
        } else {
            $category_id = $category_id[0]->category_id;
        }

        $companies = Company::with('contacts', 'rates')
            ->withAvg('rates as avg_star_rate', 'star_number')
            ->where('category_id', $category_id)->get();

        // return response()->json($companies);

        // return view('category-show-company', [
        //     'cateNotFound' => false,
        //     'companies' => $companies,
        //     'categoryName' => $categoryName,
        // ]);

        return response()->json([
                'cateNotFound' => false,
                'companies' => $companies,
                'categoryName' => $categoryName
        ]);
        
        
    }

    public function companyDetail($categoryName, $companyName)
    {
        // TODO: query company by company name join with contacts, rates, feedbacks service rates
        // https://laravel.com/docs/8.x/eloquent-relationships#average-aggregate
        $company = Company::with('contacts', 'rates', 'feedbacks.normalUser', 'services', 'rates')
            ->withAvg('rates as avg_star_rate', 'star_number')
            ->where('name', $companyName)->first();
        $currentUserRateNumber = null;

        if (Auth::guard('normalUser')->check()) {
            $currentUserRateNumber = Rate::where([
                ['normal_user_id', '=', Auth::guard('normalUser')->user()->normal_user_id],
                ['company_id', '=', $company->company_id],
            ])->first();
        }

        // return response()->json($company);

        // return view('company-detail', [
        //     'company' => $company,
        //     'categoryName' => $categoryName,
        //     'companyName' => $companyName,
        //     'currentUserRateNumber' => $currentUserRateNumber ? $currentUserRateNumber->star_number : null,
        // ]);
        return response()->json([
                'company' => $company,
                'categoryName' => $categoryName,
                'companyName' => $companyName,
                'currentUserRateNumber' => $currentUserRateNumber ? $currentUserRateNumber->star_number : null
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

        // return view('search-results', [
        //     'search_query' => $search_query,
        //     'search_by' => $search_by,
        //     'result' => $result,
        // ]);

        return response()->json([
                'search_query' => $search_query,
                'search_by' => $search_by,
                'result' => $result
        ]);
        
    }

    public function saveCompany(Request $request, $categoryName, $companyName)
    {
        if (!Auth::guard('normalUser')->check()) {
            // return redirect()->back()->with('error', 'You must login as a normal user to save company');
            return response()->json(['error' => 'You must login as a normal user to save company'], 400);
        }


        $company_id = $request->input('company_id');
        $currentUserId = Auth::guard('normalUser')->user()->normal_user_id;

        $checkSavedCompanyHistory = SavedCompany::where([
            ['normal_user_id', '=', $currentUserId],
            ['company_id', '=', $company_id],
        ])->first();

        if ($checkSavedCompanyHistory) {
            // return redirect()->back()->with('error', 'Company has already been saved in your list');
            return response()->json(['error' => 'Company has already been saved in your list'], 400);
        }

        $saveCompany = SavedCompany::create([
            'normal_user_id' => $currentUserId,
            'company_id' => $company_id,
        ]);

        if ($saveCompany) {
            // return redirect()->back()->with('success', 'Company has been saved in your list');
            return response()->json(['success' => 'Company has been saved in your list'], 200);
        } else {
            // return redirect()->back()->with('error', 'Failed to save company in your list');
            return response()->json(['error' => 'Failed to save company in your list'], 400);
        }
    }

    public function postFeedback(Request $request, $categoryName, $companyName)
    {
        if (!Auth::guard('normalUser')->check()) {
            // return redirect()->back()->with('error', 'You must login as a normal user to post feedback on company');
            return response()->json(['error' => 'You must login as a normal user to post feedback on company'], 400);
        }

        $validate = Validator::make($request->all(), [
            'feedback' => ['required', 'string'],
        ]);

        if ($validate->fails()) {
            if ($validate->errors()->has('feedback')) {
                // return redirect()->back()->with('error', 'Feedback is required');
                return response()->json(['error' => 'Feedback is required'], 400);
            }
        }

        $feedback = $request->input('feedback');
        $company_id = $request->input('company_id');
        $currentUserId = Auth::guard('normalUser')->user()->normal_user_id;

        // Check if user has already posted feedback
        $checkFeedbackHistory = Feedback::where([
            ['normal_user_id', '=', $currentUserId],
            ['company_id', '=', $company_id],
        ])->first();

        if ($checkFeedbackHistory) {
            // return redirect()->back()->with('error', 'You have already posted feedback on this company before');
            return response()->json(['error' => 'You have already posted feedback on this company before'], 400);
        }

        $saveFeedback = Feedback::create([
            'normal_user_id' => $currentUserId,
            'company_id' => $company_id,
            'feedback' => $feedback,
        ]);

        if ($saveFeedback) {
            // return redirect()->back()->with('success', 'Feedback has been posted');
            return response()->json(['success' => 'Feedback has been posted'], 200);
        } else {
            // return redirect()->back()->with('error', 'Failed to post feedback');
            return response()->json(['error' => 'Failed to post feedback'], 400);
        }
    }

    public function postReport(Request $request, $categoryName, $companyName)
    {
        if (!Auth::guard('normalUser')->check()) {
            // return redirect()->back()->with('error', 'You must login as a normal user to report company');
            return response()->json(['error' => 'You must login as a normal user to report company'], 400);
        }

        $validate = Validator::make($request->all(), [
            'report' => ['required', 'string'],
        ]);

        if ($validate->fails()) {
            if ($validate->errors()->has('report')) {
                // return redirect()->back()->with('error', 'Report is required');
                return response()->json(['error' => 'Report is required'], 400);
            }
        }

        $report = $request->input('report');
        $company_id = $request->input('company_id');
        $currentUserId = Auth::guard('normalUser')->user()->normal_user_id;

        // check if user has reported the company before
        $checkReportHistory = Report::where([
            ['report_by_normal_user_id', '=', $currentUserId],
            ['company_id', '=', $company_id],
        ])->first();

        if ($checkReportHistory) {
            // return redirect()->back()->with('error', 'You have already reported this company');
            return response()->json(['error' => 'You have already reported this company'], 400);
        }

        $saveReport = Report::create([
            'report_by_normal_user_id' => $currentUserId,
            'company_id' => $company_id,
            'reason' => $report,
        ]);

        if ($saveReport) {
            // return redirect()->back()->with('success', 'Company has been reported');
            return response()->json(['success' => 'Company has been reported'], 200);
        } else {
            // return redirect()->back()->with('error', 'Failed to report company');
            return response()->json(['error' => 'Failed to report company'], 400);
        }
    }

    public function postRate(Request $request, $categoryName, $companyName)
    {
        if (!Auth::guard('normalUser')->check()) {
            // return redirect()->back()->with('error', 'You must login as a normal user to rate company');
            return response()->json(['error' => 'You must login as a normal user to rate company'], 400);
        }

        $validate = Validator::make($request->all(), [
            'rate_number' => ['required', 'string'],
        ]);

        $rate_number = $request->input('rate_number');
        $company_id = $request->input('company_id');
        $currentUserId = Auth::guard('normalUser')->user()->normal_user_id;

        if ($validate->fails()) {
            if ($validate->errors()->has('rate_number')) {
                // return redirect()->back()->with('error', 'Rate is required');
                return response()->json(['error' => 'Rate is required'], 400);
            }
        }

        // check if user has rated this company before
        $checkRateHistory = Rate::where([
            ['normal_user_id', $currentUserId],
            ['company_id', $company_id],
        ])->first();

        // if user has rated this company before, update the rate
        if ($checkRateHistory) {
            $updateRating = Rate::where([
                ['normal_user_id', $currentUserId],
                ['company_id', $company_id],
            ])->update([
                    'star_number' => $rate_number,
                ]);

            if ($updateRating) {
                // return redirect()->back()->with('success', 'Company rate has been updated to ' . $rate_number . ' stars');
                return response()->json(['success' => 'Company rate has been updated to ' . $rate_number . ' stars'], 200);
            } else {
                // return redirect()->back()->with('error', 'Failed to rate company');
                return response()->json(['error' => 'Failed to rate company'], 400);
            }
        }

        $saveRate = Rate::create([
            'normal_user_id' => $currentUserId,
            'company_id' => $company_id,
            'star_number' => $rate_number,
        ]);

        if ($saveRate) {
            // return redirect()->back()->with('success', 'Company has been rated');
            return response()->json(['success' => 'Company has been rated'], 200);
        } else {
            // return redirect()->back()->with('error', 'Failed to rate company');
            return response()->json(['error' => 'Failed to rate company'], 400);
        }
    }
}
