<?php

namespace App\Http\Controllers\forntEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\product;

use App\Models\rating;


use Illuminate\Support\Facades\Auth;

class ratingController extends Controller
{
    public function addRatting(Request $request){
         $stars_rated= $request->input('product_rating');
         $product_id = $request->input('product_id');

         $product_check =product::where('id',$product_id)->where('status','0')->get();
         if($product_check)
         {
             $verified_purchase= order::where('orders.user_id',Auth::id())->join('order_items','orders.id','order_items.order_id')->where('order_items.prod_id',$product_id)->get();
             if($verified_purchase->count() > 0)
             { 
                 $already_rated=rating::where('user_id',Auth::id())->where('prod_id',$product_id)->first();

                 if($already_rated)
                 {
                     $already_rated->stars_rated=$stars_rated;
                     $already_rated->update();

                 }
                 else{

                    rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'stars_rated' => $stars_rated,
    
                    ]);
                 }
                 
                 return redirect()->back()->with('status',"Thank You");
                }

             
             else
             {
                 return redirect()->back()->with('status',"You can not rate a product without purchase");
             }
         }
         else
         {
            return redirect()->back()->with('status',"Product does not exists");
        }
    }
      
}
