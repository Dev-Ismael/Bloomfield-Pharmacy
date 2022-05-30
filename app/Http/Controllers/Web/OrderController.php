<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        return view('web.orders');
    }


    public function create_order(Request $request)
    {

        // Check Validator
        $validator = Validator::make($request->all(), [
            'address'     =>  [ 'required' , 'string' , 'max:250' ],
            'phone'       =>  [ 'required' , 'string' , 'max:55' ],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        // return response()->json([
        //     "request" => $request->all(),
        // ]);


    }
}
