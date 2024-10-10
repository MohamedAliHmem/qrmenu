<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- App js -->
        <script src="assets/js/plugin.js"></script>

    </head>

    <body>
        @if ($abonnement->offre != 'demo' && $abonnement->paiement == 0)
            <!-- subscribeModal -->
            <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Removed Close Button -->
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <div class="avatar-md mx-auto mb-4">
                                    <div class="avatar-title bg-light rounded-circle text-primary h1">
                                        <i class="bx bx-confused"></i>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-xl-10">
                                        <h4 class="text-primary">Need to activate your account!</h4>
                                        <p class="text-muted font-size-14 mb-4">You can't add products because your account is not activated. <a href="/telechargerFacture">click here to activate</a></p>
                                        <a class="btn btn-primary waves-effect waves-light mt-3" href="/dashboard">Return To Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->
        @endif



        <div class="account-pages my-5 pt-sm-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary-subtle">
                                <div class="row">
                                    <div class="col-7">

                                        <div class="text-primary p-4">
                                            <h5 class="text-primary mt-3">Add New Product</h5>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <br>
                                @if(Session::has('alert'))
                                    <div class="alert alert-success">
                                        {{ Session::get('alert') }}
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
                                <div class="p-2">

                                    <form enctype="multipart/form-data" class="needs-validation" novalidate action="/addP" method="post">
                                    @csrf
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="productName" name="name" placeholder="Enter Product Name" maxlength="255" required>
                                            <div class="invalid-feedback">
                                                Please Enter Product Name
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Price</label>
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" step="0.01" required>
                                            <div class="invalid-feedback">
                                                Please Enter Price
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Image</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" placeholder="Image"
                                                    id="example-text-input" accept="image/*" name="logo">

                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="CategoryType" class="form-label">Category</label>
                                            <div class="d-flex me-3">
                                                <select class="form-select" id="Category" name="Category">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $id => $title)
                                                    <option value="{{ $id }}">{{ $title }}</option>
                                                    @endforeach
                                                </select>
                                                <a class="btn btn-primary waves-effect waves-light" href="/addCategory">Add New Category</a>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="note" class="form-label">Note</label>
                                            <input type="text" class="form-control" id="note" name="note" placeholder="Enter Product Note If Needed" maxlength="255">

                                        </div>
                                        @if ($abonnement->paiement == 1)
                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-success waves-effect waves-light" type="submit">Add Product</button>
                                            </div>
                                        @endif

<a class="btn btn-primary waves-effect waves-light mt-3" href="/dashboard">Return To Dashboard</a>

                                    </form>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- validation init -->
        <script src="assets/js/pages/validation.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

        <!-- Script to Show Modal on Load -->
        <script>
            $(document).ready(function() {
                $('#subscribeModal').modal('show');
            });
        </script>
    </body>
</html>
