<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prescription;
use App\Http\Requests\Prescription\CreateProductRequest;
use App\Http\Requests\Prescription\UpdateProductRequest;
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
        $subcategories = Subcategory::get();
        return view("admin.prescriptions.create" , compact("subcategories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        //  Upload image & Create name img
        $file_extention = $request->img -> getClientOriginalExtension();
        $file_name = time() . "." . $file_extention;   // name => 3628.png
        $path = "images/prescriptions" ;
        $request -> img -> move( $path , $file_name );


        $requestData = $request->all();
        $requestData['img'] = $file_name;

        // Add slug to $requestData
        $requestData += [ 'slug' => SlugService::createSlug(Prescription::class, 'slug', $requestData['title']) ];


        // return $requestData;

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
        $subcategories = Subcategory::get();
        // find id in Db With Error 404
        $prescription = Prescription::findOrFail($id);  
        return view("admin.prescriptions.edit" , compact("prescription","subcategories") ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
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

        // Add slug to $requestData
        $requestData += [ 'slug' => SlugService::createSlug(Prescription::class, 'slug', $requestData['title']) ];

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
            'search'     =>  ['required', 'string', 'max:55'],
        ]);

        $prescriptions = Prescription::where('title', 'like', "%{$request->search}%")->paginate( 10 );
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
            $validator->getMessageBag()->add('action', 'Pease select rows..');
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
            
        // If Action is Delete
        if( $request->action == "out_of_stock" ){
            try {
                $out_of_stock = Prescription::whereIn('id', $request->id )->update([ 'quantity' => 0 ]);
                    return redirect() -> route("admin.prescriptions.index") -> with( [ "success" => " Prescriptions updated successfully"] ) ;
                if(!$out_of_stock) 
                    return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at update opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.prescriptions.index") -> with( [ "failed" => "Error at update opration"] ) ;
            }
        }

    }
    

}
