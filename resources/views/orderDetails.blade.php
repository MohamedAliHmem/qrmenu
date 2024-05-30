@extends('theme')

@section('contenu')
<div >
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">{{$data -> id}}</span></p>

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
                                        <h5 class="text-truncate font-size-14">{{$product['name']}}</h5>
                                    </div>
                                </td>
                                <td>$ {{ $product['price'] }} * {{$product['quantity']}}</td>
                            </tr>
                            @endforeach
                                            <tr>
                                                <td>
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                    $ {{$data ->total}}
                                                </td>
                                            </tr>
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