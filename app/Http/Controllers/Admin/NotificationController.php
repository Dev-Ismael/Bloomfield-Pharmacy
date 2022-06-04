<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Requests\Notification\CreateUserRequest;
use App\Http\Requests\Notification\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class NotificationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function perPage( $num=10 )
    {
        // Dynamic pagination
        $notifications = Notification::orderBy('id','desc')->paginate( $num );
        return view("admin.notifications.index",compact("notifications"));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::orderBy('id','desc')->paginate( 10 );
        return view("admin.notifications.index",compact("notifications"));
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
        $notification = Notification::findOrFail($id);

        // Delete Record from DB
        try {
            $delete = $notification->delete();
                return redirect() -> route("admin.notifications.index") -> with( [ "success" => " Notification deleted successfully"] ) ;
            if(!$delete)
                return redirect() -> route("admin.notifications.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.notifications.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        }
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
                $delete = Notification::destroy( $request->id );
                    return redirect() -> route("admin.notifications.index") -> with( [ "success" => " Notifications deleted successfully"] ) ;
                if(!$delete)
                    return redirect() -> route("admin.notifications.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.notifications.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }


        // If Action is as_read
        if( $request->action == "as_read" ){
            try {
                $out_of_stock = Notification::whereIn('id', $request->id )->update([ 'as_read' => '1' ]);
                    return redirect() -> route("admin.notifications.index") -> with( [ "success" => " notifications updated successfully"] ) ;
                if(!$out_of_stock)
                    return redirect() -> route("admin.notifications.index") -> with( [ "failed" => "Error at update opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.notifications.index") -> with( [ "failed" => "Error at update opration"] ) ;
            }
        }
    }

    public function read_notification($id)
    {
        // Find in DB
        $notification = Notification::find($id);

        // Update Record
        $notification->update([
            'as_read' => '1' ,
        ]);

    }
}
