<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messege;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('web.contact');
    }

    public function send_messege(Request $request){

        // Check Validator
        $validator = Validator::make($request->all(), [
            'name'        =>  ['required', 'string', 'max:55'],
            'email'       =>  ['required', 'email', 'max:55'],
            'subject'     =>  ['required', 'string', 'max:100'],
            'messege'     =>  ['required', 'string', 'max:4000'],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }


        try {

        // Create messge in DB
        $messge = Messege::create($request->all());
        if(!$messge){  // If Create messge fails
            return response() -> json([
                "status" => 'error' ,
                "msg" => "insert operation failed" ,
            ]);
        }

            return response()->json([
                "status" => 'success',
                "msg" => "Messge Sent Successfully",
            ]);

        }catch (\Exception $e) {

            return response()->json([
                "status" => 'error',
                "msg" => "insert operation failed" ,
            ]);

        }

    }

}
