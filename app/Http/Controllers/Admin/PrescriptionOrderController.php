<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PrescriptionOrder;
use App\Http\Requests\PrescriptionOrderRequest;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PrescriptionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Dynamic pagination
        $prescription_orders = PrescriptionOrder::with('prescription')->orderBy('id','desc')->paginate( $num );
        return view("admin.prescription_orders.index",compact("prescription_orders"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescription_orders = PrescriptionOrder::with('prescription')->orderBy('id','desc')->paginate( 10 );
        return view("admin.prescription_orders.index",compact("prescription_orders"));
        // return $prescription_orders;
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
        $prescription_order = PrescriptionOrder::with('prescription')->findOrFail($id);
        return view("admin.prescription_orders.show" , compact("prescription_order") ) ;
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
        $prescription_order = PrescriptionOrder::findOrFail($id);  
        return view("admin.prescription_orders.edit" , compact("prescription_order","users") ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrescriptionOrderRequest $request, $id)
    {
        // find id in Db With Error 404
        $prescription_order = PrescriptionOrder::findOrFail($id); 
        $requestData = $request->all();
        


        // Update Record in DB
        try {
            $update = $prescription_order-> update( $requestData );
                return redirect() -> route("admin.prescription_orders.index") -> with( [ "success" => " Prescription Order updated successfully"] ) ;
            if(!$update) 
                return redirect() -> route("admin.prescription_orders.index") -> with( [ "failed" => "Error at update opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.prescription_orders.index") -> with( [ "failed" => "Error at update opration"] ) ;
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
        $prescription_order = PrescriptionOrder::findOrFail($id); 
        
        // Delete Record from DB
        try {
            $delete = $prescription_order->delete();
                return redirect() -> route("admin.prescription_orders.index") -> with( [ "success" => " Prescription Order deleted successfully"] ) ;
            if(!$delete) 
                return redirect() -> route("admin.prescription_orders.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.prescription_orders.index") -> with( [ "failed" => "Error at delete opration"] ) ;
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
        $prescription_orders = PrescriptionOrder::where('user_id', $userId)->paginate(10);
        // return $prescription_orders; 
        return view("admin.prescription_orders.index",compact("prescription_orders"));
         
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
            $validator->getMessageBag()->add('action', 'Pease select rows..');
            return redirect()->back()->withErrors($validator)->withInput();
        }
            
        // If Action is Delete
        if( $request->action == "delete" ){
            try {
                $delete = PrescriptionOrder::destroy( $request->id );
                    return redirect() -> route("admin.prescription_orders.index") -> with( [ "success" => " Prescription Order deleted successfully"] ) ;
                if(!$delete) 
                    return redirect() -> route("admin.prescription_orders.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.prescription_orders.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }
        

    }
    

}
