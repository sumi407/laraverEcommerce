@extends('layouts.frond')
    @section('title')
    Edit your review
    @endsection
    @section('content')
        <div class="container my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                                <h5>You are writing a review {{ $review->product->name}}</h5>
                                <form action="{{ url('/update_review') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="review_id" value="{{$review->id}}">
                                    <textarea name="user_review" class="form-control" id="" cols="30" rows="10">{{ $review->user_review }}</textarea>
                                    <button type="submit" class="btn btn-primary mt-4">Update Review</button>

                                </form>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection