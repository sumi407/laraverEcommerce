@extends('layouts.admin')
@section('title')
          Users
    @endsection
    @section('content')
    
        <div class="container my-5">
            <div class="row mx-0">
                <div class="card col-md-12">
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h4>Users Details</h4>
                        <a class=" btn btn-primary" href="{{ url('users') }}">Back</a>
                        <hr>
                    </div>  
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-4">
                                <label class="py-1" for=""> Role</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->role_as == '0'?User :'Admin' }}
                                </div>
                             </div>
                            <div class="col-md-4">
                                <label class="py-1" for=""> Name</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->name }}
                                </div>
                             </div>
                             <div class="col-md-4">
                                <label class="py-1" for=""> Email</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->email }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="py-1" for=""> Phone</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->phone }}
                                </div></div>
                            <div class="col-md-4">
                                <label class="py-1" for=""> Address 1</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->address1 }}
                                </div></div>
                            <div class="col-md-4">
                                <label class="py-1" for=""> Address 2</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->address2 }}
                                </div></div>
                            <div class="col-md-4">
                                <label class="py-1" for=""> City</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->city }}
                                </div></div>
                            <div class="col-md-4">
                                <label class="py-1" for=""> State</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->state }}
                                </div></div>
                            <div class="col-md-4">
                                <label class="py-1" for=""> Country</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->country }}
                                </div></div>
                           <div class="col-md-4">
                                <label class="py-1" for=""> Zipcode</label>
                                <div class="p-2 mb-2 border">
                                    {{ $users->pincode }}
                                </div></div>
                            </div>
                        </div>

                    </div>
                   
                </div>
               
            </div>

        </div>
    @endsection