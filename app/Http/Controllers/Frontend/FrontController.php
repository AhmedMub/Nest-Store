<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{

    public function index()
    {
        //get first records where are 10 records
        $catsFirstRecords = Category::select('*')->whereStatus(1)->where('featured_category', 0)->take(10)->get();

        $count = Category::count();

        //skip the records you got "$catsFirstRecords"
        $skip = 10;

        //number remaining categories
        $remaining = $count - $skip;

        //get remaining categories
        $catsRemainingRecords = Category::skip($skip)->take($remaining)->get();

        //Slider
        $sliders = Slider::whereStatus(1)->get();

        //get Featured Categories
        $featuredCats = Category::whereStatus(1)->where('featured_category', 1)->latest()->get();

        //get 6 categories for popular products section
        $getSixCats = Category::select('*')->whereStatus(1)->where('featured_category', 0)->take(6)->get();

        //get auth user
        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view('frontend.pages.index', compact(
            'catsFirstRecords',
            'catsRemainingRecords',
            'sliders',
            'featuredCats',
            'getSixCats',
            'user'
        ));
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
