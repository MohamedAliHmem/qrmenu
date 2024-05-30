@extends('theme')

@section('contenu')
                    <div class="container-fluid">

                        <!-- start page title
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Ajouter Admin</h4>

                                </div>
                            </div>
                        </div>




                        @if(Session::has('alert'))
                            <div class="alert alert-danger">
                                {{ Session::get('alert') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                    <form action="add-admin" method="post">
                                    @csrf
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Nom</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="Nom"
                                                    id="example-text-input" name="nom" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="Username"
                                                    id="example-text-input" name="username" required>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="email" placeholder="Email"
                                                    id="example-text-input" name="email" required>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Mot de passe</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="password" placeholder="Mot de passe"
                                                    id="example-text-input" name="pwd" required>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <!-- end row -->

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Add Order</h4>

                                </div>
                            </div>
                        </div>
                        @if(Session::has('alert'))
                            <div class="alert alert-success">
                                {{ Session::get('alert') }}
                            </div>
                        @endif


                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">


                                    <form action="/addO" method="post">
                                    @csrf

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Products</label>
                                            <div class="col-md-10">
                                            @foreach($data as $item)
                                                <div class="mb-3">
                                                    <label for="product{{$item->id}}">{{$item->name}}</label>
                                                    <input type="number" name="quantities[]" id="product{{$item->id}}" min="0" value="0">
                                                    <input type="hidden" name="products[]" value="{{$item->id}}">
                                                </div>
                                            @endforeach
                                            <!--<select name="products[]" multiple class="form-select">
                                                @foreach($data as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>-->
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">N° Table</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="number" placeholder="N° Table"
                                                    id="example-text-input" name="numTable" required>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Payed</label>
                                            <div class="col-md-10">
                                            <select name="payed">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                            </div>
                                        </div>




                                        <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container-fluid -->
                    @endsection
