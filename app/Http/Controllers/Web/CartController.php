<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id())->with('cart_products')->first();
        $cart_products = $user->cart_products;
        return view('web.cart',compact("cart_products"));
    }

    public function add_cart($id)
    {
        

        // Find in DB
        $product = Product::find($id);

        // If Find fails
        if (!$product) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        // Get User ID
        $user_id = Auth::id();


        try {

            // create Record
            $cart = Cart::create([   
                'user_id' => $user_id ,   
                'product_id' =>  $product->id ,   
            ]);

            if (!$cart) {  
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }

            return response()->json([
                "status" => 'success',
                "msg" => "Product added to your cart",
            ]);   

        }catch (\Exception $e) {
            
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);

        }
    }

}
