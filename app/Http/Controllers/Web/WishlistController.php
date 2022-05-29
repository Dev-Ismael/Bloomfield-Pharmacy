<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id())->with('wishlist_products')->first();
        $wishlist_products = $user->wishlist_products;
        return view('web.wishlist',compact("wishlist_products"));
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


    public function remove_wishlist($id)
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

            // Get Record
            $wishlist = Wishlist::where("user_id", $user_id )->where("product_id", $product->id)->first();
            // Delete Record
            $delete = $wishlist->delete();
            if (!$delete) {  
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }

            return response()->json([
                "status" => 'success',
                "msg" => "Product removed to your wishlist",
            ]);   

        }catch (\Exception $e) {
            
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);

        }


    }
}