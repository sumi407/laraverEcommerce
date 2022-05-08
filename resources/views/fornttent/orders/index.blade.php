@extends('layouts.frond')
    @section('title')
        My Orders 
    @endsection
    @section('content')
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>My order List</h2>
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $items )
                            <tr>
                                <td class="text-center">{{ date('d-m-y',strtotime($items->created_at)) }}</td>
                                <td>{{ $items->tracking_no}}</td>
                                <td>{{ $items->total_price}}</td>
                                <td>{{ $items->status == '0' ? 'Pending' : 'Completed'}}</td>
                                <td>
                                    <a href="{{ url('view-order/'.$items->id) }}" class="btn btn-outline-primary">View</a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>

                       </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection