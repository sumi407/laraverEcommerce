@extends('layouts.frond')
    @section('title')
    Write a review
    @endsection
    @section('content')
        <div class="container my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if($verified_purchase->count() > 0)
                                <h5>You are writing a review {{ $product_check->name}}</h5>
                                <form action="{{ url('add_review') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product_check->id}}">
                                    <textarea name="user_review" class="form-control" id="" cols="30" rows="10"></textarea>
                                    <button type="submit" class="btn btn-primary mt-4">Submit Review</button>

                                </form>
                                
                            @else
                                <div class="alert alert-danger">
                                    <h5>You are not eligible to review this product</h5>
                                    <p>first of all purchase this product then write a review</p>
                                    <a href="{{ url('/' )}}" class="btn btn-primary"> Go to Home</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection