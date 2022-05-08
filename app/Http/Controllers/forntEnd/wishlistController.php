<?php

namespace App\Http\Controllers\forntEnd;

use App\Http\Controllers\Controller;
use App\Models\wishlist;
use App\Models\product;
use App\Models\category;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class wishlistController extends Controller
{
    public function index()
    { 
        $wishlist = wishlist::where('user_id',Auth::id())->get();
        return view('fornttent.wishlist',compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            

            $prod_check = product::where('id',$product_id)->first();
          
            if($prod_check){

            if(wishlist::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
            {
               return response()->json(['status'=>$prod_check->name." Already Added to wishlist"]);

            }
            else
            {
                $wish = new wishlist();
                $wish->prod_id = $product_id;
                $wish->prod_id = $product_id;

                $wish->user_id = Auth::id();
                $wish->save();

            return response()->json(['status'=> "Product Added wishlist" ]);    


            }
        }
          
        }
        else
        {
            return response()->json(['status'=>"Login to continue"]);    
        }
    }
    public function deletewishlist(Request $request)
    {
        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            if(wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())

            {
                $wish=wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $wish->delete();
                  return response()->json(['status' => "Product deleted from wishlist"]);


            }
        }
        else{
            return response()->json(['status' => "Login to   continue"]);
        }
    }
    public function wishcount()
    {
        $wishcount = wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$wishcount]);
    }
}
