<?php

namespace App\Http\Controllers\forntEnd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\category;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;



class cartController extends Controller
{
    public function addProduct(Request $request){
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = product::where('id',$product_id)->first();
            if($prod_check){
                if(cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                   return response()->json(['status'=>$prod_check->name." Already Added to cart"]);

                }
                else{
                    $cartItem=new cart();
                    $cartItem->prod_id=$product_id;
                    $cartItem->prod_qty=$product_qty;
                    $cartItem->user_id= Auth::id();
                    $cartItem->save();
                   return response()->json(['status'=>$prod_check->name." Added to cart"]);
    
                }

            }
        }
        else
        {
               return response()->json(['status'=>"Login to continue"]);
        }


    }
    public function viewcart(){
        $cartitems= cart::where('user_id',Auth::id())->get();
        return view('fornttent.cart',compact('cartitems'));

    }

    public function deleteprod(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            if(cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())

            {
                $cartitem=cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartitem->delete();
                  return response()->json(['status' => "Product deleted"]);


            }
        }
        else{
            return response()->json(['status' => "Login to   continue"]);
        }
      

    }
    public function updatecart(Request $request){

        $prod_id =$request->input('prod_id');
        $product_qty =$request->input('prod_qty');
        if(Auth::check())
        {
            if(cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cart=cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty=$product_qty;
                $cart->update();
                return response()->json(['status' => "quentity updated"]);

            }

        }


    }
     
    public function cartcount()
    {
        $cartcount = cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }
}
