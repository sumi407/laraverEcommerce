<?php

namespace App\Http\Controllers\forntEnd;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\category;
use App\Models\rating;
use App\Models\review;
;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class forntendController extends Controller
{
    public function index(){
        $featured_product=product::where ('trending','1')->take(15)->get();
        $trending_cat = category::where ('popular','1')->take(15)->get();

        return View('fornttent.home',compact('featured_product','trending_cat'));
    }
    public function category(){
        $category = category::where('status','0')->get();
        return view('fornttent.category',compact('category'));
    }
    public function viewcat($id){
        if(category::where('id',$id)->exists())
        {
            $category=category::where('id', $id)->first();
            $product= product::where('cate_id', $category->id)->where('status','0')->get();
            return view ('fornttent.product.shop',compact('category','product'));
        }
        else{
            return redirect('/')->with('status',"product does not exists");
        }
    }
    public function productview($cate_name,$item_name){
        if(category::where('name',$cate_name)->exists())
        {
            if(product::where('name',$item_name)->exists())
            {
                $product =product::where('name',$item_name)->first();
                $rating = rating::where('prod_id',$product->id)->get();
                $rating_sum = rating::where('prod_id',$product->id)->sum('stars_rated');
                $user_rating = rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
                $reviews =review::where('prod_id' , $product->id)->get();
                if($rating->count() > 0)
                {
                    $rating_value = $rating_sum/$rating->count();
                }
                else{
                    $rating_value = 0;
                }
                return view ('fornttent.product.produt_details',compact('product','rating','rating_value','user_rating','reviews'));

            }
            else{
                 return redirect('/')->with('status',"The link was broken");
            }

        }
        else{
            return redirect('/')->with('status',"No such category found");
        }

    }
    public function productlistAjax()
    {
        $products=product::select('name')->where('status','0')->get();
        $data = [];

        foreach ($products as $item)
        {
            $data [] = $item['name'];
        }
        return $data;
    }

    public function searchproduct(Request $request)
    {
        $searched_product = $request->product_name;
        if($searched_product != "")
        {
            $product = product::where("name","LIKE","%$searched_product%")->first();
            if($product){
                return redirect('category/'.$product->category->name.'/'.$product->name);
            }
            else{
                 return redirect()->back()->with("status","No Product Matched Your Searc");
            }
        }
        else{
             return redirect()->back();
        }
    }
}
