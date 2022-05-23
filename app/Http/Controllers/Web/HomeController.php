<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories   = Category::get();
        $lastedOffers = Product::where('has_offer','1')->orderBy('id', 'desc')->limit(10)->get();
        return view('web.home',compact('categories','lastedOffers'));
    }

}
