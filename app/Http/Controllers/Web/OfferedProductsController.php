<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferedProductsController extends Controller
{
    public function index()
    {
        // get products
        $products = Product::where("has_offer", '1')->paginate( 30 );
        return view('web.offered_products',compact('products'));
    }
}
