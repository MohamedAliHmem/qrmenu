@extends('theme')

@section('contenu')
                    <div class="container-fluid">
                        @if(Session::has('alert'))
                        <div class="alert alert-danger">
                            {{ Session::get('alert') }}
                        </div>
                    @endif

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">


                                        <form action="/modifierCafe/{{$data -> id}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Cafe name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="Cafe name"
                                                    id="cafeName" name="cafeName" value="{{$data -> name}}" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Adress</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="Adress"
                                                    id="example-text-input" name="adresse" value="{{$data -> adresse}}" required>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Phone number</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="number" placeholder="Phone number"
                                                    id="example-text-input" name="phone" value="{{$data -> telephone}}" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="email" placeholder="Email"
                                                    id="example-text-input" name="email" value="{{$data -> email}}" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Second Email</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="email" placeholder="Second Email"
                                                    id="example-text-input" name="secondEmail" value="{{$data -> secondEmail}}">
                                            </div>
                                        </div>

                                        <!--<div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Logo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" placeholder="Logo"
                                                    id="example-text-input" accept="image/*" name="logo" value="logo">

                                            </div>
                                        </div>-->


                                        <button type="submit" class="btn btn-danger">Modify</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div> <!-- container-fluid -->@endsection
