<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messege;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
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

            // Create messege in DB
            $messege = Messege::create($request->all());
            if(!$messege){  // If Create messege fails
                return response() -> json([
                    "status" => 'error' ,
                    "msg" => "insert operation failed" ,
                ]);
            }

            if (Auth::check()){
                $user_id = Auth::id();
            }else{
                $user_id = 0;
            }

            // Create Notification
            $notification = Notification::create([
                'user_id'  => $user_id,
                'link'     => route('admin.messeges.show', $messege->id ),
                'content'  => "messege_sent" ,
            ]);
            if (!$notification){
                return response() -> json([
                    "status" => 'error' ,
                    "msg" => "error at notification" ,
                ]);
            }

            return response()->json([
                "status" => 'success',
                "msg" => "Messege Sent Successfully",
            ]);

        }catch (\Exception $e) {

            return response()->json([
                "status" => 'error',
                "msg" => "insert operation failed" ,
            ]);

        }

    }

}
