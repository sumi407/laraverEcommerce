@extends('layouts.frond')
    @section('title')
        {{ $product->name }}
    @endsection
    @section('content')
                    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add_rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rating {{ $product->name }} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if($user_rating)

                            @for($i=1; $i<= $user_rating->stars_rated; $i++)
                                <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{ $i }}" class="fa fa-star "></label>
                            @endfor
                            @for ( $j=$user_rating->stars_rated+1 ; $j <= 5; $j++)
                                <input type="radio" value="{{ $j }}" name="product_rating"  id="rating{{$j}}">
                                <label for="rating{{ $j }}" class="fa fa-star "></label>
                            @endfor
                           
                            @else
                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
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
                        <div class="text-primary mb-3 fs-4">{{ $product->selling_price}}</div>
                          @php $ratenum = number_format($rating_value) @endphp
                        <div class="ratiing mb-3">
                            @for($i=1; $i<= $ratenum; $i++)
                                 <i class="fa fa-star checked"></i>
                            @endfor
                            @for ( $j=$ratenum+1 ; $j <= 5; $j++)
                                <i class="fa fa-star"></i>
                            @endfor
                             <span>
                                 @if( $rating->count() >  0)
                                 {{ $rating->count() }} Ratings
                                 @else
                                         No Ratings
                                  @endif
                                
                            </span>

                        </div>
                     
                        @if($product->qty > 0)
                            <span class="bg-success my-3 p-1 text-white rounded">In stock</span>
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
                    <div class="row mt-4">
                    <hr>
                            <h3>Description</h3>
                            <p class=""my-2>{{ $product->description}}</p>
                    <hr>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Rate this product
                            </button>
                            <a href="{{ url('add_review/'.$product->name.'/userreview') }}" class="btn btn-primary">
                            write review
                            </a>
                        
                        </div>
                        <div class="col-md-8">
                            @foreach ($reviews as $item )
                                <div class="user-review">            
                                    <label for="">{{ $item->user->name }}</label>
                                    @if ($item->user_id == Auth::id())
                                         <a href="{{ url('edit_review/'.$product->name.'/userreview') }}">Edit</a>   
                                    @endif
                                    <br>
                                    @if($item->rating)
                                    @php
                                        $user_rated = $item->rating->stars_rated
                                    @endphp
                                        @for($i=1; $i<= $user_rated; $i++)
                                             <i class="fa fa-star checked"></i>
                                        @endfor
                                        @for ( $j=$user_rated+1 ; $j <= 5; $j++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                    @endif
                                
                                    <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>
                                    <p>{{ $item->user_review }}</p>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
      
    @endsection
    @section('scripts')
   
   