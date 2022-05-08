@extends('layouts.admin')
@section('title')
          Users
    @endsection
    @section('content')
    
        <div class="container my-5">
            <div class="row mx-0">
               
                <div class="card p-5">
                    <h2>All User List</h2>
                    <hr>
                    <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $items )
                            <tr>
                                <td>{{ $items->id}}</td>
                                <td>{{ $items->name}}</td>
                                <td>{{ $items->email}}</td>
                                <td>{{ $items->phone}}</td>
                           
                                <td class=""> 
                                    <a href="{{ url('view-user/'.$items->id) }}" class="btn btn-primary ">View</a>
                                   
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