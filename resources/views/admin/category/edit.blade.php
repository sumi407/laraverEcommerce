@extends('layouts.admin')
    @section('content')
    
        <div class="container p-4">
            <div class="row mx-0">
                <div class="card p-5">
                    <h2>Update Category</h2>
            
                    <div class="card-body">
                        <form action="{{ url( 'update-category/'.$category->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row ">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Product NAme</label>
                                        <input type="text" class="form-control "value="{{ $category->name }}" name="name">
                                     </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Slug</label>
                                        <input type="text" class="form-control" value="{{ $category->slug }}"   name="slug">
                                    </div> 
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label  class="form-label">Description</label>
                                        <textarea  class="form-control"    name="description">{{ $category->description }} </textarea>
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Status</label>
                                        <input type="checkbox" {{ $category->status == "1" ? 'checked' : '' }}  name="status">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Popular</label>
                                        <input type="checkbox" {{ $category->popular == "1" ? 'checked' : '' }}  name="popular">
                                    </div> 
                                </div>
                         
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta title</label>
                                    <input type="text" class="form-control"  value="{{ $category->meta_title }}"  name="meta_title">
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta Keyword</label>
                                    <input type="text" class="form-control"  value="{{ $category->meta_keyword }}"  name="meta_keyword">
                                </div> 
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label  class="form-label">Meta description</label>
                                    <input type="text" class="form-control"  value="{{ $category->meta_descrip }}"  name="meta_descrip">
                                </div> 
                            </div>
                            
                            @if ($category->image)
                            <div class="col-6">
                                <img class="w-25" src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="">
                            </div>
                            @endif
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Image</label>
                                    <input type="file" class="form-control"  name="image">
                                </div> 
                            </div>
                            </div>
                           <div class="text-end">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                           </div>
                        </form>

                    </div>
                </div>
        </div>

    </div>
    @endsection