<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class ProductsByTagController extends Controller
{

    public function getProducts($id)
    {
        $tag = Tag::findOrFail($id);

        $tags = Tag::latest()->take(5)->get();

        return view('frontend.pages.products-by-tag', compact('tags', 'tag'));
    }
}
