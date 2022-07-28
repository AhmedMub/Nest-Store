<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfile extends Controller
{

    public function show()
    {

        return view('frontend.pages.profile');
    }

    // products compare page:
    public function productsCompare()
    {
        //
    }
}
