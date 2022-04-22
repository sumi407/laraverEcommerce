@extends('layouts.frond')
    @section('title')
        {{ $category->name }}
    @endsection
    @section('content')
    <div class="py-5">
            <div class="container">
                <h3 class="text-center my-3 mb-4">All Product</h3>
                <div class="row mx-0">
                    @foreach ($product as $item )
                    <div class="col-3 mb-3">
                        <a href="{{ url('category/'.$category->name.'/'.$item->name)}}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/products/'.$item->image) }}" height="250px"class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="test-dark text-center">{{ $item->name }}</h3>
                                    <div>
                                        <span class="text-secondary">{{ $item->description }}</span>
                                    </div>
                                
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    @endsection