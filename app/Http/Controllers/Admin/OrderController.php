<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
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
        $orders = Order::with('user')->orderBy('id','desc')->paginate( $num );
        return view("admin.orders.index",compact("orders","userCount"));
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
        $orders = Order::with('user')->orderBy('id','desc')->paginate( 10 );
        return view("admin.orders.index",compact("orders","userCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $products = Product::orderBy('title','asc')->get();
        return view("admin.orders.create" , compact("users","products"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {

        // set var request Address / Phone
        $shipping_address = $request->address;
        $shipping_phone = $request->phone;


        // get product_id
        $product_id = $request->product_id;

        // get Product Price by product_id
        $products_prices = Product::whereIn('id', $product_id)->pluck('final_price')->toArray();

        // get quantity
        $quantity = $request->quantity;

        // create Calc array
        $calcArray = array_combine($products_prices, $quantity);

        // create cart array
        $cartArray = array_combine($product_id, $quantity);

        // New array has multiplicate (product_id * quantity)
        $multiplicateCalcArray = [];
        foreach($calcArray as $products_prices => $quantity){
            array_push($multiplicateCalcArray, ($products_prices * $quantity) );
        }

        // SubTotal
        $subTotal = array_sum($multiplicateCalcArray);

        // taxes Var
        $taxes_percentage = 5;
        $taxes = ( $taxes_percentage / 100 )* $subTotal;

        // shiping shiping fees
        $shiping = 5 ;

        // Total price
        $total = $subTotal + $taxes + $shiping ;

        // Store in DB
        try {
            $order = Order::create([
                'user_id'         => $request->user_id,
                'address'         => $shipping_address,
                'phone'           => $shipping_phone,
                'cart'            => $cartArray,
                'subtotal'        => $subTotal,
                'taxes_percentage'=> $taxes_percentage,
                'taxes'           => $taxes,
                'shiping'         => $shiping,
                'total'           => $total,
            ]);
            if (!$order) {
                return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at added opration"] ) ;
            }
            return redirect() -> route("admin.orders.index") -> with( [ "success" => " Order added successfully"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at added opration"] ) ;
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
        $order = Order::with('user')->findOrFail($id);
        return view("admin.orders.show" , compact("order") ) ;
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
        $products = Product::orderBy('title','asc')->get();

        $order = Order::findOrFail($id);
        return view("admin.orders.edit" , compact("order","users","products") ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {

        // set var request Address / Phone
        $shipping_address = $request->address;
        $shipping_phone = $request->phone;


        // get product_id
        $product_id = $request->product_id;

        // get Product Price by product_id
        $products_prices = Product::whereIn('id', $product_id)->pluck('final_price')->toArray();

        // get quantity
        $quantity = $request->quantity;

        // create Calc array
        $calcArray = array_combine($products_prices, $quantity);

        // create cart array
        $cartArray = array_combine($product_id, $quantity);

        // New array has multiplicate (product_id * quantity)
        $multiplicateCalcArray = [];
        foreach($calcArray as $products_prices => $quantity){
            array_push($multiplicateCalcArray, ($products_prices * $quantity) );
        }

        // SubTotal
        $subTotal = array_sum($multiplicateCalcArray);

        // taxes Var
        $taxes_percentage = 5;
        $taxes = ( $taxes_percentage / 100 )* $subTotal;

        // shiping shiping fees
        $shiping = 5 ;

        // Total price
        $total = $subTotal + $taxes + $shiping ;

        // find id in Db With Error 404
        $order = Order::findOrFail($id);

        // Store in DB
        try {
            $update = $order->update([
                'user_id'         => $request->user_id,
                'address'         => $shipping_address,
                'phone'           => $shipping_phone,
                'cart'            => $cartArray,
                'subtotal'        => $subTotal,
                'taxes_percentage'=> $taxes_percentage,
                'taxes'           => $taxes,
                'shiping'         => $shiping,
                'total'           => $total,
                'status'          => $request->status,
            ]);
            if (!$update) {
                return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at added opration"] ) ;
            }
            return redirect() -> route("admin.orders.index") -> with( [ "success" => " Order Updated successfully"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at added opration"] ) ;
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
        $order = Order::findOrFail($id);

        // Delete Record from DB
        try {
            $delete = $order->delete();
                return redirect() -> route("admin.orders.index") -> with( [ "success" => " Order deleted successfully"] ) ;
            if(!$delete)
                return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at delete opration"] ) ;
        } catch (\Exception $e) {
            return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at delete opration"] ) ;
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
        $orders = Order::where('user_id', $userId)->paginate(10);
        // return $orders;
        return view("admin.orders.index",compact("orders"));

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
                $delete = Order::destroy( $request->id );
                    return redirect() -> route("admin.orders.index") -> with( [ "success" => " Orders deleted successfully"] ) ;
                if(!$delete)
                    return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at delete opration"] ) ;
            }
        }

        // If status shipped
        if( $request->action == "status_shipped" ){
            try {
                $vaild = Order::whereIn('id', $request->id )->update([ 'status' => '2' ]);
                    return redirect() -> route("admin.orders.index") -> with( [ "success" => " Orders updated successfully"] ) ;
                if(!$vaild)
                    return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at update opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at update opration"] ) ;
            }
        }

        // If Action status EnRoute
        if( $request->action == "status_enRoute" ){
            try {
                $not_vaild = Order::whereIn('id', $request->id )->update([ 'status' => '3' ]);
                    return redirect() -> route("admin.orders.index") -> with( [ "success" => " Orders updated successfully"] ) ;
                if(!$not_vaild)
                    return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at update opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at update opration"] ) ;
            }
        }

        // If Action status_arrived
        if( $request->action == "status_arrived" ){
            try {
                $not_vaild = Order::whereIn('id', $request->id )->update([ 'status' => '4' ]);
                    return redirect() -> route("admin.orders.index") -> with( [ "success" => " Orders updated successfully"] ) ;
                if(!$not_vaild)
                    return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at update opration"] ) ;
            } catch (\Exception $e) {
                return redirect() -> route("admin.orders.index") -> with( [ "failed" => "Error at update opration"] ) ;
            }
        }

    }


}
