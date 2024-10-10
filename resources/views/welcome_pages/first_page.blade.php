<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Paloma Tech Solutions</title>
  <meta name="description" content="Découvrez Paloma Tech Solutions, votre partenaire idéal pour des menus digitaux et des QR codes dans le secteur de la restauration. Notre plateforme permet aux cafés et restaurants de créer, gérer et personnaliser leurs menus en ligne de manière simple et efficace. Offrez à vos clients une expérience de commande fluide et sans contact, directement depuis leur smartphone. Profitez de nos solutions innovantes pour optimiser la gestion de votre établissement, que vous soyez un petit café ou un grand restaurant.">
  <meta name="keywords" content="QR Code Menu, Digital Menu, Restaurant QR Code, Cafe Menu Generator, Online Menu Creator, Contactless Menu, Menu QR Code Generator, Restaurant Management Tool, Order Online System, Customizable QR Code, Menu for Cafes, Digital Ordering System, Mobile Menu App, Food Ordering QR Code, Contactless Dining">

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('assets-welcome-page/img/logo/P.png') }}" type="image/png">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets-welcome-page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets-welcome-page/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets-welcome-page/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets-welcome-page/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets-welcome-page/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets-welcome-page/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
    <style>
        .pricing-item .annual-subscription {
          background-color: #f8f9fa;
          padding: 10px;
          margin-top: 5px;
          border-radius: 8px;
        }

        .pricing-item .annual-subscription h5 {
          color: #dc3545;
          font-size: 20px;
          margin: 0;
        }

        .pricing-item .annual-subscription span {
          color: #dc3545;
        }

        .pricing-item .annual-subscription h5 sup {
          font-size: 18px;
        }

        .pricing-item .annual-subscription p {
          margin: 5px 0;
          color: #dc3545;
          font-size: 14px;
        }

        .pricing-item .cta-btn:hover {
          background-color: #0056b3;
        }

    </style>

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="assets-welcome-page/img/logo/logo-black.png" alt="PALOMA TECH SOLUTIONS" class="responsive-logo">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Accueil</a></li>
          <li><a href="#about">À propos</a></li>
          <li><a href="#pricing">Tarifs</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="/login">Connexion</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets-welcome-page/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Bienvenue chez <span>Paloma Tech Solutions</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Salut aux innovateurs de la restauration<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="/register" class="btn-get-started">Créer un compte</a>
            <!--<a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Regarder la vidéo</span></a>-->
          </div>
          <img src="assets-welcome-page/img/photo1.webp" class="img-fluid hero-img mt-2" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Efficacité et Rapidité</a></h4>

                  <li class="description">
                    Réduction du temps d'attente
                  </li>
                  <li class="description">
                    Processus de commande accéléré
                  </li>

              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Expérience Client Enrichie</a></h4>
                <li class="description">
                  Personnalisation facile des plats
                </li>
                <li class="description">
                  Autonomie et contrôle total
                </li>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Efficacité Opérationnelle</a></h4>
                <li class="description">
                  Optimisation des ressources humaines
                </li>
                <li class="description">
                  Réduction des erreurs de commande
                </li>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">À propos de nous</p>
            <h3>Notre application offre les meilleures solutions pour votre menu</h3>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Un affichage élégant et attrayant pour sublimer votre menu.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Contrôlez entièrement votre menu : ajoutez, modifiez et supprimez vos produits à tout moment.</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Analysez vos commandes, produits et tables pour une meilleure gestion de votre entreprise.</span></li>
            </ul>
          </div>
        <!--
          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-6">
                <img src="assets-welcome-page/img/about-company-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="col-lg-6">
                <div class="row gy-4">
                  <div class="col-lg-12">
                    <img src="assets-welcome-page/img/about-company-2.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-12">
                    <img src="assets-welcome-page/img/about-company-3.jpg" class="img-fluid" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>-->

        </div>

      </div>
    </section><!-- /About Section -->

    <!--
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets-welcome-page/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets-welcome-page/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets-welcome-page/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets-welcome-page/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets-welcome-page/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="assets-welcome-page/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>

    </section>-->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tarifs</h2>
        <p>Découvrez nos tarifs compétitifs et profitez de nos offres exceptionnelles</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-item featured">
              <h3>Gratuit</h3>
              <h4>0<sup>DT</sup><span> / 15 jours</span></h4>
              <a href="/register" class="cta-btn">Commencez</a>
              <p class="text-center small">Aucune carte bancaire requise</p>
              <ul>
                <li><i class="bi bi-check"></i> <span>Menu interactif dynamique</span></li>
                <li><i class="bi bi-check"></i> <span>Accès complet à la création de menu</span></li>
                <li><i class="bi bi-check"></i> <span>Ajout illimité de produits au menu</span></li>
                <li><i class="bi bi-check"></i> <span>Imprimez des codes QR pour chaque table</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Analyse approfondie des données</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Support 24/7</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Prise de commande facile et rapide via le site web</span></li>
              </ul>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-item featured">
              <!--<p class="popular">Popular</p>-->
              <h3>Basique</h3>
              <h4>39<sup>DT</sup><span> / mois</span></h4>
              <div class="annual-subscription">
                <h5>390<sup>DT</sup><span> / année</span></h5>
                <p>Profitez de deux mois gratuits</p>
              </div>
              <a href="/register" class="cta-btn">Commencez</a>
              <p class="text-center small">Aucune carte bancaire requise</p>
              <ul>
                <li><i class="bi bi-check"></i> <span>Menu interactif dynamique</span></li>
                <li><i class="bi bi-check"></i> <span>Accès complet à la création de menu</span></li>
                <li><i class="bi bi-check"></i> <span>Ajout illimité de produits au menu</span></li>
                <li><i class="bi bi-check"></i> <span>Imprimez des codes QR pour chaque table</span></li>
                <li><i class="bi bi-check"></i> <span>Analyse approfondie des données</span></li>
                <li><i class="bi bi-check"></i> <span>Support 24/7</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Prise de commande facile et rapide via le site web</span></li>
              </ul>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="pricing-item featured">
              <h3>Professionnel</h3>
              <h4>79<sup>DT</sup><span> / mois</span></h4>
              <div class="annual-subscription">
                <h5>790<sup>DT</sup><span> / année</span></h5>
                <p>Profitez de deux mois gratuits</p>
              </div>
              <a href="/register" class="cta-btn">Commencez</a>
              <p class="text-center small">Aucune carte bancaire requise</p>
              <ul>
                <li><i class="bi bi-check"></i> <span>Menu interactif dynamique</span></li>
                <li><i class="bi bi-check"></i> <span>Accès complet à la création de menu</span></li>
                <li><i class="bi bi-check"></i> <span>Ajout illimité de produits au menu</span></li>
                <li><i class="bi bi-check"></i> <span>Imprimez des codes QR pour chaque table</span></li>
                <li><i class="bi bi-check"></i> <span>Analyse approfondie des données</span></li>
                <li><i class="bi bi-check"></i> <span>Support 24/7</span></li>
                <li><i class="bi bi-check"></i> <span>Prise de commande facile et rapide via le site web</span></li>
              </ul>
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section><!-- /Pricing Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Questions fréquemment posées</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>Comment puis-je recevoir les commandes passées par les clients ?</h3>
                <div class="faq-content">
                  <p>Lorsqu'un client passe une commande, une notification est envoyée à votre email contenant les détails de la commande : les produits commandés, la quantité de chaque produit, le numéro de la table, et toute remarque éventuelle. Notez bien : vous pouvez ajouter une autre adresse email pour recevoir les commandes également. De plus, vous pouvez retrouver toutes les commandes passées dans votre tableau de bord.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Où puis-je trouver l'historique des commandes passées ?</h3>
                <div class="faq-content">
                  <p>Vous pouvez trouver l'historique des commandes passées sur le tableau de bord, où tous les détails de chaque commande sont disponibles.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Puis-je modifier le classement des produits et des catégories dans le menu ?</h3>
                <div class="faq-content">
                  <p>Oui, bien sûr. Vous pouvez modifier le classement des produits et des catégories et choisir leur position souhaitée dans le menu.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Adresse</h3>
              <p>Nabeul, Tunisie</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Appelez-nous</h3>
              <p>+216 92 530 875</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Envoyer un Email</h3>
              <p>Service@Paloma-Tech-Solutions.tn</p>
            </div>
          </div><!-- End Info Item -->

        </div>
      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background text-center mt-auto">
    <!--<div class="container footer-top">
      <div class="row gy-4 justify-content-center">
        <div class="col-lg-4 col-md-6 footer-about">
          <div class="social-links d-flex justify-content-center mt-4">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>-->
    <div class="container copyright text-center mt-4">
      <p>© <span>2024</span><strong class="px-1 sitename">PALOMA TECH SOLUTIONS</strong><span>TOUS LES DROITS SONT RÉSERVÉS</span></p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets-welcome-page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets-welcome-page/vendor/php-email-form/validate.js"></script>
  <script src="assets-welcome-page/vendor/aos/aos.js"></script>
  <script src="assets-welcome-page/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets-welcome-page/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets-welcome-page/js/main.js"></script>

</body>

</html>
