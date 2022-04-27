<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{


    public function register(Request $request)
    {
                


        // Check Validator
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:55', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
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
                "msg" => "SignUp operation failed" ,
            ]);
        }

        return response() -> json([
            "status" => 'success' ,   // Created Successfully
            "msg" => "SignUp Operation Successfully , Login Now!" ,
        ]);


    }




    public function login(Request $request)
    {



        // Check Validator
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()

            ]); 
        }
        

        // credentials Success Create auth session
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response() -> json([
                "status" => 'success' ,   // Created Successfully
                "msg" => "Login Operation Successfully" ,
            ]);
        }
  
        // credentials invalid 
        return response() -> json([
            "status" => 'error' ,   // Created Successfully
            'msg'    => 'invalid credentials',
            "error" => "Oppes! You have entered invalid credentials" ,
        ]);

    }



}