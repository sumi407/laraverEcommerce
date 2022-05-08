<?php

namespace App\Http\Controllers\forntEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;
use App\Models\order;
use App\Models\User;
use App\Models\category;
use App\Models\orderItems;

use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function index(){
        $old_cartitems = cart::where('user_id',Auth::id())->get();

        foreach($old_cartitems as $item)
        {
            if(!product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeitem = cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeitem->delete();
                
            }
        }
        $cartitems = cart::where('user_id',Auth::id())->get();

        return view('fornttent.checkout',compact('cartitems'));
    }
    public function placeorder(Request $request)
    {
        $order = new order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        //To calculate the total price
        $total=0;
        $cartitems_total = cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $prod)
        {
            $qty =$prod->prod_qty;
            $total += $prod->product->selling_price * $qty;
        }
        $order->total_price = $total;
        $order->tracking_no = 'sumi'.rand(1111,9999);
        $order->save();

      
        $cartitems = cart::where('user_id',Auth::id())->get();
        foreach( $cartitems as $item)
        {
            orderItems::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->product->selling_price,

            ]);
            
            $prod = product::where('id',$item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        if(Auth::user()->address1 == NULL)
        {
            $user = User:: where('id', Auth::id())->first();

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->address1 = $request->input('address1');
        $user->address2 = $request->input('address2');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->pincode = $request->input('pincode');
        $user->update();
        }
        $cartitems = cart::where('user_id',Auth::id())->get();
        cart::destroy($cartitems);

        return redirect('/')->with('status',"Order Place Successfully");
       
    }
}
