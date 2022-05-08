@extends('layouts.frond')
    @section('title')
        My Wishlist 
    @endsection
    @section('content')
        <div class="container ">
        <nav aria-label="breadcrumb" class="bg-info p-2 my-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item  text-white"><a class="text-white fs-4 text-decoration-none" href="{{ url('/' )}}">Home</a></li>
               
                <li class="breadcrumb-item active" aria-current="page"><a class="text-white fs-4 text-decoration-none" href="{{ url('wishlist' )}}">Wishlist</a></li>
            </ol>
        </nav>
            <div class="cart shadow py-2 mb-3">
                <div class="card-body">
                @if($wishlist->count() > 0)
               
                @foreach ($wishlist as $items )
                    
                <div class="row product_data mb-3 text-center">
                    <div class="col-3">
                        <img src="{{ asset('assets/uploads/products/'.$items->product->image) }}" width="60" height="60" alt=""> 
                    </div>
                    <div class="col-2">
                        <h3 class="my-2">{{ $items->product->name}}</h3>  
                    </div>
                    <div class="col-2">
                        <h3 class="my-2">৳ {{ $items->product->selling_price}}</h3>  
                    </div>
                    <div class="col-1">
                        <input type="hidden" class="prod_id" value="{{ $items->prod_id}}">
                        <!-- @if($items->product->qty >= $items->prod_qty) -->
                         <!-- <h6 class="text-success mt-3">In stock</h6> -->
                         <input type="number" id="quantity" class="px-4 mt-3  qty-input" value="1" name="product_qty" min="1" max="100">
                       
                       <!-- @else
                            <h6 class="text-danger">Out of stock</h6>
                        @endif -->
                    </div>
                    <div class="col-2 mt-2">
                        <button class="btn btn-primary addtocartbtn"><i class="fa fa-shopping-cart px-1"></i>Add to cart</button>
                    </div>
                    <div class="col-2 mt-2">
                        <button class="btn btn-danger remove_wishlist"><i class="fa fa-trash px-1"></i>Remove</button>
                    </div>
                </div>
                
                @endforeach
               

                @else
                     <h4 class="text-dark">There are no product in Your wishlist</h4>
                @endif
                </div>
            </div>
            
        </div>
    @endsection
    