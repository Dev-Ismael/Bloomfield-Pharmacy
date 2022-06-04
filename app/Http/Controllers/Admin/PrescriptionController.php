<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prescription;
use App\Http\Requests\Prescription\CreatePrescriptionRequest;
use App\Http\Requests\Prescription\UpdatePrescriptionRequest;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Get Parent Rows Count
        $userCount = User::count();
        // Dynamic pagination
        $prescriptions = Prescription::with('user')->orderBy('id','desc')->paginate( $num );
        return view("admin.prescriptions.index",compact("prescriptions","userCount"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Parent Rows Count
        $userCount = User::count();
        $prescriptions = Prescription::with('user')->orderBy('id','desc')->paginate( 10 );
        return view("admin.prescriptions.index",compact("prescriptions","userCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        return view("admin.prescriptions.create" , compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePrescriptionRequest $request)
    {



        //  Upload image & Create name img
        $file_extention = $request->img -> getClientOriginalExtension();
        $file_name = time() . "." . $file_extention;   // name => 3628.png
        $path = "images/prescriptions" ;
        $request -> img -> move( $path , $file_name );


        $requestData = $request->all();
        $requestData['img'] = $file_name;



        // Store in DB
        try {
            $prescription = Prescription::create( $requestData );
                return redirect() -> route("admin.prescriptions.index") -> with( [ "success" => " Prescription added successfully"] ) ;
            if(!$prescription)
                return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at added opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at added opration"] ) ;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find id in Db With Error 404
        $prescription = Prescription::with('user')->findOrFail($id);
        return view("admin.prescriptions.show" , compact("prescription") ) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::get();
        // find id in Db With Error 404
        $prescription = Prescription::findOrFail($id);
        return view("admin.prescriptions.edit" , compact("prescription","users") ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrescriptionRequest $request, $id)
    {


        // find id in Db With Error 404
        $prescription = Prescription::findOrFail($id);
        $requestData = $request->all();


        // Check If There img Uploaded
        if( $request-> hasFile("img") ){
            //  Upload image & Create name img
            $file_extention = $request->img -> getClientOriginalExtension();
            $file_name = time() . "." . $file_extention;   // name => 3628.png
            $path = "images/prescriptions" ;
            $request->img -> move( $path , $file_name );
        }else{
            $file_name = $prescription->img;
        }

        $requestData = $request->all();
        $requestData['img'] = $file_name;


        // Update Record in DB
        try {
            $update = $prescription-> update( $requestData );
                return redirect() -> route("admin.prescriptions.index") -> with( [ "success" => " Prescription updated successfully"] ) ;
            if(!$update)
                return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at update opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at update opration"] ) ;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find id in Db With Error 404
        $prescription = Prescription::findOrFail($id);

        // Delete Record from DB
        try {
            $delete = $prescription->delete();
                return redirect() -> route("admin.prescriptions.index") -> with( [ "success" => " Prescription deleted successfully"] ) ;
            if(!$delete)
                return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        }
    }





    /**
     * search in record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // validate search and redirect back
        $this->validate($request, [
            'search'     =>  ['required', 'string', 'email', 'max:55'],
        ]);

        $userId = User::where('email', 'like', "%{$request->search}%")->first()->id;
        // return $userId;
        $prescriptions = Prescription::where('user_id', $userId)->paginate(10);
        // return $prescriptions;
        return view("admin.prescriptions.index",compact("prescriptions"));

    }



    public function multiAction(Request $request)
    {

        // Validator at action
        $validator = Validator::make($request->all(),[
            "action" => 'required | string',
        ]);

        // Check If request->id exist
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();

        // Check If request->id exist & add validation Msg
        if( !$request->has('id') ){
            $validator->getMessageBag()->add('action', 'Please select rows..');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If Action is Delete
        if( $request->action == "delete" ){
            try {
                $delete = Prescription::destroy( $request->id );
                    return redirect() -> route("admin.prescriptions.index") -> with( [ "success" => " Prescriptions deleted successfully"] ) ;
                if(!$delete)
                    return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }

        // If Action is Vaild
        if( $request->action == "vaild" ){
            try {
                $vaild = Prescription::whereIn('id', $request->id )->update([ 'validation' => '2' ]);
                    return redirect() -> route("admin.prescriptions.index") -> with( [ "success" => " Prescriptions updated successfully"] ) ;
                if(!$vaild)
                    return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at update opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at update opration"] ) ;
            }
        }

        // If Action is Not Vaild
        if( $request->action == "not_vaild" ){
            try {
                $not_vaild = Prescription::whereIn('id', $request->id )->update([ 'validation' => '0' ]);
                    return redirect() -> route("admin.prescriptions.index") -> with( [ "success" => " Prescriptions updated successfully"] ) ;
                if(!$not_vaild)
                    return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at update opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at update opration"] ) ;
            }
        }

    }


}
