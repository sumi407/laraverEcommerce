@extends('layouts.frond')
    @section('title')
        Checkout 
    @endsection
    @section('content')
        <div class="container mt-5">
            <form action="{{ url('place-order')}}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h4 class="my-3">Basic Details</h4>
                                <hr>
                                <div class="row mt-5">
                                    <div class="col-6 mb-4">
                                        <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" placeholder="Enter your Name">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="email" value="{{ Auth::user()->email }}"  class="form-control"name="email"  placeholder="Enter your Email">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="text" value="{{ Auth::user()->phone }}"  class="form-control"name="phone"  placeholder="Enter your Phone">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="text" value="{{ Auth::user()->address1 }}"  class="form-control"name="address1"  placeholder="Enter your Address 1">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="text" value="{{ Auth::user()->address2 }}"  class="form-control"name="address2"  placeholder="Enter your Address 2">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="text" value="{{ Auth::user()->city }}"  class="form-control"name="city"  placeholder="Enter your City ">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="text" value="{{ Auth::user()->state }}"  class="form-control"name="state"  placeholder="Enter your State">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="text" value="{{ Auth::user()->country }}"  class="form-control"name="country"  placeholder="Enter your Country">
                                    </div>
                                    <div class="col-6 mb-4">
                                        <input type="text" value="{{ Auth::user()->pincode }}"  class="form-control"name="pincode"  placeholder="Enter your  Pincode">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                         <div class="card border-0">
                            <div class="card-body">
                                <h4 class="my-3">Order Details</h4>
                                <hr>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cartitems as $items )
                                    <tr>  
                                        <td>{{ $items->product->name }}</td>
                                        <td>{{ $items->prod_qty}}</td>
                                        <td>{{ $items->product->selling_price * $items->prod_qty }}</td>
                                    </tr>
                            
                                    
                                    @endforeach
                                    </tbody>
                                </table>
                                

                                <button class="btn btn-success float-end">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection