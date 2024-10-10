@extends('theme')

@section('contenu')
@if(Session::has('error'))
                            <div class="alert alert-success">
                                {{ Session::get('alert') }}
                            </div>
                        @endif
                    <div class="container-fluid">
                        @if(Session::has('alert'))
                        <div class="alert alert-danger">
                            {{ Session::get('alert') }}
                        </div>
                    @endif


                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">generate QR codes</h4>

                                </div>
                            </div>
                        </div>


                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">


                                    <form action="/generateQrCodes" method="post">
                                    @csrf

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Type the table numbers in form (1.2.3.4)</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" placeholder="1.2.3.4"
                                                    id="example-text-input" name="table_numbers" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Download QR Codes</button>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container-fluid -->
                    @endsection
