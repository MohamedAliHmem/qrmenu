<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kofi - Coffee Shop Website Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Kofi - Coffee Shop Website Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assetsWeb/images/favicon.png">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Fonts CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;family=Oswald:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="/assetsWeb/css/vendor/bootstrap.min.css">

    <!-- Icons CSS -->
    <link rel="stylesheet" href="/assetsWeb/css/plugins/simple-line-icons.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/assetsWeb/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assetsWeb/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="/assetsWeb/css/plugins/ion.rangeSlider.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/assetsWeb/css/style.css">

</head>

<body>

    <div class="header sticky-header section">
        <div class="container-fluid">
            <div class="row align-items-center">

                <?php
                $orderNonSeparated = session('order');
                $orderSeparated = array_filter(explode('/', $orderNonSeparated));
                $total = 0 ;
                $count = 0 ;
                ?>
                 <div class="offcanvas offcanvas-end" id="offcanvas-cart">
                    <div class="offcanvas-header">
                        <h5>Shoping Cart</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column">
                        <div class="header-cart-body">
                            <div class="header-cart-products">
                                @foreach ($orderSeparated as $order)
                                <?php
                                    $product = \App\Models\Produit::find($order[0]);
                                    $total = $total + ($product->price * $order[2]);
                                    $count ++ ;
                                ?>
                                <div class="header-cart-product">
                                    <div class="header-cart-product-thumb">
                                        <a href="product-details.html" class="header-cart-product-image"><img src="{{asset('storage/'.$product->logo)}}" alt="House Coffee Original" width="90" height="103"></a>
                                        <a href="/deleteProductCart/{{$product->id}}/{{$order[2]}}/{{$numTable}}" class="header-cart-product-remove"><i class="sli-close"></i></a>
                                    </div>
                                    <div class="header-cart-product-content">
                                        <h5 class="header-cart-product-title"><a href="product-details.html">{{$product->name}}</a></h5>
                                        <span class="header-cart-product-quantity">{{$order[2]}} x ${{$product->price}}</span>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="header-cart-footer">
                            <h4 class="header-cart-total">Total: <span>${{$total}}</span></h4>
                            <div class="header-cart-buttons">
                                <a href="/Checkout/{{$numTable}}" class="btn btn-outline-dark btn-primary-hover">CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col">
                    <div class="header-action-item">
                        <button class="header-action-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-cart"><i class="sli-basket-loaded"><span class="count">{{$count}}</span></i> <span class="amount">${{$total}}</span></button>
                    </div>
                </div>

                <!-- Menu Start -->
                <div class="col d-none d-lg-block">
                    @if($numTable==0)
                    <a href='/dashboard' class="btn btn-dark btn-primary-hover rounded-0">Return To Dashboard</a>
                    @endif

                </div>
                <!-- Menu End -->


                <div class="col-auto">

                        <div class="header-action-item d-lg-none">
                            <button class="header-action-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-header"><i class="sli-menu"></i></button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>





    <!-- Page Banner Section Start -->
    <div class="page-banner-section section">
        <div class="container">
            <ul class="breadcrumb">
                <li>Our Products</li>
            </ul>
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Product Section Start -->
    <div class="shop-product-section section section-padding">
        <div class="container">
        @if(Session::has('alert'))
                            <div class="alert alert-success">
                                {{ Session::get('alert') }}
                            </div>
                        @endif
            <!-- Shop Top Bar Start -->
            <div class="shop-top-bar">
                <div class="shop-top-bar-item">
                    <div class="nav list-grid-toggle">
                        <button class="active" data-bs-toggle="tab" data-bs-target="#product-grid"><i class="sli-grid"></i></button>
                    </div>
                </div>

            </div>
            <!-- Shop Top Bar End -->

            <!-- Product Tab Start -->
            <div class="tab-content" id="shopProductTabContent">
                <div class="tab-pane fade show active" id="product-grid">
                    <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 mb-n6">
                    @foreach($data as $item)
                        <div class="col mb-6">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="/product/{{$numTable}}/{{$item -> id}}" class="product-image"><img loading="lazy" src="{{asset('storage/'.$item->logo)}}" alt="House Coffee Original" width="268" height="306"></a>

                                </div>
                                <div class="product-content">

                                    <h5 class="product-title"><a href="/product/{{$numTable}}/{{$item -> id}}">{{$item -> name}}</a></h5>
                                    <div class="product-price">{{$item -> price}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
            <!-- Product Tab End -->


        </div>
    </div>
    <!-- Product Section End -->

    <!-- Footer Section Start -->
    <div class="footer-section section">
        <!-- Footer Top Section Start -->
        <div class="footer-top section">
            <div class="container">
                <div class="row mb-n8 gy-lg-0 gy-4">

                    <!-- Footer Widget Start -->
                    <div class="col-lg-6 col-sm-6 col-12 mb-8">
                        <div class="footer-widget footer-widget-dark">
                            <h5 class="footer-widget-title">About Info</h5>
                            <p>This is the perfect place to find a nice and cozy spot to sip some. You'll find the Java Jungle.</p>
                            <ul class="footer-widget-list-icon">
                                <li><i class="sli-location-pin"></i>Adress: {{Auth::User()->adresse}}</li>
                                <li><i class="sli-envelope"></i>Email: {{Auth::User()->email}}</li>
                                <li><i class="sli-phone"></i>Phone: {{Auth::User()->telephone}}</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer Top Section End -->

        <!-- Footer Bottom Section Start -->
        <div class="footer-bottom footer-bottom-dark section">
            <div class="container">
                <div class="row justify-content-between align-items-center mb-n2">




                </div>
            </div>
        </div>
        <!-- Footer Bottom Section End -->

    </div>
    <!-- Footer Section End -->



    <button class="scroll-to-top"><i class="sli-arrow-up"></i></button>

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="/assetsWeb/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="/assetsWeb/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/assetsWeb/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="/assetsWeb/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="/assetsWeb/js/plugins/swiper-bundle.min.js"></script>
    <script src="/assetsWeb/js/plugins/jquery.countdown.min.js"></script>
    <script src="/assetsWeb/js/plugins/svg-inject.min.js"></script>
    <script src="/assetsWeb/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="/assetsWeb/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="/assetsWeb/js/plugins/jquery.zoom.min.js"></script>
    <script src="/assetsWeb/js/plugins/resize-sensor.js"></script>
    <script src="/assetsWeb/js/plugins/jquery.sticky-sidebar.min.js"></script>

    <!-- Activation JS -->
    <script src="/assetsWeb/js/active.js"></script>

</body>

</html>
