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

        // doesn't have to add the 'user' object name but it's better to do so
        // so that we know what the object is
        return response()->json([
            'user' => $data,
        ]);

        // example
        // return response()->json($data);
    }
}
