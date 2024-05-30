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
        
        <div class="account-pages my-5 pt-sm-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary-subtle">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Add cafe details</h5>
                                            <p>Get your cafe management system now.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <br>
                                <div class="p-2">
                                
                                    <form enctype="multipart/form-data" class="needs-validation" novalidate action="/addC" method="post">
                                    @csrf
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">cafe Name</label>
                                            <input type="text" class="form-control" id="cafeName" name="cafeName" placeholder="Enter cafe name" required>  
                                            <div class="invalid-feedback">
                                                Please Enter cafe Name
                                            </div>      
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Adress</label>
                                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Enter adresse" required>  
                                            <div class="invalid-feedback">
                                                Please Enter Adresse
                                            </div>      
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Phone number</label>
                                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
                                            <div class="invalid-feedback">
                                                Please Enter Phone Number
                                            </div>  
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Logo</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="file" placeholder="Logo"
                                                    id="example-text-input" accept="image/*" name="logo">
                                                
                                            </div>
                                        </div>
                    
                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                        </div>

                
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

    </body>
</html>
