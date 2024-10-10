@extends('theme')

@section('contenu')
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Products by Categories</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @if(Session::has('alert'))
                            <div class="alert alert-success">
                                {{ Session::get('alert') }}
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive">

                                        @foreach($categories as $category)
                                            <h5 class="d-flex justify-content-between align-items-center">{{ strtoupper($category->title) }}
                                                <div>
                                                    <a href="/modifyCategory/{{ $category->id }}" class="btn btn-sm btn-primary">Modify Category</a>
                                                    <a href="/deleteCategory/{{ $category->id }}" class="btn btn-sm btn-danger">Delete Category With Products</a>
                                                </div>
                                            </h5>

                                            <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Price</th>
                                                        <th>Image</th>
                                                        <th>Note</th>
                                                        <th>Modify</th>
                                                        <th>Delete Image</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($productsByCategory[$category->id] as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->price }} DT</td>
                                                            <td>
                                                                @if($item->logo)
                                                                    <img src="{{ asset('storage/' . $item->logo) }}" alt="Available" style="width: 50px;">
                                                                @else
                                                                    Not Available
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->note }}</td>
                                                            <td><a href="/modifier-product/{{ $item->id }}" class="btn btn-primary">Modify</a></td>
                                                            <td><a href="/suppProductImage/{{ $item->id }}" class="btn btn-danger">Delete Image</a></td>
                                                            <td><a href="/suppProduct/{{ $item->id }}" class="btn btn-danger">Delete</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endforeach

                                        <!-- Section for products without a category -->
                                        <h5>NO CATEGORY</h5>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Note</th>
                                                    <th>Modify</th>
                                                    <th>Delete Image</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($productsByCategory['no_category'] as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->price }} DT</td>
                                                        <td>
                                                            @if($item->logo)
                                                                <img src="{{ asset('storage/' . $item->logo) }}" alt="Available" style="width: 50px;">
                                                            @else
                                                                Not Available
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->note }}</td>
                                                        <td><a href="/modifier-product/{{ $item->id }}" class="btn btn-primary">Modify</a></td>
                                                        <td><a href="/suppProductImage/{{ $item->id }}" class="btn btn-danger">Delete Image</a></td>
                                                        <td><a href="/suppProduct/{{ $item->id }}" class="btn btn-danger">Delete</a></td>
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
