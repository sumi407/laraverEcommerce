@extends('layouts.admin')
    @section('content')
    
        <div class="container my-5">
            <div class="row mx-0">
                <div class="text-end">
                     <a class="btn btn-primary" href="{{ url('addProduct') }}"> Add Product</a>
                </div>
                <div class="card p-5">
                    <h2>All Product List</h2>
                    <hr>
                    <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Selling Price</th>
                                <th scope="col">Orginal Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $items )
                            <tr>
                                <td>{{ $items->id}}</td>
                                <td>{{ $items->name}}</td>
                                <td>{{ $items->category->name}}</td>
                                <td>{{ $items->selling_price}}</td>
                                <td>{{ $items->orginal_price}}</td> 
                                <td>
                                    <img src="{{ asset('assets/uploads/products/'.$items->image) }}" width="40" alt=""> </td>
                                <td class=""> 
                                    <a href="{{ 'edit-product/'.$items->id }}" class="btn btn-primary ">Edit</a>
                                    <a  href="{{ 'delete-product/'.$items->id }}" class="btn btn-danger">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                            
                            
                           
                        </tbody>
                        </table>

                    </div>
                </div>
        </div>

    </div>
    @endsection