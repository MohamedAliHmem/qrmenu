@extends('theme')

@section('contenu')
<div >
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Order id: <span class="text-primary">{{$data -> id}}</span></p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>
                                                        <div>
                                                            <h5 class="text-truncate font-size-14">
                                                                @if ($product['category_title'])
                                                                    ({{$product['category_title']}})
                                                                @endif
                                                                {{$product['name']}}</h5>
                                                        </div>
                                                    </td>
                                                    <td>{{ $product['price'] }} DT × {{$product['quantity']}}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                    {{$data ->total}} DT
                                                </td>
                                            </tr>

                                            @if ($data ->remarque)
                                                <tr>
                                                    <td>
                                                        <h6 class="m-0 text-right">Remarque:</h6>
                                                    </td>
                                                    <td>
                                                        {{$data ->remarque}}
                                                    </td>
                                                </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href='/dashboard' class="btn btn-secondary">Return</a>
                                <a href='/deleteOrder/{{$data -> id}}' class="btn btn-danger" style="margin-left : 10px;">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endsection
