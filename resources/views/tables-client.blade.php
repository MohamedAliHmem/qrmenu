@extends('theme')

@section('contenu')
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Data</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Clients</h4>

                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>N° Table</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($data as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->numTable}}</td>
                                                <td><a href="/modifier-client/{{$item->idClient}}" class="btn btn-primary">Modifier</a></td>
                                                <td><a href="/suppClient/{{$item->idClient}}" class="btn btn-danger">Supprimer</a></td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->


                    </div> <!-- container-fluid -->
                    @endsection
