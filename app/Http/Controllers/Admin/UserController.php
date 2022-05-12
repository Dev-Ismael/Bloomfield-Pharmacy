<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Dynamic pagination
        $users = User::orderBy('id','desc')->paginate( $num );
        return view("admin.users.index",compact("users"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate( 10 );
        return view("admin.users.index",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        
        $requestData = $request->all();
        // Hash Password
        $requestData['password'] = Hash::make($request->password);

        // Store in DB
        try {
            $user = User::create( $requestData );
                return redirect() -> route("admin.users.index") -> with( [ "success" => " user added successfully"] ) ;
            if(!$user) 
                return redirect() -> route("admin.users.index") -> with( [ "failed" => "error at added opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.users.index") -> with( [ "failed" => "error at added opration"] ) ;
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
        $user = User::findOrFail($id);  
        return view("admin.users.show" , compact("user") ) ;
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
        $user = User::findOrFail($id);  
        return view("admin.users.edit" , compact("user") ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // find id in Db With Error 404
        $user = User::findOrFail($id); 
        $requestData = $request->all();

        // Hash Password
        if( $requestData['password'] == '' ){
            $requestData['password'] = $user->password;
        }else{
            $requestData['password'] = Hash::make($request->password);
        }

        // Update Record in DB
        try {
            $update = $user-> update( $requestData );
                return redirect() -> route("admin.users.index") -> with( [ "success" => " user updated successfully"] ) ;
            if(!$update) 
                return redirect() -> route("admin.users.index") -> with( [ "failed" => "error at update opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.users.index") -> with( [ "failed" => "error at update opration"] ) ;
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
        $user = User::findOrFail($id); 
        
        // Delete Record from DB
        try {
            $delete = $user->delete();
                return redirect() -> route("admin.users.index") -> with( [ "success" => " user deleted successfully"] ) ;
            if(!$delete) 
                return redirect() -> route("admin.users.index") -> with( [ "failed" => "error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.users.index") -> with( [ "failed" => "error at delete opration"] ) ;
        }
    }
}