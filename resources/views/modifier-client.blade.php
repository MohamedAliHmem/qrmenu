@extends('theme')

@section('contenu')
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">modify Client</h4>

                                </div>
                            </div>
                        </div>

                        

                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                      
                                    <form action="/modifierClient/{{$data -> id}}" method="post">
                                    @csrf
                                   
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Client Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="Client Name"
                                                    id="example-text-input" name="nom" value="{{$data -> name}}">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">N° Table</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="N° Table"
                                                    id="example-text-input" name="nTable" required value="{{$data -> numTable}}">
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