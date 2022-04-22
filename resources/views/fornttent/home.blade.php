@extends('layouts.frond')
    @section('title')
        Welcome to Eshop
    @endsection
    @section('content')
        @include('layouts.inc.slider')
        <div class="py-5">
            <div class="container">
                <h3 class="my-5">Featured Product </h3>
                <div class="row mx-0">
                    @foreach ($featured_product as $prod )
                    <div class="col-3">
                         <div class="card">
                            <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" height="250px"class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="test-dark text-center">{{ $prod->name }}</h3>
                                <div>
                                    <span class="text-primary fw-bold fs-4">{{ $prod->selling_price }}</span>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        <!-- trending category -->
        <div class="py-5">
            <div class="container">
                <h3 class="my-5">Trending Category </h3>
                <div class="row mx-0">
                    @foreach ($trending_cat as $cat )
                    <div class="col-3">
                        <a href="{{ url('view-category/'.$cat->id) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/'.$cat->image) }}" height="250px"class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="test-dark text-center">{{ $cat->name }}</h3>
                                
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    @endsection