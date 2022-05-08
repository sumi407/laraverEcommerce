@extends('layouts.frond')
    @section('title')
        View Orders 
    @endsection
    @section('content')
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex flex-row justify-content-between bg-info">
                            <h2 class="text-white"> order View</h2>
                            <a class="btn btn-warning text-white" href="{{ url('orders') }}"> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="py-2">Shipping Details</h4>
                                    <hr>
                                    <label class="mb-3" for="">Full Name</label>
                                    <div class="border p-2 mb-2">{{ $orders->name }}</div>
                                    <label class="mb-3" for="">Email</label>
                                    <div class="border  mb-2 p-2">{{ $orders->email }}</div>
                                    <label class="mb-3" for="">Phone</label>
                                    <div class="border  mb-2 p-2">{{ $orders->phone }}</div>
                                    <label class="mb-3" for="">Shipping Address</label>
                                    <div class="border  mb-2 p-2">
                                        {{ $orders->address1 }},
                                        {{ $orders->address2 }},
                                        {{ $orders->city }},
                                        {{ $orders->state }},
                                        {{ $orders->country }}
                                    </div>
                                    <label class="mb-3" for="">Zip Code</label>
                                    <div class="border p-2">{{ $orders->pincode }}</div>
                                </div>
                                <div class="col-md-6">
                                <h4 class="py-2">Order Details</h4>
                                    <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitem as $items )
                                        <tr>
                                            <td>{{ $items->products->name }}</td> 
                                            <td>{{ $items->qty }}</td> 
                                            <td>{{ $items->price }}</td>
                                            <td>
                                                <img src="{{ asset('assets/uploads/products/'.$items->products->image ) }}" width="50px" alt="">
                                            </td>  
                                        </tr>  
                                        @endforeach
                                    </tbody>

                                </table>
                                    <h4 class="my-3"> Grand Total: <span class="float-end"> {{ $orders->total_price }} ৳</span></h4>
                                    <label class="my-2" for=""> Order Status</label>
                                    <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                        @csrf
                                        @method ('PUT')
                                        <select class="form-select" name="order_status">
                                            <option {{ $orders->status == '0'? 'selected':''}}  value="0" >Pending</option>
                                            <option {{ $orders->status == '1'? 'selected':''}} value="1" >Completed</option>
                                        </select>
                                        <button type="submit" class="btn btn-info text-white mt-3 float-end" >Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection