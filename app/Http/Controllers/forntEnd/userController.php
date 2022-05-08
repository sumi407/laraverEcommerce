<?php

namespace App\Http\Controllers\forntEnd;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\orderItems;
use App\Models\product;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function index()

    {
        $orders = order::where('user_id',Auth::id())->get();
        return view ('fornttent.orders.index',compact('orders'));

    }
    public function view($id)
    {
        $orders =  order::where('id',$id)->where('user_id', Auth::id())->first();
        return view ('fornttent.orders.view',compact('orders'));

    }
}
