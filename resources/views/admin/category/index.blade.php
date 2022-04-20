@extends('layouts.admin')
    @section('content')
    
        <div class="container my-5">
            <div class="row mx-0">
                <div class="text-end">
                     <a class="btn btn-primary" href="{{ url('addCategory') }}"> Add Category</a>
                </div>
                <div class="card p-5">
                    <h2>All Category List</h2>
                    <hr>
                    <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $cat_items )
                            <tr>
                                <td>{{ $cat_items->id}}</td>
                                <td>{{ $cat_items->name}}</td>
                                <td>{{ $cat_items->description}}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/category/'.$cat_items->image) }}" width="40" alt=""> </td>
                                <td class=""> 
                                    <a href="{{ 'edit-curd/'.$cat_items->id }}" class="btn btn-primary ">Edit</a>
                                    <a  href="{{ 'delete-category/'.$cat_items->id }}" class="btn btn-danger">Delete</a>

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