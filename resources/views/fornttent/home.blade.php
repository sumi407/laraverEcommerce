@extends('layouts.frond')
    @section('title')
        Welcome to Eshop
    @endsection
    @section('content')
        @include('layouts.inc.slider')
        <div class="py-5">
            <div class="container">
                <div class="row mx-0">
                    <div class="col-4">
                         <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @endsection