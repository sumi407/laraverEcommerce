<?php

namespace App\Http\Controllers\forntEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\review;

use App\Models\order;

use Illuminate\Support\Facades\Auth;


class reviewController extends Controller
{
    public function addreview($product_name)
    {
        $product_check = product::where('name',$product_name)->where('status','0')->first();
         
        if($product_check)
        {
            $product_id = $product_check->id;
            $verified_purchase= order::where('orders.user_id',Auth::id())->join('order_items','orders.id','order_items.order_id')->where('order_items.prod_id',$product_id)->get(); 
            return view('fornttent.reviews.index' , compact('product_check','verified_purchase'));

        }
        else
        {
            return redirect()->back()->with('status',"This line you followed was broken");
        }
    }
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = product::where('id',$product_id)->where('status','0')->first();
        if($product)
        {
            $user_review = $request->input('user_review');
            $new_review = review::create ([

                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review
            ]);
            $product_name = $product->name;
            $category_name = $product->category->name;
            if($new_review)
            {
                return redirect('category/'.$category_name.'/'.$product_name )->with('status',"Thank You");
            }
        }
        else {
            return redirect()->back()->with('status',"This line you followed was broken");

        }


    }
}
