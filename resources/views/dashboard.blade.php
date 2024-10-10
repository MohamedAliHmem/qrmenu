@extends('theme')

@section('contenu')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--
  <script>

    Pusher.logToConsole = true;

    var pusher = new Pusher('25f2d4950716cbdb35a3', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('popup-channel');
    channel.bind('user-register', function(data) {
        toastr.success('New table Order, N° : '+ JSON.stringify(data.name))
    });
  </script>-->


                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 cla ss="mb-sm-0 font-size-18">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @if ($data[4]->offre == 'demo')
                            <div class="alert alert-info">
                                You can purchase an offer. <a href="/change-offer">Click here to buy</a>. You can add up to 30 products and 10 categories.
                            </div>
                        @elseif ($data[4]->paiement == 0)
                            <div class="alert alert-danger">
                                The menu is not available because the account is not activated. <a href="/telechargerFacture">click here to activate</a>. The account will be automatically deleted if the payment is not made within 15 days of the account creation.
                            </div>
                        @endif

                        @if(Session::has('change-offer'))
                            <div class="alert alert-success">
                                {{ Session::get('change-offer') }}
                            </div>
                        @endif
                        <div class="row">
                            <!--<div class="col-xl-2">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary-subtle">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>

                                </div>-->

                            </div>
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Orders</p>
                                                        <h4 class="mb-0">{{ $data[0] }}</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Revenue</p>
                                                        <h4 class="mb-0">{{ $data[1] }} DT</h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="bx bx-archive-in font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                @if(Session::has('alert'))
                            <div class="alert alert-success">
                                {{ Session::get('alert') }}
                            </div>
                        @endif
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Latest Transaction </h4>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0">

                                                <thead class="table-light">
                                                    <tr>
                                                        <th style="width: 20px;">
                                                            <div class="form-check font-size-16 align-middle">
                                                                <input class="form-check-input" type="checkbox" id="transactionCheck01">
                                                                <label class="form-check-label" for="transactionCheck01"></label>
                                                            </div>
                                                        </th>
                                                        <!--<th class="align-middle">Order ID</th>-->
                                                        <th class="align-middle">N° Table</th>
                                                        <th class="align-middle">Date</th>
                                                        <th class="align-middle">Total</th>
                                                        <th class="align-middle">Payment Status</th>
                                                        <th class="align-middle">View Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data[3] as $item)

                                                    <tr>
                                                        <td>
                                                            <div class="form-check font-size-16">
                                                                <input class="form-check-input" type="checkbox" id="transactionCheck02">
                                                                <label class="form-check-label" for="transactionCheck02"></label>
                                                            </div>
                                                        </td>

                                                        <td>@if($item->numTable == 0)
                                                                Added Manually
                                                            @else
                                                            {{$item->numTable}}
                                                            @endif
                                                        </td>
                                                        <td>
                                                        {{ $item->created_at }}
                                                        </td>
                                                        <td>
                                                        {{ $item->total }} DT
                                                        </td>
                                                        <td>
                                                            @if($item->payed == 0)
                                                            <a href="/payment/{{ $item->id }}"><span class="badge badge-pill badge-soft-danger font-size-11">Not Payed</span></a>
                                                            @else
                                                            <a href="/payment/{{ $item->id }}"><span class="badge badge-pill badge-soft-success font-size-11">Paid</span></a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href='/viewDetails/{{ $item->id }}' class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                                View Details
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    @endforeach


                                                </tbody>
                                            </table>
                                            <style>
                                                /* Styles de pagination personnalisés */
                                                .custom-pagination .pagination {
                                                    display: flex;
                                                    justify-content: center;
                                                    padding-left: 0;
                                                    list-style: none;
                                                    border-radius: 0.25rem;
                                                }

                                                .custom-pagination .pagination li {
                                                    display: inline;
                                                }

                                                .custom-pagination .pagination li a,
                                                .custom-pagination .pagination li span {
                                                    color: #007bff;
                                                    text-decoration: none;
                                                    background-color: #fff;
                                                    border: 1px solid #dee2e6;
                                                    padding: 0.5rem 0.75rem;
                                                    margin-left: -1px;
                                                }

                                                .custom-pagination .pagination li:first-child a,
                                                .custom-pagination .pagination li:first-child span {
                                                    margin-left: 0;
                                                    border-top-left-radius: 0.25rem;
                                                    border-bottom-left-radius: 0.25rem;
                                                }

                                                .custom-pagination .pagination li:last-child a,
                                                .custom-pagination .pagination li:last-child span {
                                                    border-top-right-radius: 0.25rem;
                                                    border-bottom-right-radius: 0.25rem;
                                                }

                                                .custom-pagination .pagination li.disabled a,
                                                .custom-pagination .pagination li.disabled span {
                                                    color: #6c757d;
                                                    pointer-events: none;
                                                    cursor: auto;
                                                    background-color: #fff;
                                                    border-color: #dee2e6;
                                                }

                                                .custom-pagination .pagination li a:hover,
                                                .custom-pagination .pagination li a:focus {
                                                    z-index: 2;
                                                    color: #0056b3;
                                                    background-color: #e9ecef;
                                                    border-color: #dee2e6;
                                                }
                                                </style>

                                            <div class="d-flex justify-content-center mt-3 custom-pagination">
                                                {{ $data[3]->onEachSide(1)->links('vendor.pagination.simple-bootstrap-4') }}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->

                    @endsection
