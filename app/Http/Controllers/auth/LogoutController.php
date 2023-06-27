<?php

namespace App\Http\Controllers\auth;

use App\Models\NormalUser;
use App\Models\CompanyUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logCompanyUserOut()
    {
        // clear api token
        CompanyUser::where('company_user_id', Auth::guard('companyUser')->user()->company_user_id)->update(['api_token' => null]);

        Auth::guard('companyUser')->logout();

        return redirect()->route('home');
    }

    public function logNormalUserOut()
    {
        // clear api token
        NormalUser::where('normal_user_id', Auth::guard('normalUser')->user()->normal_user_id)->update(['api_token' => null]);

        Auth::guard('normalUser')->logout();
        return redirect()->route('home');
    }
}
