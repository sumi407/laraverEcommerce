@extends('layouts.frond')
    @section('title')
        {{ $product->name }}
    @endsection
    @section('content')
        <div class="p-2 ">
            <div class="container">
                <nav aria-label="breadcrumb" class="bg-info p-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item  text-white"><a href="{{ url('/' )}}">Home</a></li>
                        <li class="breadcrumb-item text-white"><a href="{{ url('view-category/'.$product->category->id )}}">{{ $product->category->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                    </ol>
                </nav>
                <div class="row bg-light product_data p-3  my-4">
                    <div class="col-4">
                        <img src="{{ asset('assets/uploads/products/'.$product->image) }}" width="300" height="350" alt="">
                    </div>
                    <div class="col-8">
                        <h3 class="my-2">{{ $product->name}}</h3>
                        <hr>
                        <p class=""my-2>{{ $product->description}}</p>
                        <hr class="">
                        <div class="text-primary mb-3 fs-4">{{ $product->selling_price}}</div>
                        @if($product->qty > 0)
                            <span class="bg-success my-2 p-1 text-white rounded">In stock</span>
                        @else
                            <span class="bg-danger my-2 p-1 text-white rounded">Out of stock</span>
                        @endif
                        <div class="d-flex flex-row my-4 ">
                         <input type="hidden" name="product_id" value="{{ $product->id}}" class="prod_id">
                        <input type="number" id="quantity" class="px-4  qty-input" value="1" name="product_qty" min="1" max="100">
                          
                        <button type="submit" class="btn-success mx-3 addTowishlist  btn "> <i class="fas fa-heart"></i> Add to Wishlist</button>
                        @if($product->qty > 0)
                            <button type="submit" class="btn-primary mx-3 addtocartbtn  btn "> <i class="fas fa-cart-arrow-down"></i> Add to Cart</button>
                        @endif

                        </div>

                    </div>

                </div>
            </div>

        </div>
      
    @endsection
    @section('scripts')
   
   