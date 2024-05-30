@extends('theme')

@section('contenu')
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Add new cafe</h4>

                                </div>
                            </div>
                        </div>

                        

                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                      
                                    <form method="get">
                                    @csrf
                                        
                                        <button formaction="addCafe" type="submit" class="btn btn-primary">Add new cafe with the same admin</button>
                                        <button formaction="/" type="submit" class="btn btn-primary">Add new cafe with another admin</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    @endsection