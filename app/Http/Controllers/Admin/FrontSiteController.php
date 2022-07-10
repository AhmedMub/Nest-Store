<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontSiteController extends Controller
{

    public function editSlider()
    {
        $count = Slider::count();
        return view('admin.pages.manage-slider', compact('count'));
    }
}
