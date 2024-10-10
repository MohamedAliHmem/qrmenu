<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Commander en ligne</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Commander en ligne">
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

<div>
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
                        <h5>Votre Panier</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column">
                        <div class="header-cart-body">
                            <div class="header-cart-products">
                                @foreach ($orderSeparated as $order)
                                <?php
                                    $orderSeparatedByEtoile = array_filter(explode(':', $order));
                                    $product = \App\Models\Produit::find($orderSeparatedByEtoile[0]);
                                    $total = $total + ($product->price * $orderSeparatedByEtoile[1]);
                                    $count ++ ;
                                ?>
                                <div class="header-cart-product">
                                    <div class="header-cart-product-thumb">
                                        @if ($product->logo)
<a href="/product/{{$numTable}}/{{$product -> id}}/{{$product -> idCafe}}" class="header-cart-product-image"><img src="{{asset('storage/'.$product->logo)}}" alt="House Coffee Original" width="90" height="103"></a>
                                        @endif

                                        <a href="/deleteProductCart/{{$product->id}}/{{$orderSeparatedByEtoile[1]}}/{{$numTable}}/{{$product->idCafe}}" class="header-cart-product-remove"><i class="sli-close" style="color: #fff"></i></a>
                                    </div>
                                    <div class="header-cart-product-content">
                                        <h5 class="header-cart-product-title"><a href="/product/{{$numTable}}/{{$product -> id}}/{{$product -> idCafe}}">{{$product->name}}</a></h5>
                                        <span class="header-cart-product-quantity">{{$orderSeparatedByEtoile[1]}} x {{$product->price}} DT</span>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                        @if ($orderSeparated)
                        <div class="header-cart-footer">
                            <h4 class="header-cart-total">Total: <span>{{$total}} DT</span></h4>
                            <div class="header-cart-buttons">
                                <a href="/Checkout/{{$numTable}}" class="btn btn-outline-dark btn-primary-hover" data-bs-toggle="modal" data-bs-target="#noteModalPanier">Acheter Maintenant</a>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-10 col"></div>
                <!-- Menu Start -->
                @if($numTable==0)
                    <div class="col">
                        <a href='/dashboard' class="btn btn-dark btn-primary-hover rounded-0">Return To Dashboard</a>
                    </div>
                    <div class="col-lg-6 col"></div>
                @endif
                <!-- Menu End -->

                <div class="col-lg-2 col d-flex justify-content-end">
                    <div class="header-action-item">
                        <button class="header-action-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-cart">
                            <i class="sli-basket-loaded"><span class="count">{{$count}}</span></i>
                            <span class="amount">{{$total}} DT</span>
                        </button>
                    </div>
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
                <li><a href="javascript:void(0);" onclick="window.history.back();">RETOUR</a></li>
                <li>DÉTAILS DU PRODUIT</li>
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
                            @if ($item->logo)
<div class="swiper-slide image-zoom"><img src="{{asset('storage/'.$item->logo)}}" alt="Signature Blend Roast Coffee"></div>
                            @endif

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

                        @if ($item -> idCategory != 0)
                            <h1 class="single-product-title">{{$item -> name}} ( {{$category -> title}} )</h1>
                        @else
                            <h1 class="single-product-title">{{$item -> name}}</h1>
                        @endif


                        <div style="margin-top: -1em;  color: #8f8f8f;">{{$item -> note}}</div>

                        <div class="single-product-price">{{$item -> price}} DT</div>

                        <div class="single-product-actions">
                            <div class="single-product-actions-item">

                                <div class="product-quantity-count">
                                    <button class="dec qty-btn">-</button>
                                    <input class="product-quantity-box" type="text" name="quantity" value="1" id="mainQuantity">
                                    <button class="inc qty-btn">+</button>
                                </div>

                            </div>
                            <div class="single-product-actions-item"><button type="submit" class="btn btn-dark btn-primary-hover rounded-0" formaction="/addToCard/{{$numTable}}/{{$item -> id}}/{{$item -> idCafe}}">AJOUTER AU PANIER</button></div>
                        </div>
                        <div class="single-product-buy-now">
                            <button type="button" class="btn btn-dark btn-primary-hover rounded-0" data-bs-toggle="modal" data-bs-target="#noteModal">ACHETER MAINTENANT</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- Product Content End -->

            <!-- Single Product Bottom (Description) Area End -->

        </div>
    </div>
    </div>
    <!-- Product Details Section End -->



    <!-- Footer Section Start -->
    <div class="footer-section section">
        <!-- Footer Top Section Start -->
        <div class="footer-top section">
            <div class="container">
                <div class="row mb-n8 gy-lg-0 gy-4">

                    <<div class="col-lg-6 col-sm-6 col-12 mb-8" style="color: #fff">
                        <div class="footer-widget footer-widget-dark">
                          <h5 class="footer-widget-title">Plus d'Information Sur Cette Application</h5>
                          <ul style="margin: 0; padding: 0; list-style: none;">
                            <li style="line-height: 1.5; display: flex; align-items: center; gap: 10px;">
                              <i class="sli-phone"></i>Hotline: <a href="tel:+929530875" style="margin-left: 5px; color: inherit; text-decoration: none;">92 530 875</a>
                            </li>
                            <li style="line-height: 1.5; display: flex; align-items: center; gap: 10px; margin-top: 15px;">
                              <i class="sli-envelope"></i>Email: <a href="mailto:Service@Paloma-Tech-Solutions.tn" style="margin-left: 5px; color: inherit; text-decoration: none;">Service@Paloma-Tech-Solutions.tn</a>
                            </li>
                            <li style="line-height: 1.5; display: flex; align-items: center; gap: 10px; margin-top: 15px;">
                              <i class="sli-magnifier"></i>Notre Site Web: <a href="https://www.paloma-tech-solutions.tn" target="_blank" style="margin-left: 5px; color: inherit; text-decoration: none;">Paloma-Tech-Solutions.tn</a>
                            </li>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const noteModal = document.getElementById('noteModal');
            noteModal.addEventListener('show.bs.modal', function (event) {
                const mainQuantity = document.getElementById('mainQuantity').value;
                document.getElementById('modalQuantity').value = mainQuantity;
            });
        });
    </script>

    <!-- Modal -->
<div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noteModalLabel">Ajouter Une Remarque</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="noteForm" action="/buy/{{$numTable}}/{{$item->id}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="note" class="form-label">Ajouter Une Remarque Si Vous Voulez</label>
                        <textarea class="form-control" id="remarque" name="remarque" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="quantity" id="modalQuantity">
                    <button type="submit" class="btn btn-dark">Confirmer l'Achat</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Modal2 -->
    <div class="modal fade" id="noteModalPanier" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteModalLabel">Ajouter Une Remarque 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="noteForm" action="/Checkout/{{$numTable}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="note" class="form-label">Ajouter Une Remarque Si Vous Voulez</label>
                            <textarea class="form-control" id="remarque" name="remarque" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Confirmer l'Achat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
