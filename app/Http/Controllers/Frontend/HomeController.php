<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Tags\Tag;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productsByMainCategory($slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();

        //get related products to selected category
        $products = $category->productMainCat->where('product_status', 1);

        $tags = Tag::whereStatus(1)->latest()->take(5)->get();
        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view('frontend.pages.products-by-category', compact('category', 'tags', 'products', 'user'));
    }
    public function byMainCategory($slug)
    {
        // $category = Category::whereSlug($slug)->firstOrFail();

        // //get related products to selected category
        // $products = $category->productMainCat->where('product_status', 1);

        // $tags = Tag::whereStatus(1)->latest()->take(5)->get();
        // $user = 0;
        // if (Auth::check()) {
        //     $user = Auth::user()->id;
        // }

        // return view('frontend.pages.products-by-category', compact('category', 'tags', 'products', 'user'));
    }
    public function bySubcategory($slug)
    {
        $category = SubCategory::whereSlug($slug)->firstOrFail();

        //get related products to selected category

        $products = $category->productSubCat->where('product_status', 1);

        $tags = Tag::whereStatus(1)->latest()->take(5)->get();

        $user = 0;
        if (Auth::check()) {
            $user = Auth::user()->id;
        }

        return view('frontend.pages.testing', compact('category', 'tags', 'products', 'user'));
    }
    public function bySubSubcategory($slug)
    {
        $category = SubSubcategory::whereSlug($slug)->firstOrFail();

        //get related products to selected category
        $products = $category->productMainCat->where('product_status', 1);

        $tags = Tag::whereStatus(1)->latest()->take(5)->get();

        return view('frontend.pages.products-by-category', compact('category', 'tags', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
