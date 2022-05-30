<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('web.orders');
    }


    public function create_order(Request $request)
    {
        
        
        return response()->json([
            "request" => $request->all(),
        ]);


    }
}
