<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Dynamic pagination
        $categories = Category::orderBy('id','desc')->paginate( $num );
        return view("admin.categories.index",compact("categories"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->paginate( 10 );
        return view("admin.categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        
        // Create img name
        $img_extention = $request -> img -> getClientOriginalExtension();
        $img_name = rand(1000000,10000000) . "." . $img_extention;   // name => 32632.png
        
        // Create icon name
        $icon_extention = $request -> icon -> getClientOriginalExtension();
        $icon_name = rand(1000000,10000000) . "." . $icon_extention;   // name => 3623628.png

        // Path
        $path = "images/categories" ;

        // Upload
        $request -> img -> move( $path , $img_name );
        $request -> icon  -> move( $path , $icon_name );

        $requestData = $request->all();

        // Add img name in request array 
        $requestData['img'] = $img_name;
        // Add icon name in request array 
        $requestData['icon'] = $icon_name;


        // Add slug to $requestData
        $requestData += [ 'slug' => SlugService::createSlug(Category::class, 'slug', $requestData['title']) ];

        // Store in DB
        try {
            $category = Category::create( $requestData );
                return redirect() -> route("admin.categories.index") -> with( [ "success" => " Category added successfully"] ) ;
            if(!$category) 
                return redirect() -> route("admin.categories.index") -> with( [ "failed" => "Error at added opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.categories.index") -> with( [ "failed" => "Error at added opration"] ) ;
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
        $category = Category::findOrFail($id);  
        return view("admin.categories.show" , compact("category") ) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find id in Db With Error 404
        $category = Category::findOrFail($id);  
        return view("admin.categories.edit" , compact("category") ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        
        
        // find id in Db With Error 404
        $category = Category::findOrFail($id); 
        $requestData = $request->all();


        // Check If There Images Uploaded
        $path = "images/categories" ;

        if( $request -> hasFile("icon") ){
            //  Upload image & Create name icon
            $icon_extention = $request -> icon -> getClientOriginalExtension();
            $icon_name = rand(1000000,10000000) . "." . $icon_extention;   // name => 3628.png
            $request -> icon -> move( $path , $icon_name );
        }else{
            $icon_name = $category->icon;
        }

        if( $request -> hasFile("img") ){
            //  Upload image & Create name img
            $img_extention = $request -> img -> getClientOriginalExtension();
            $img_name = rand(1000000,10000000) . "." . $img_extention;   // name => 3628.png
            $request -> img -> move( $path , $img_name );
        }else{
            $img_name = $category->img;
        }
        
        // Add icon name in request array 
        $requestData['icon'] = $icon_name;
        // Add img name in request array 
        $requestData['img'] = $img_name;


        // Add slug to $requestData
        $requestData += [ 'slug' => SlugService::createSlug(Category::class, 'slug', $requestData['title']) ];


        // Update Record in DB
        try {
            $update = $category-> update( $requestData );
                return redirect() -> route("admin.categories.index") -> with( [ "success" => " Category updated successfully"] ) ;
            if(!$update) 
                return redirect() -> route("admin.categories.index") -> with( [ "failed" => "Error at update opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.categories.index") -> with( [ "failed" => "Error at update opration"] ) ;
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
        $category = Category::findOrFail($id); 
        
        // Delete Record from DB
        try {
            $delete = $category->delete();
                return redirect() -> route("admin.categories.index") -> with( [ "success" => " Category deleted successfully"] ) ;
            if(!$delete) 
                return redirect() -> route("admin.categories.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.categories.index") -> with( [ "failed" => "Error at delete opration"] ) ;
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

        $categories = Category::where('title', 'like', "%{$request->search}%")->paginate( 10 );
        return view("admin.categories.index",compact("categories"));
         
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
                $delete = Category::destroy( $request->id );
                    return redirect() -> route("admin.categories.index") -> with( [ "success" => " Categories deleted successfully"] ) ;
                if(!$delete) 
                    return redirect() -> route("admin.categories.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.categories.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }

    }
    

}
