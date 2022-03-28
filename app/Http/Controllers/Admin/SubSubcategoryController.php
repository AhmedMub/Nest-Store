<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubSubcategory;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubSubcategoryController extends Controller
{

    public function show()
    {
        //count All sub sub cates results results
        $count = SubSubcategory::class::count();

        return view('admin.pages.sub-subcategory', compact('count'));
    }
}
