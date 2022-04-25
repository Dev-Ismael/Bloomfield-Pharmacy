<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CustomAuthController extends Controller
{


    public function register(Request $request)
    {
                


        // Check Validator
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()

            ]); 
        }
        



        // Create User in DB
        $user = User::create([   // User mean model and 
            'name'      => $request -> name ,    
            'email'     => $request -> email , 
            'password' => Hash::make( $request -> password ),
        ]);
        if(!$user){  // If Create user fails
            return response() -> json([
                "status" => 'error' ,   
                "msg" => "insert operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // Created Successfully
            "msg" => "user created successfully" ,
        ]);


    }


}