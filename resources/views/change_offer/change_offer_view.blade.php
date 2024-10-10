@extends('theme')

@section('contenu')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Change Offer</h4>
            </div>
        </div>
    </div>

    @if(Session::has('alert'))
        <div class="alert alert-danger">
            {{ Session::get('alert') }}
        </div>
    @endif

    @if(Session::has('alert'))
        <div class="alert alert-success">
            {{ Session::get('alert') }}
        </div>
    @endif

    <!-- end page title -->
    <div class="alert alert-info">
        Your current offer is: {{ $abonnement->offre }} <br>
        @if ($abonnement->paiement == 0 && $abonnement->offre != 'demo')

            <form id="plan-form-demo" action="/change-plan" method="POST">
                @csrf
                <input type="hidden" name="plan_name" value="demo">
                <input type="hidden" name="duration" value="1">
                Do you want to switch to demo ? <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Click here</button>
            </form>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="text-center mb-5">
                <h4>Change your Offer ?</h4>
            </div>
        </div>
    </div>

    @if ($abonnement->offre == 'demo')

    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card plan-box">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5>Basique</h5>
                        </div>
                    </div>
                    <div class="py-4">
                        <h2>39<sup><small>DT</small></sup>/ <span class="font-size-13">mois</span></h2>
                        <div style="color: #dc3545;">
                            <h5>390<sup><small>DT</small></sup>/ <span class="font-size-13">mois</span></h5>
                            <p>Profitez de deux mois gratuits</p>
                        </div>
                        <form id="plan-form-basique" action="/change-plan" method="POST">
                            @csrf
                            <input type="hidden" name="plan_name" value="basique">
                            <input type="hidden" name="duration" id="selected-duration-basique" value="1">
                            <div class="col-xl-9 col-sm-6 mx-auto mt-1 text-center" id="duration-options-basique">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="duree-basique" id="btnradio4-basique" autocomplete="off" value="1" checked>
                                    <label class="btn btn-outline-primary" for="btnradio4-basique">1 mois</label>
                                    <input type="radio" class="btn-check" name="duree-basique" id="btnradio6-basique" autocomplete="off" value="12">
                                    <label class="btn btn-outline-primary" for="btnradio6-basique">12 mois</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center plan-btn">
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="submitPlanForm('basique')">Change now</button>
                    </div>
                    <div class="plan-features mt-5">
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Menu interactif dynamique</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Accès complet à la création de menu</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Ajout illimité de produits au menu</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Imprimez des codes QR pour chaque table</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Analyse approfondie des données</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Support 24/7</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6">
            <div class="card plan-box">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5>Professionnel</h5>
                        </div>
                    </div>
                    <div class="py-4">
                        <h2>79<sup><small>DT</small></sup>/ <span class="font-size-13">mois</span></h2>
                        <div style="color: #dc3545;">
                            <h5>790<sup><small>DT</small></sup>/ <span class="font-size-13">mois</span></h5>
                            <p>Profitez de deux mois gratuits</p>
                        </div>
                        <form id="plan-form-professionnel" action="/change-plan" method="POST">
                            @csrf
                            <input type="hidden" name="plan_name" value="professionnel">
                            <input type="hidden" name="duration" id="selected-duration-professionnel" value="1">
                            <div class="col-xl-9 col-sm-6 mx-auto mt-1 text-center" id="duration-options-professionnel">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="duree-professionnel" id="btnradio4-professionnel" autocomplete="off" value="1" checked>
                                    <label class="btn btn-outline-primary" for="btnradio4-professionnel">1 mois</label>
                                    <input type="radio" class="btn-check" name="duree-professionnel" id="btnradio6-professionnel" autocomplete="off" value="12">
                                    <label class="btn btn-outline-primary" for="btnradio6-professionnel">12 mois</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center plan-btn">
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="submitPlanForm('professionnel')">Change now</button>
                    </div>
                    <div class="plan-features mt-5">
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Menu interactif dynamique</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Accès complet à la création de menu</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Ajout illimité de produits au menu</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Imprimez des codes QR pour chaque table</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Analyse approfondie des données</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Support 24/7</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Prise de commande facile et rapide via le site web</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif ($abonnement->offre == 'basique')

    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card plan-box">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5>Professionnel</h5>
                        </div>
                    </div>
                    <div class="py-4">
                        <h2>79<sup><small>DT</small></sup>/ <span class="font-size-13">mois</span></h2>
                        <div style="color: #dc3545;">
                            <h5>790<sup><small>DT</small></sup>/ <span class="font-size-13">mois</span></h5>
                            <p>Profitez de deux mois gratuits</p>
                        </div>
                        <form id="plan-form-professionnel" action="/change-plan" method="POST">
                            @csrf
                            <input type="hidden" name="plan_name" value="professionnel">
                            <input type="hidden" name="duration" id="selected-duration-professionnel" value="1">
                            <div class="col-xl-9 col-sm-6 mx-auto mt-1 text-center" id="duration-options-professionnel">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="duree-professionnel" id="btnradio4-professionnel" autocomplete="off" value="1" checked>
                                    <label class="btn btn-outline-primary" for="btnradio4-professionnel">1 mois</label>
                                    <input type="radio" class="btn-check" name="duree-professionnel" id="btnradio6-professionnel" autocomplete="off" value="12">
                                    <label class="btn btn-outline-primary" for="btnradio6-professionnel">12 mois</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center plan-btn">
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="submitPlanForm('professionnel')">Change now</button>
                    </div>
                    <div class="plan-features mt-5">
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Menu interactif dynamique</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Accès complet à la création de menu</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Ajout illimité de produits au menu</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Imprimez des codes QR pour chaque table</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Analyse approfondie des données</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Support 24/7</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Prise de commande facile et rapide via le site web</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else

    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card plan-box">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5>Basique</h5>
                        </div>
                    </div>
                    <div class="py-4">
                        <h2>39<sup><small>DT</small></sup>/ <span class="font-size-13">mois</span></h2>
                        <div style="color: #dc3545;">
                            <h5>390<sup><small>DT</small></sup>/ <span class="font-size-13">mois</span></h5>
                            <p>Profitez de deux mois gratuits</p>
                        </div>
                        <form id="plan-form-basique" action="/change-plan" method="POST">
                            @csrf
                            <input type="hidden" name="plan_name" value="basique">
                            <input type="hidden" name="duration" id="selected-duration-basique" value="1">
                            <div class="col-xl-9 col-sm-6 mx-auto mt-1 text-center" id="duration-options-basique">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="duree-basique" id="btnradio4-basique" autocomplete="off" value="1" checked>
                                    <label class="btn btn-outline-primary" for="btnradio4-basique">1 mois</label>
                                    <input type="radio" class="btn-check" name="duree-basique" id="btnradio6-basique" autocomplete="off" value="12">
                                    <label class="btn btn-outline-primary" for="btnradio6-basique">12 mois</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center plan-btn">
                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="submitPlanForm('basique')">Change now</button>
                    </div>
                    <div class="plan-features mt-5">
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Menu interactif dynamique</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Accès complet à la création de menu</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Ajout illimité de produits au menu</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Imprimez des codes QR pour chaque table</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Analyse approfondie des données</p>
                        <p><i class="bx bx-checkbox-square text-primary me-2"></i> Support 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif

</div> <!-- container-fluid -->

<script>
    function submitPlanForm(plan) {
        let selectedDuration = document.querySelector('input[name="duree-' + plan + '"]:checked').value;
        document.getElementById('selected-duration-' + plan).value = selectedDuration;
        document.getElementById('plan-form-' + plan).submit();
    }
</script>
@endsection
