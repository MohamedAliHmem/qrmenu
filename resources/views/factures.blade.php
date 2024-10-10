@extends('theme')

@section('contenu')
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
                                    <h4 class="mb-sm-0 font-size-18">Factures</h4>

                                </div>
                            </div>
                        </div>
                        @if(Session::has('alert'))
                            <div class="alert alert-success">
                                {{ Session::get('alert') }}
                            </div>
                        @endif


                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">

                                            <thead class="table-light">
                                                <tr>
                                                    <th class="align-middle">Identifiant de l'abonnement</th>
                                                    <th class="align-middle">Date de début</th>
                                                    <th class="align-middle">date de fin</th>
                                                    <th class="align-middle">Montant HT</th>
                                                    <th class="align-middle">Montant TTC</th>
                                                    <th class="align-middle">Payment Status</th>
                                                    @if ($abonnement->offre != 'demo')
                                                        <th class="align-middle">Facture</th>
                                                    @endif

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{ $abonnement->id }}
                                                    </td>

                                                    <td>
                                                        {{ $abonnement->date_debut }}
                                                    </td>

                                                    <td>
                                                        {{ $abonnement->date_fin }}
                                                    </td>

                                                    <td>
                                                        {{ $montantHT }}.00 DT
                                                    </td>

                                                    <td>
                                                        {{ $montantTTC }} DT
                                                    </td>

                                                    <td>
                                                        @if ($paid)
                                                            <span class="badge badge-pill badge-soft-success font-size-11">Paid</span>
                                                        @else
                                                            <span class="badge badge-pill badge-soft-danger font-size-11">Not Payed</span>
                                                        @endif
                                                    </td>

                                                    @if ($abonnement->offre != 'demo')
                                                        <td>
                                                            <a href='/telechargerFacture' class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                                                Voir facture
                                                            </a>
                                                        </td>
                                                    @endif

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container-fluid -->
                    @endsection
