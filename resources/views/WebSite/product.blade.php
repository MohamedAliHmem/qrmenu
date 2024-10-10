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
                                    $orderSeparatedByEtoile = array_filter(explode('*', $order));
                                    $product = \App\Models\Produit::find($orderSeparatedByEtoile[0]);
                                    $total = $total + ($product->price * $orderSeparatedByEtoile[1]);
                                    $count ++ ;
                                ?>
                                <div class="header-cart-product">
                                    <div class="header-cart-product-thumb">
                                        <a href="product-details.html" class="header-cart-product-image"><img src="{{asset('storage/'.$product->logo)}}" alt="House Coffee Original" width="90" height="103"></a>
                                        <a href="/deleteProductCart/{{$product->id}}/{{$orderSeparatedByEtoile[1]}}/{{$numTable}}/{{$product->idCafe}}" class="header-cart-product-remove"><i class="sli-close"></i></a>
                                    </div>
                                    <div class="header-cart-product-content">
                                        <h5 class="header-cart-product-title"><a href="product-details.html">{{$product->name}}</a></h5>
                                        <span class="header-cart-product-quantity">{{$orderSeparatedByEtoile[1]}} x ${{$product->price}}</span>
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


                <div class="col-auto">
                    <div class="header-action">

                        </div>
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
                <li><a href="/shop/{{$numTable}}/{{$product->idCafe}}">Return</a></li>
                <li>Product details</li>
            </ul>
        </div>
    </div>
    <!-- Page Banner Section End -->

    <!-- Product Details Section Start -->
    <div class="product-details-section section section-padding">
        <div class="container">

            <!-- Single Product Top Area Start -->
            <div class="row row-cols-md-2 row-cols-1 mb-n6">

                <!-- Product Image Start -->
                <div class="col mb-6">
                    <div class="single-product-image">

                        <!-- Product Image Slider Start -->
                        <div class="product-image-slider swiper">
                            <div class="swiper-wrapper">
                            @foreach($data as $item)
                                <div class="swiper-slide image-zoom"><img src="{{asset('storage/'.$item->logo)}}" alt="Signature Blend Roast Coffee"></div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination d-none"></div>
                            <div class="swiper-button-prev d-none"></div>
                            <div class="swiper-button-next d-none"></div>
                        </div>
                        <!-- Product Image Slider End -->

                        <!-- Product Thumbnail Carousel Start -->
                        <div class="product-thumb-carousel swiper">

                            <div class="swiper-pagination d-none"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <!-- Product Thumbnail Carousel End -->

                    </div>
                </div>
                <!-- Product Image End -->

                <!-- Product Content Start -->
                <div class="col mb-6">
                    <div class="single-product-content">
                    <form action="/buy/{{$numTable}}/{{$item -> id}}" method='post'>
                            @csrf
                        <h1 class="single-product-title">{{$item -> name}}</h1>

                        <div class="single-product-price">{{$item -> price}}</div>

                        <div class="single-product-actions">
                            <div class="single-product-actions-item">

                                <div class="product-quantity-count">
                                    <button class="dec qty-btn">-</button>
                                    <input class="product-quantity-box" type="text" name="quantity" value="1">
                                    <button class="inc qty-btn">+</button>
                                </div>

                            </div>
                            <div class="single-product-actions-item"><button type="submit" class="btn btn-dark btn-primary-hover rounded-0" formaction="/addToCard/{{$numTable}}/{{$item -> id}}/{{$item -> idCafe}}">ADD TO CART</button></div>
                        </div>
                        <div class="single-product-buy-now">
                            <button type='submit' class="btn btn-dark btn-primary-hover rounded-0">BUY IT NOW</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Product Content End -->

            <!-- Single Product Bottom (Description) Area End -->

        </div>
    </div>
    <!-- Product Details Section End -->



    <!-- Footer Section Start -->
    <div class="footer-section section">
        <!-- Footer Top Section Start -->
        <div class="footer-top section">
            <div class="container">
                <div class="row mb-n8 gy-lg-0 gy-4">



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
