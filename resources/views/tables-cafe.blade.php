@extends('theme')

@section('contenu')
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Profile Data</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">

                                        <h4 class="card-title">Profile</h4>

                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Telephone</th>
                                                <th>Adresse</th>
                                                <th>Email</th>
                                                <th>Second Email</th>
                                                <th>Modify</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($data as $item)
                                            @if($item->idCafe!=null)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->telephone}}</td>
                                                <td>{{$item->adresse}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->secondEmail}}</td>

                                                <td><a href="/modifier-cafe/{{$item->idCafe}}" class="btn btn-primary">Modify</a></td>
                                                <td><a href="/suppCafe/{{$item->idCafe}}" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            </tbody>
                                        </table>
<span style="color: #8d8c8c">You can use the second email to receive orders from clients</span>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                    </div> <!-- container-fluid -->
                    @endsection
