<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\SubcategoryRequest;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Get Parent Rows Count
        $categoriesCount = Category::count();
        // Dynamic pagination
        $subcategories = Subcategory::with('category')->orderBy('id','desc')->paginate( $num );
        return view("admin.subcategories.index",compact("subcategories","categoriesCount"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Parent Rows Count
        $categoriesCount = Category::count();
        $subcategories = Subcategory::with('category')->orderBy('id','desc')->paginate( 10 );
        return view("admin.subcategories.index",compact("subcategories","categoriesCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view("admin.subcategories.create" , compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {

        $requestData = $request->all();

        // Add slug to $requestData
        $requestData += [ 'slug' => SlugService::createSlug(Subcategory::class, 'slug', $requestData['title']) ];


        // Store in DB
        try {
            $subcategory = Subcategory::create( $requestData );
                return redirect() -> route("admin.subcategories.index") -> with( [ "success" => " Subcategory added successfully"] ) ;
            if(!$subcategory) 
                return redirect() -> route("admin.subcategories.index") -> with( [ "failed" => "Error at added opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.subcategories.index") -> with( [ "failed" => "Error at added opration"] ) ;
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
        $subcategory = Subcategory::with('category')->findOrFail($id);
        return view("admin.subcategories.show" , compact("subcategory") ) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        // find id in Db With Error 404
        $subcategory = Subcategory::findOrFail($id);  
        return view("admin.subcategories.edit" , compact("subcategory","categories") ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, $id)
    {
        
        
        // find id in Db With Error 404
        $subcategory = Subcategory::findOrFail($id); 
        $requestData = $request->all();


        // Add slug to $requestData
        $requestData += [ 'slug' => SlugService::createSlug(Subcategory::class, 'slug', $requestData['title']) ];


        // Update Record in DB
        try {
            $update = $subcategory-> update( $requestData );
                return redirect() -> route("admin.subcategories.index") -> with( [ "success" => " Subcategory updated successfully"] ) ;
            if(!$update) 
                return redirect() -> route("admin.subcategories.index") -> with( [ "failed" => "Error at update opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.subcategories.index") -> with( [ "failed" => "Error at update opration"] ) ;
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
        $subcategory = Subcategory::findOrFail($id); 
        
        // Delete Record from DB
        try {
            $delete = $subcategory->delete();
                return redirect() -> route("admin.subcategories.index") -> with( [ "success" => " Subcategory deleted successfully"] ) ;
            if(!$delete) 
                return redirect() -> route("admin.subcategories.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.subcategories.index") -> with( [ "failed" => "Error at delete opration"] ) ;
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

        $subcategories = Subcategory::where('title', 'like', "%{$request->search}%")->paginate( 10 );
        return view("admin.subcategories.index",compact("subcategories"));
         
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
                $delete = Subcategory::destroy( $request->id );
                    return redirect() -> route("admin.subcategories.index") -> with( [ "success" => " Subcategories deleted successfully"] ) ;
                if(!$delete) 
                    return redirect() -> route("admin.subcategories.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.subcategories.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }

    }
    

}
