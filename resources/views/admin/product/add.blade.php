@extends('layouts.admin')
    @section('content')
    
        <div class="container p-4">
            <div class="row mx-0">
                <div class="card p-5">
                    <h2>Add Product</h2>
            
                    <div class="card-body">
                        <form action="{{ url( 'insproduct') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="row ">
                                <div class="col-12 mb-3">
                                <select name="cate_id" class="form-select" >
                                    <option value="" >Select Category Namee</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id}}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Product Name</label>
                                        <input type="text" class="form-control " name="name">
                                     </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">small_description</label>
                                        <input type="text" class="form-control"  name="small_description">
                                    </div> 
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label  class="form-label">Description</label>
                                        <textarea  class="form-control"  name="description"> </textarea>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Status</label>
                                        <input type="checkbox"  name="status">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Trending</label>
                                        <input type="checkbox"  name="trending">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">orginal price</label>
                                        <input type="text" class="form-control"  name="orginal_price">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Selling Price</label>
                                        <input type="text" class="form-control"   name="selling_price">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Quantity</label>
                                        <input type="text" class="form-control"   name="qty">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Tax</label>
                                        <input type="text"class="form-control"   name="tax">
                                    </div> 
                                </div>
                                
                         
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta title</label>
                                    <input type="text" class="form-control"  name="meta_title">
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta description</label>
                                    <input type="text" class="form-control"  name="meta_description">
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta Keyword</label>
                                    <input type="text" class="form-control"  name="meta_keyword">
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Image</label>
                                    <input type="file" class="form-control"  name="image">
                                </div> 
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
        </div>

    </div>
    @endsection