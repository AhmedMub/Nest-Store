<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function show()
    {

        //count All cates results results
        $count = Category::class::count();

        return view('admin.pages.categories', compact('count'));
    }
}
