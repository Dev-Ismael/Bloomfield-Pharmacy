<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug)
    {
        $product = Product::where('slug',$slug)->first();
        // if product Not Found
        if( !$product ){
            return redirect('/');
        }
        return view('web.product',compact("product"));
    }
}
