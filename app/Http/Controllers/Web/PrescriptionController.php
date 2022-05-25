<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    public function index()
    {
        // Get User ID
        $user_id = Auth::id();

        $prescriptions = Prescription::where("user_id", $user_id)->get();
        return view('web.prescriptions', compact('prescriptions'));
    }

    public function order_prescription()
    {
        return view('web.order_prescription');
    }

    public function upload_prescription(Request $request)
    {

        // Save Request in variable
        $requestData = $request->all();

        // Check Validator
        $this->validate($request, [
            'age'               =>  ['required', 'numeric', 'digits_between:1,3'],
            'gender'            =>  ['required', 'string', 'max:55'],
            'medicine'          =>  ['nullable', 'array',  'max:1000'],
            'medicine.*'        =>  ['nullable', 'string', 'distinct'],
            'img'               =>  ['required', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);


        //  Upload image & Create name img
        $file_extention = $request->img->getClientOriginalExtension();
        $file_name = time() . "." . $file_extention;   // name => 3628.png
        $path = "images/prescriptions";
        $request->img->move($path, $file_name);



        // update img name at $request var
        $requestData['img'] = $file_name;


        // Get User ID
        $user_id = Auth::id();

        // Add user ID in Request Variable
        $requestData += ['user_id' => $user_id];


        // Store in DB
        try {
            $prescription = Prescription::create($requestData);
            return redirect()->route("prescriptions")->with(["success" => " Prescription added successfully"]);
            if (!$prescription)
                return redirect()->route("prescriptions")->with(["failed" => "Error at added opration"]);
        } catch (\Exception $e) {
            return redirect()->route("prescriptions")->with(["failed" => "Error at added opration"]);
        }
    }
}
