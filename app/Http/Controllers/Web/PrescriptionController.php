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

        $prescriptions = Prescription::where("user_id", $user_id)->orderBy('id', 'DESC')->get();
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

        // Filter emptyFields 
        $requestData['medicine'] = array_filter($requestData['medicine']);

        // if medicine is empety array 
        if ($requestData['medicine'] == []) {
            $requestData['medicine'] = Null;
        }

        // return $requestData['medicine'];

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

    public function delete_prescription($id)
    {

        // Find in DB
        $prescription = Prescription::find($id);

        // If Find fails
        if (!$prescription) {
            return response()->json([
                "status" => 'error',
                "msg" => "delete operation failed",
            ]);
        }

        // Get User ID
        $user_id = Auth::id();

        // check if not auth user
        if ($prescription->user_id != $user_id) {
            return response()->json([
                "status" => 'error',
                "msg" => "delete operation failed",
            ]);
        }

        // Delete Record
        $delete = $prescription->delete();
        if (!$delete) {  // If update work fails
            return response()->json([
                "status" => 'error',
                "msg" => "delete operation failed",
            ]);
        }

        return response()->json([
            "status" => 'success',
            "msg" => "delete operation successfully",
        ]);

    }
}
