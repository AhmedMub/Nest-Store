<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontController extends Controller
{

    public function index()
    {
        return view('frontend.pages.index');
    }

    public function contactUs()
    {
        //
    }
}
