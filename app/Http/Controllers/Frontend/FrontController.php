<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontController extends Controller
{

    public function index()
    {
        //get first records where are 10 records
        $catsFirstRecords = Category::select('*')->whereStatus(1)->take(10)->get();

        $count = Category::count();

        //skip the records you got "$catsFirstRecords"
        $skip = 10;

        //number remaining categories
        $remaining = $count - $skip;

        //get remaining categories
        $catsRemainingRecords = Category::skip($skip)->take($remaining)->get();

        return view('frontend.pages.index', compact('catsFirstRecords', 'catsRemainingRecords'));
    }

    public function shop()
    {
        //
    }

    public function contactUs()
    {
        //
    }
}
