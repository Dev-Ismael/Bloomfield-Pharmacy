<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Messege;
use App\Http\Requests\Messege\CreateCategoryRequest;
use App\Http\Requests\Messege\UpdateCategoryRequest;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class MessegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Dynamic pagination
        $messeges = Messege::orderBy('id','desc')->paginate( $num );
        return view("admin.messeges.index",compact("messeges"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messeges = Messege::orderBy('id','desc')->paginate( 10 );
        return view("admin.messeges.index",compact("messeges"));
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
        $messege = Messege::findOrFail($id);
        return view("admin.messeges.show" , compact("messege") ) ;
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
        $messege = Messege::findOrFail($id);

        // Delete Record from DB
        try {
            $delete = $messege->delete();
                return redirect() -> route("admin.messeges.index") -> with( [ "success" => " Messege deleted successfully"] ) ;
            if(!$delete)
                return redirect() -> route("admin.messeges.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.messeges.index") -> with( [ "failed" => "Error at delete opration"] ) ;
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

        $messeges = Messege::where('title', 'like', "%{$request->search}%")->paginate( 10 );
        return view("admin.messeges.index",compact("messeges"));

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
                $delete = Messege::destroy( $request->id );
                    return redirect() -> route("admin.messeges.index") -> with( [ "success" => " Messeges deleted successfully"] ) ;
                if(!$delete)
                    return redirect() -> route("admin.messeges.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.messeges.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }

    }


}
