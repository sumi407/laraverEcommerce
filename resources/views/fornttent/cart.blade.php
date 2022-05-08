@extends('layouts.frond')
    @section('title')
        My Cart 
    @endsection
    @section('content')
        <div class="container ">
        <nav aria-label="breadcrumb" class="bg-info p-2 my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item  text-white"><a href="{{ url('/' )}}">Home</a></li>
               
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('cart' )}}">Cart</a></li>
            </ol>
        </nav>
            <div class="cart shadow py-2 mb-3">
                @if($cartitems->count() > 0)
                <!-- total calculation -->
                @php
                    $total=0;
                @endphp
                @foreach ($cartitems as $items )
                    
                <div class="row product_data mb-3 text-center">
                    <div class="col-3">
                        <img src="{{ asset('assets/uploads/products/'.$items->product->image) }}" width="100" height="100" alt=""> 
                    </div>
                    <div class="col-3">
                        <h3 class="my-2">{{ $items->product->name}}</h3>  
                    </div>
                    <div class="col-2">
                        <h3 class="my-2">৳ {{ $items->product->selling_price}}</h3>  
                    </div>
                    <div class="col-2">
                        <input type="hidden" class="prod_id" value="{{ $items->prod_id}}">
                        @if($items->product->qty >= $items->prod_qty)
                        <input type="number" id="quantity" class="px-4 mt-3 changeQuentity  qty-input" value="{{ $items->prod_qty}}" name="product_qty" min="1" max="100">
                        @php
                           $total +=$items->product->selling_price * $items->prod_qty;
                       @endphp
                       @else
                            <h6 class="text-danger">Out of stock</h6>
                        @endif
                    </div>
                    <div class="col-2 mt-2">
                        <button class="btn btn-danger delete_item"><i class="fa fa-trash px-1"></i>Remove</button>
                    </div>
                </div>
                
                @endforeach
                <hr>
                <div class="cart-footer text-end ">
                    <h4 class="text-end px-3">Total Price:৳  {{ $total }}</h4>
                    <a href="{{ url('checkout') }}" class="btn btn-success text-end mx-3">Checkout</a>

                </div>
                @else
                <div class="card-body text-cente p-5">
                    <h2 class="text-center">Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
                    <a href="{{ url ('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                </div>
                @endif

            </div>
            
        </div>
    @endsection
    