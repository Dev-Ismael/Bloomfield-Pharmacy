<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where( "user_id" , Auth::id() )->orderBy('id', 'DESC')->get();
        return view('web.orders' , compact('orders'));
    }


    public function create_order(Request $request)
    {

        // Check Validator
        $validator = Validator::make($request->all(), [
            'address'     =>  [ 'required' , 'string' , 'max:250' ],
            'phone'       =>  [ 'required' , 'string' , 'max:55' ],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'validation error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }

        // set var request Address / Phone
        $shipping_address = $request->address;
        $shipping_phone = $request->phone;

        // if Type another addrees
        if( $request->address == 'another_address'){
            // validate another_address
            $validator = Validator::make($request->all(), [
                'another_address' => [ 'required' , 'string' , 'max:250' ],
            ]);
            if ($validator->fails()) {
                return response() -> json([
                    'status' => 'error',
                    'msg'    => 'validation error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }
            // edit var shipping_address with new value
            $shipping_address = $request->another_address;
        }

        // if Type another addrees
        if( $request->phone == 'another_phone'){
            // validate another_phone
            $validator = Validator::make($request->all(), [
                'another_phone' => [ 'required' , 'string' , 'max:250' ],
            ]);
            if ($validator->fails()) {
                return response() -> json([
                    'status' => 'error',
                    'msg'    => 'validation error',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }
            // edit var shipping_phone with new value
            $shipping_phone = $request->another_phone;
        }


        // CartArray Validation
        $validator = Validator::make($request->all(), [
            'product_id'   =>  ['required' , 'array' ],
            'product_id.*' =>  ['required' , 'numeric' , 'distinct' ],
            'quantity'     =>  ['required' , 'array'],
            'quantity.*'   =>  ['required' , 'numeric' , 'digits_between:1,2'],
        ]);
        if ($validator->fails()) {
            return response() -> json([
                'status' => 'error',
                'msg'    => 'error at operation',
            ]);
        }

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

        // get carts_id
        $carts_ids = Cart::where("user_id", Auth::id())->pluck('id')->toArray();

        try {

            // Create Order Record
            $order = Order::create([
                'user_id'         => Auth::id(),
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
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }

            // Delete Carts
            $delete_carts = Cart::destroy( $carts_ids );
            if (!$delete_carts) {
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }

            // Create Notification 
            $notification = Notification::create([
                'user_id'  => Auth::id(),
                'link'     => route('admin.orders.show', $order->id),
                'content'  => "create_order" ,
            ]);

            if (!$notification) {
                return response()->json([
                    "status" => 'error',
                    "msg" => "error at operation",
                ]);
            }

            return response()->json([
                "status" => 'success',
                "msg" => "Order confirmed successfully",
            ]);


        }catch (\Exception $e) {

            return response()->json([
                "status" => 'error',
                "msg" => "error at operation",
            ]);

        }

    }
}
