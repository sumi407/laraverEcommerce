@extends('layouts.admin')
    @section('title')
          orders
    @endsection
    @section('content')
    
        <div class="container p-4">
            <div class="row mx-0">
                <div class="col-md-12">
                <div class="card">
                        <div class="card-header d-flex flex-row justify-content-between">
                            <h2>Completed order List</h2>
                            <a class="btn btn-warning " href="{{ url('orders') }}">New Order</a>
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
                                <td>{{ date('d-m-y',strtotime($items->created_at)) }}</td>
                                <td>{{ $items->tracking_no}}</td>
                                <td>{{ $items->total_price}}</td>
                                <td>{{ $items->status == '0' ? 'Pending' : 'Completed'}}</td>
                                <td>
                                    <a href="{{ url('admin/view-order/'.$items->id) }}" class="btn btn-outline-primary">View</a>
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