<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Product;
use App\Http\Requests\SubcategoryRequest;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Get Parent Rows Count
        $subcategoriesCount = Subcategory::count();
        // Dynamic pagination
        $products = Product::with('subcategory')->orderBy('id','desc')->paginate( $num );
        return view("admin.products.index",compact("products","subcategoriesCount"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Parent Rows Count
        $subcategoriesCount = Subcategory::count();
        $products = Product::with('subcategory')->orderBy('id','desc')->paginate( 10 );
        return view("admin.products.index",compact("products","subcategoriesCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategory = Subcategory::get();
        return view("admin.products.create" , compact("subcategory"));
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
        $requestData += [ 'slug' => SlugService::createSlug(Product::class, 'slug', $requestData['title']) ];


        // Store in DB
        try {
            $product = Product::create( $requestData );
                return redirect() -> route("admin.products.index") -> with( [ "success" => " Product added successfully"] ) ;
            if(!$product) 
                return redirect() -> route("admin.products.index") -> with( [ "failed" => "Error at added opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.products.index") -> with( [ "failed" => "Error at added opration"] ) ;
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
        $product = Product::with('subcategory')->findOrFail($id);
        return view("admin.products.show" , compact("product") ) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = Subcategory::get();
        // find id in Db With Error 404
        $product = Product::findOrFail($id);  
        return view("admin.products.edit" , compact("product","subcategory") ) ;
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
        $product = Product::findOrFail($id); 
        $requestData = $request->all();


        // Add slug to $requestData
        $requestData += [ 'slug' => SlugService::createSlug(Product::class, 'slug', $requestData['title']) ];


        // Update Record in DB
        try {
            $update = $product-> update( $requestData );
                return redirect() -> route("admin.products.index") -> with( [ "success" => " Product updated successfully"] ) ;
            if(!$update) 
                return redirect() -> route("admin.products.index") -> with( [ "failed" => "Error at update opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.products.index") -> with( [ "failed" => "Error at update opration"] ) ;
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
        $product = Product::findOrFail($id); 
        
        // Delete Record from DB
        try {
            $delete = $product->delete();
                return redirect() -> route("admin.products.index") -> with( [ "success" => " Product deleted successfully"] ) ;
            if(!$delete) 
                return redirect() -> route("admin.products.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.products.index") -> with( [ "failed" => "Error at delete opration"] ) ;
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

        $products = Product::where('title', 'like', "%{$request->search}%")->paginate( 10 );
        return view("admin.products.index",compact("products"));
         
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
                $delete = Product::destroy( $request->id );
                    return redirect() -> route("admin.products.index") -> with( [ "success" => " Products deleted successfully"] ) ;
                if(!$delete) 
                    return redirect() -> route("admin.products.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.products.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }

    }
    

}
