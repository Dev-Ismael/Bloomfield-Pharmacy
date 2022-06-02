<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Prescription;
use App\Models\PrescriptionOrder;
use Carbon\Carbon;
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

        // if null field insert empty array
        if( $request->medicine == [null] ){
            $requestData['medicine'] = [] ;
        }

        // Store in DB
        try {

            $prescription = Prescription::create($requestData);
            if (!$prescription)
                return redirect()->route("prescriptions")->with(["failed" => "Error at added opration"]);

            // Create Notification 
            $notification = Notification::create([
                'user_id'  => Auth::id(),
                'link'     => route('admin.prescriptions.show', $prescription->id),
                'content'  => "upload_prescriotion" ,
            ]);
            if (!$notification) 
                return redirect()->route("prescriptions")->with(["failed" => "Error at added opration"]);
            

            return redirect()->route("prescriptions")->with(["success" => " Prescription added successfully"]);

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

    public function start_prescription_schedule($id)
    {


        // Find in DB
        $prescription = Prescription::find($id);

        // If Find fails
        if (!$prescription) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        //  prescription must valid
        if ( $prescription->validation != '2' ) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        // Get User ID
        $user_id = Auth::id();

        // check if not auth user
        if ($prescription->user_id != $user_id) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        // Update Record
        $update = $prescription->update([
            'schedule_orders' => '1' ,
            'scheduled_start' => Carbon::now(),
        ]);

        if (!$update) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        return response()->json([
            "status" => 'success',
            "msg" => "update operation successfully",
        ]);

    }

    public function stop_prescription_schedule($id)
    {


        // Find in DB
        $prescription = Prescription::find($id);

        // If Find fails
        if (!$prescription) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        // prescription must valid
        if ( $prescription->validation != '2' ) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        // Get User ID
        $user_id = Auth::id();

        // check if not auth user
        if ($prescription->user_id != $user_id) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        // Update Record
        $update = $prescription->update([
            'schedule_orders' => '0' ,
            'scheduled_start' => Null,
        ]);

        if (!$update) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        return response()->json([
            "status" => 'success',
            "msg" => "update operation successfully",
        ]);

    }

    public function create_prescription_orders($id)
    {


        // Find in DB
        $prescription = Prescription::find($id);

        // If Find fails
        if (!$prescription) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        // prescription must valid
        if ( $prescription->validation != '2' ) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        // Get User ID
        $user_id = Auth::id();

        // check if not auth user
        if ($prescription->user_id != $user_id) {
            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);
        }

        try {

            // create Record
            $prescription_order = PrescriptionOrder::create([
                'user_id'          => $user_id ,
                'prescription_id' =>  $id ,
            ]);

            if (!$prescription_order) {
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }


            // Create Notification 
            $notification = Notification::create([
                'user_id'  => Auth::id(),
                'link'     => route('admin.prescription_orders.show', $prescription_order->id),
                'content'  => "create_prescription_order" ,
            ]);

            if (!$notification) {
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }

            return response()->json([
                "status" => 'success',
                "msg" => "Orders request sent successfully!",
            ]);

        }catch (\Exception $e) {

            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);

        }

    }

}
