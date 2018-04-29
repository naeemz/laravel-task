<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('payment', 1)->latest()->paginate(10);

        return view('home', compact('products'));
    }

    public function ad_show( $slug ) {
        $ad = Product::where('title', str_slug($slug))->first();

        dd($ad);
        // return
        return view('front.show');
    }
}
