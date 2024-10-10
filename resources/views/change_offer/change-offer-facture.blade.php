<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Paiement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="assets/js/plugin.js"></script>
    <style>
        .payment-button {
            border: 1px solid #007bff;
            color: #007bff;
            background-color: white;
            border-radius: 50px;
            font-weight: bold;
            padding: 10px 30px;
            transition: all 0.3s;
        }
        .payment-button:hover {
            background-color: #007bff;
            color: white;
        }
        .payment-details {
            border: 1px solid #dee2e6;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5 text-muted">
                        <a href="index.html" class="d-block auth-logo">
                            <img src="assets-welcome-page/img/logo/logo-black.png" alt="" height="30" class="auth-logo-dark mx-auto">
                        </a>
                        @php
                            $data = session('data');
                            $abonnement = session('abonnement');
                            $dateDiffGreaterThanTwoMonths = session('dateDiffGreaterThanTwoMonths');
                            $telechargerFacture = session('telechargerFacture');
                        @endphp

                    </div>
                </div>
            </div>
            @php
                $data = session('data');
                $abonnement = session('abonnement');
                $dateDiffGreaterThanTwoMonths = session('dateDiffGreaterThanTwoMonths');
            @endphp
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-2">
                                <div>
                                    <div class="avatar-md mx-auto">
                                        <div class="avatar-title rounded-circle bg-light">
                                            <i class="bx bx-check-double h1 mb-0 text-primary"></i>
                                        </div>
                                    </div>

                                    <div class="p-2 mt-4">
                                        <div class="text-center">
                                            <h4>Offer changed successfully !</h4>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body" id="invoice-section">
                                                        <div class="invoice-title">
                                                            <div class="auth-logo mb-4">
                                                                <img src="assets-welcome-page/img/logo/logo-black.png" alt="logo" class="auth-logo-dark" height="25"/>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <address>
                                                                    <strong>Bon de commande:</strong><br>
                                                                    Numéro : <b>{{$data->id}}</b><br>
                                                                    Date : <b>{{($abonnement->date_debut)->toDateString()}}</b><br>
                                                                    Expiration : <b>{{ \Carbon\Carbon::parse($abonnement->date_debut)->addDays(15)->toDateString() }}</b><br>
                                                                    Etat : <b>En cours de validation</b>
                                                                </address>
                                                            </div>
                                                            <div class="col-sm-6 text-sm-end">
                                                                <address class="mt-2 mt-sm-0">
                                                                    <strong>Contact de facturation :</strong><br>
                                                                    {{$data->name}}<br>
                                                                    {{$data->email}}<br>
                                                                    {{$data->telephone}}<br>
                                                                    {{$data->adresse}}
                                                                </address>
                                                            </div>
                                                        </div>
                                                        <div class="py-2 mt-3">
                                                            <h3 class="font-size-15 fw-bold">Récapitulatif de la commande</h3>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 70px;">No.</th>
                                                                        <th>Offre</th>
                                                                        <th>Abonnement</th>
                                                                        <th class="text-end">Prix</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>01</td>
                                                                        <td>{{ $abonnement->offre }}</td>
                                                                        @if ($dateDiffGreaterThanTwoMonths)
                                                                            <td>12 mois</td>
                                                                        @else
                                                                            <td>1 mois</td>
                                                                        @endif
                                                                        @if ($abonnement->offre == 'professionnel')
                                                                            @if ($dateDiffGreaterThanTwoMonths)
                                                                                <td class="text-end">790.00 DT</td>
                                                                            @else
                                                                                <td class="text-end">79.00 DT</td>
                                                                            @endif

                                                                        @else
                                                                            @if ($dateDiffGreaterThanTwoMonths)
                                                                                <td class="text-end">390.00 DT</td>
                                                                            @else
                                                                                <td class="text-end">39.00 DT</td>
                                                                            @endif
                                                                        @endif

                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3" class="text-end">Total HT</td>
                                                                        @if ($abonnement->offre == 'professionnel')
                                                                            @if ($dateDiffGreaterThanTwoMonths)
                                                                                <td class="text-end">790.00 DT</td>
                                                                            @else
                                                                                <td class="text-end">79.00 DT</td>
                                                                            @endif

                                                                        @else
                                                                            @if ($dateDiffGreaterThanTwoMonths)
                                                                                <td class="text-end">390.00 DT</td>
                                                                            @else
                                                                                <td class="text-end">39.00 DT</td>
                                                                            @endif
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3" class="border-0 text-end">
                                                                            <strong>TVA</strong></td>
                                                                        @if ($abonnement->offre == 'professionnel')
                                                                            @if ($dateDiffGreaterThanTwoMonths)
                                                                                <td class="text-end">150.1 DT</td>
                                                                            @else
                                                                                <td class="border-0 text-end">15.01 DT</td>
                                                                            @endif

                                                                        @else
                                                                            @if ($dateDiffGreaterThanTwoMonths)
                                                                                <td class="text-end">74.10 DT</td>
                                                                            @else
                                                                                <td class="border-0 text-end">7.41 DT</td>
                                                                            @endif
                                                                        @endif
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3" class="border-0 text-end">
                                                                            <strong>Total TTC</strong></td>

                                                                        @if ($abonnement->offre == 'professionnel')
                                                                            @if ($dateDiffGreaterThanTwoMonths)
                                                                                <td class="text-end">940.10 DT</td>
                                                                            @else
                                                                                <td class="border-0 text-end"><h4 class="m-0">94.01 DT</h4></td>
                                                                            @endif
                                                                        @else
                                                                            @if ($dateDiffGreaterThanTwoMonths)
                                                                                <td class="text-end">464.10 DT</td>
                                                                            @else
                                                                                <td class="border-0 text-end"><h4 class="m-0">46.41 DT</h4></td>
                                                                            @endif

                                                                        @endif
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                                <a href="javascript:printInvoice()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="text-center">Choisissez un mode de paiement</h4>
                                        <br>
                                        <div class="d-flex justify-content-center mt-3">
                                            <button id="virementBtn" class="payment-button mx-2">Virement bancaire</button>
                                            <button id="ordrePostalBtn" class="payment-button mx-2">Ordre postal</button>
                                        </div>
                                        <div id="virementDetails" class="payment-details mt-4" style="display: none;">
                                            <p>Information :</p>
                                            <li class="text-muted">Le paiement par virement bancaire entraîne systématiquement un traitement maximum de trois jours.</li><br>
                                            <li class="text-muted">Virement provenant d'un établissement bancaire domicilié en Tunisie uniquement.</li><br>
                                            <li class="text-muted">Dès que nous avons la confirmation que la somme due a bien été versée sur le compte, et qu'elle correspond exactement à votre commande, nous activons votre service.</li>
                                            <br>
                                            <p>Mode opératoire :</p>
                                            <li class="text-muted">1 - Indiquez la référence suivant sur votre note de virement : <b>"ORDER: 123456"</b>
                                                dans le champ "libéllé, motif, objet..." de l'opération bancaire.</li><br>
                                            <li class="text-muted">2 - Le montant du transfert est : <b>49.00 DT</b></li><br>
                                            <li class="text-muted">3 - Effectuer un virement bancaire</li>
                                            <br>
                                            <p class="text-muted" style="margin-left: 80px;">
                                                Banque : <b>ATB</b> <br>
                                                Adresse : <b>Rue du Lac Turkana - Les Berges du Lac - 1053 Tunis - Tunisie</b> <br> <br>
                                                Titulaire du compte : <b>PALOMA TECH SOLUTIONS</b> <br>
                                                Numéro de compte : <b>12 123 12 12345678912 12</b> <br>
                                                Numero iban : <b>TN12 12 123 12 12345678912 12</b> <br>
                                                Identifiant BIC : <b>AAAAAAAA</b> <br>
                                            </p>
                                            <li class="text-muted">4 - Afin de valider votre paiement, veuillez nous envoyer par email à l’adresse <b>Service@Paloma-Tech-Solutions.tn</b> votre preuve de paiement et indiquer votre N° de BC dans le sujet du mail. Les formats des pièces jointes acceptés sont : .pdf .png .gif .jpg et .bmp (6Mo maximum)</li>
                                        </div>
                                        <div id="ordrePostalDetails" class="payment-details mt-4" style="display: none;">
                                            <p>Information :</p>
                                            <li class="text-muted">Le Mandat entraîne systématiquement un traitement maximum de 2 jours.</li> <br>
                                            <li class="text-muted">Dès que nous avons la confirmation que la somme due a bien été versée sur le compte et qu'elle correspond exactement à votre commande, nous activerons votre service.</li>
                                            <br>
                                            <p>Mode opératoire :</p>
                                            <li class="text-muted">1 - Effectuer un Mandat auprès de la Poste Tunisienne</li>
                                            <br>
                                            <p class="text-muted" style="margin-left: 80px;">
                                                Destinataire : <b>PALOMA TECH SOLUTIONS</b> <br>
                                                N° de compte CCP : <b>123456789</b> <br>
                                                Montant du mandat : <b>49.00 DT</b>
                                            </p>
                                            <li class="text-muted">2 - Afin de valider votre paiement, veuillez nous envoyer par email à l’adresse <b>Service@Paloma-Tech-Solutions.tn</b> votre preuve de paiement et indiquer votre N° de BC dans le sujet du mail. Les formats des pièces jointes acceptés sont : .pdf .png .gif .jpg et .bmp (6Mo maximum)</li>
                                        </div>
                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="/home" class="btn btn-success">Retour au tableau de bord</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p>Hotline: 92 530 875 - Email: Service@Paloma-Tech-Solutions.tn</p>
                        <p>© <script>document.write(new Date().getFullYear())</script> PALOMA TECH SOLUTIONS. Tous droits réservés.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
    <script>
        document.getElementById('virementBtn').addEventListener('click', function() {
            document.getElementById('virementDetails').style.display = 'block';
            document.getElementById('ordrePostalDetails').style.display = 'none';
        });
        document.getElementById('ordrePostalBtn').addEventListener('click', function() {
            document.getElementById('virementDetails').style.display = 'none';
            document.getElementById('ordrePostalDetails').style.display = 'block';
        });

        function printInvoice() {
            var printContents = document.getElementById('invoice-section').innerHTML;

            var printWindow = window.open('https://paloma-tech-solutions.tn', '', 'height=600,width=800');
            printWindow.document.write('<html><head><title>Facture</title>');
            printWindow.document.write('<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
            printWindow.document.write('<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />');
            printWindow.document.write('<style>@media print {.no-print { display: none; }}</style>');
            printWindow.document.write('</head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('<button class="no-print" onclick="window.print();">Imprimer la Facture</button>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
        }
    </script>
</body>
</html>
