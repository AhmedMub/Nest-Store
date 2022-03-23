<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubCategoryController extends Controller
{

    //Subcategory view
    public function show()
    {
        $count = SubCategory::count();

        return view('admin.pages.subcategory', compact('count'));
    }
}
