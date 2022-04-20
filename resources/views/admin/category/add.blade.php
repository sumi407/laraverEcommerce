@extends('layouts.admin')
    @section('content')
    
        <div class="container p-4">
            <div class="row mx-0">
                <div class="card p-5">
                    <h2>Add Category</h2>
            
                    <div class="card-body">
                        <form action="{{ url( 'inscategory') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                            <div class="row ">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Product NAme</label>
                                        <input type="text" class="form-control " name="name">
                                     </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Slug</label>
                                        <input type="text" class="form-control"  name="slug">
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
                                        <input type="checkbox"   name="status">
                                    </div> 
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label  class="form-label">Popular</label>
                                        <input type="checkbox"   name="popular">
                                    </div> 
                                </div>
                         
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta title</label>
                                    <input type="text" class="form-control"  name="	meta_title">
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label  class="form-label">Meta description</label>
                                    <input type="text" class="form-control"  name="meta_descrip">
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