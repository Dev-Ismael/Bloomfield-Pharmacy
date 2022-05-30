<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Get User ID
        $user_id = Auth::id();
        $user = User::find( $user_id )->first();
        return view('web.profile',compact('user'));
        // return $user;
    }

    public function update_profile(Request $request)
    {

        // Check Validator
        $validator = Validator::make($request->all(), [
            'first_name'     =>  [ 'nullable' , 'string' , 'max:55' ],
            'last_name'      =>  [ 'nullable' , 'string' , 'max:55' ],
            'phone'          =>  [ 'nullable' , 'array' , 'max:100'],
            'phone.*'        =>  [ 'nullable' , 'string' , 'max:40'],
            'email_2'        =>  [ 'nullable' , 'email' , 'max:55' ],
            'state'          =>  [ 'nullable' , 'string' , 'max:55' ],
            'address'        =>  [ 'nullable' , 'array' , 'max:750'],
            'address.*'      =>  [ 'nullable' , 'string' , 'max:200'],

        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        // Get User ID
        $user_id = Auth::id();

        // Get User info
        $user = User::find($user_id)->first();


        try {

            // Update Record
            $update = $user->update($request->all());

            if (!$update) {
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }

            return response()->json([
                "status" => 'success',
                "msg" => "your info saved successfully",
            ]);

        }catch (\Exception $e) {

            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);

        }

    }
}
