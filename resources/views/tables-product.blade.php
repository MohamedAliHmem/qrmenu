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
        
                                        <h4 class="card-title">Products</h4>
        
                                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Modify</th>
                                                <th>Delete</th>
                                            </tr>
                                            
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($data as $item)
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->price}}</td>
                                                @if($item->logo)
                                                <td><img src="{{asset('storage/'.$item->logo)}}" alt="Available" style="width: 50px;"></td>
                                                @else
                                                <td>Not Available</td>
                                                @endif
                                                <td><a href="/modifier-product/{{$item->id}}" class="btn btn-primary">Modify</a></td>
                                                <td><a href="/suppProduct/{{$item->id}}" class="btn btn-danger">Delete</a></td>
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