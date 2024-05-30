@extends('theme')

@section('contenu')
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Modify Product</h4>


                                </div>
                            </div>
                        </div>

                        

                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                    <form action="/modifierProduct/{{$data -> id}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="Name"
                                                    id="example-text-input" name='name' value="{{$data -> name}}" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Price</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="number" placeholder="Price"
                                                    id="example-text-input" name='price' value="{{$data -> price}}" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Image</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" placeholder="Image"
                                                    id="example-text-input" accept="image/*" value="{{$data -> logo}}" name="logo">
                                                
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success">Modify</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div> <!-- container-fluid -->
                    @endsection