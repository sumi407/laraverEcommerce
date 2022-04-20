@extends('layouts.admin')
    @section('content')
    
        <div class="container p-4">
            <div class="row mx-0">
                <div class="card p-5">
                    <h2>Add Product</h2>
            
                    <div class="card-body">
                        <form action="{{ url( 'update-product/'.$product->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row ">
                                <div class="col-12 mb-3">
                                <select  class="form-select" >
                                   <option value="" >{{ $product->category->name }}</option>
                                  
                                </select>

                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Product Name</label>
                                        <input type="text" value="{{ $product->name }}" class="form-control " name="name">
                                     </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">small_description</label>
                                        <input type="text"  value="{{ $product->small_description }}" class="form-control"  name="small_description">
                                    </div> 
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label  class="form-label">Description</label>
                                        <textarea  class="form-control"  name="description">{{ $product->description }} </textarea>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Status</label>
                                        <input type="checkbox"{{ $product->status == "1" ? 'checked' : '' }}   name="status">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Trending</label>
                                        <input type="checkbox"{{ $product->trending == "1" ? 'checked' : '' }}   name="trending">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">orginal price</label>
                                        <input type="text" class="form-control" value="{{ $product->orginal_price }}"  name="orginal_price">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Selling Price</label>
                                        <input type="text" class="form-control"  value="{{ $product->selling_price }}"  name="selling_price">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Quantity</label>
                                        <input type="text" class="form-control"  value="{{ $product->qty }}"  name="qty">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Tax</label>
                                        <input type="text"class="form-control" value="{{ $product->tax }}"   name="tax">
                                    </div> 
                                </div>
                                
                         
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta title</label>
                                    <input type="text" class="form-control" value="{{ $product->meta_title }}"  name="meta_title">
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta Keyword</label>
                                    <input type="text" class="form-control" value="{{ $product->meta_keyword }}"  name="meta_keyword">
                                </div> 
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label  class="form-label">Meta description</label>
                                    <input type="text" class="form-control" value="{{ $product->meta_description }}"  name="meta_description">
                                </div> 
                            </div>
                            
                            @if ($product->image)
                            <div class="col-6">
                                <img class="w-25" src="{{ asset('assets/uploads/products/'.$product->image) }}" alt="">
                            </div>
                            @endif
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Image</label>
                                    <input type="file" class="form-control"  name="image">
                                </div> 
                            </div>
                            </div>
                            <div class="my-3 text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
        </div>

    </div>
    @endsection