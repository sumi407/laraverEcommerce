<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

class ptoductController extends Controller
{
    public function index(){
        $product = product::all();
        return  view('admin.product.index',compact('product'));
    }
    public function add(){
        $category = category::all();
        return  view('admin.product.add',compact('category'));
    }
    public function insert(Request $request){
       
        $product = new product();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->cate_id =$request->input('cate_id');
        $product->name = $request->input('name');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->orginal_price = $request->input('orginal_price') ;
        $product->selling_price = $request->input('selling_price') ;
        $product->qty = $request->input('qty') ;
        $product->tax = $request->input('tax') ;
        $product->status = $request->input('status') == TRUE ? '1': '0';
        $product->trending = $request->input('trending') == TRUE ? '1': '0';
        
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->save();
        return  redirect('/dashboard')->with('status',"Product Added Successfully");

    }
    public function edit($id){
        $product =product::find($id);
       return view('admin.product.edit',compact('product'));
    }
    public function update(Request $request,$id){
        $product =product::find($id);
        if($request->hasFile('image')){
            $path='assets/uploads/products/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->name = $request->input('name');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->orginal_price = $request->input('orginal_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status')  == TRUE ? '1': '0';
        $product->trending = $request->input('trending') == TRUE ? '1': '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keyword = $request->input('meta_keyword');
        $product->update();
        return  redirect('/product')->with('status',"Product Update Successfully");
    }
    public function destroy($id){
        $product =product::find($id);
        if($product->image){
            $path='assets/uploads/products/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }

        }
        $product->delete();
        return  redirect('/product')->with('status',"Product Deleted Successfully");
    }
}
