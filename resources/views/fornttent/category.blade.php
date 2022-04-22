@extends('layouts.frond')
    @section('title')
      Category
    @endsection
    @section('content')
    <div class="py-5">
            <div class="container">
                <h3 class="text-center my-3 mb-4">All Category</h3>
                <div class="row mx-0">
                    @foreach ($category as $cate )
                    <div class="col-3 mb-3">
                         <div class="card">
                            <img src="{{ asset('assets/uploads/category/'.$cate->image) }}" height="250px"class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="test-dark text-center">{{ $cate->name }}</h3>
                                <div>
                                    <span class="text-secondary">{{ $cate->description }}</span>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    @endsection