<?php

namespace App\Http\APIControllers\auth;

use Illuminate\Http\Request;
use App\Http\APIControllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logCompanyUserOut()
    {
        Auth::guard('companyUser')->logout();
        return redirect()->route('home');
    }

    public function logNormalUserOut()
    {
        Auth::guard('normalUser')->logout();
        return redirect()->route('home');
    }
}
