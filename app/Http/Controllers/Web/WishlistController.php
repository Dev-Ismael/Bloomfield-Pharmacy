<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        return view('web.wishlist');
    }

    public function add_wishlist($id)
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
            $wishlist = Wishlist::create([   
                'user_id' => $user_id ,   
                'product_id' =>  $product->id ,   
            ]);

            if (!$wishlist) {  
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }

            return response()->json([
                "status" => 'success',
                "msg" => "Product added to your wishlist",
            ]);   

        }catch (\Exception $e) {
            
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);

        }
    }

}
