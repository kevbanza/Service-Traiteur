

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <title>BoraBoraFoods</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/img/logo.png')}}" />
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('assets/autre/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/autre/css/bootstrap-icons.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/autre/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/autre/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/autre/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/autre/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/autre/css/style.css')}}" rel="stylesheet">
    @yield('style')
</head>



<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                   <!--  <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                    <img src="{{asset('assets/img/logo_sss.png')}}" width="180" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="{{route('index')}}" class="nav-item nav-link active">Accueil</a>
                        <a href="{{route('about')}}" class="nav-item nav-link">A Propos</a>
                        <a href="{{route('service')}}" class="nav-item nav-link">Service Traiteur</a>
                        <a href="{{route('menu')}}" class="nav-item nav-link">Menu</a>
                        <!--<div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{route('booking')}}" class="dropdown-item">Booking</a>
                                <a href="{{route('team')}}" class="dropdown-item">Our Team</a>
                                <a href="{{route('testimonial')}}" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>-->
                        <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="{{route('panier')}}" class="btn btn-primary py-2 px-4">
                        <i class="fa fa-cart-plus"></i> Panier (<span id="basketElement">{{session()->get('cart') ? sizeof(session()->get('cart')) : 0}}</span>)</a>
                </div>
            </nav>



			 @yield('breadcrumb')
            
        </div>
        <!-- Navbar & Hero End -->


		@yield('content')

        <!-- Testimonial End -->
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Nos Infos</h4>
                        <a class="btn btn-link" href="">Accueil</a>
                        <a class="btn btn-link" href="">A Propos</a>
                        <a class="btn btn-link" href="">Service Traiteur</a>
                        <a class="btn btn-link" href="">Menu</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, France</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@borabora.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Ouvert</h4>
                        <h5 class="text-light fw-normal">Lundi - Dimanche</h5>
                        <p>00:00 - 23:59</p>
                        <h5 class="text-light fw-normal">Heures</h5>
                        <p>24 heures/24 </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <form method="post" action="{{route('newletter')}}">
                             @csrf
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Obtenez les dernieres infos et Promotions directement.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" name="email" placeholder="Your email">
                            <button type="submit" class="btn btn-primary btn-sm py-2 position-absolute top-0 end-0 mt-2 me-2">S'inscrire</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Bora Bora Foods</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://kevbanza.com">KevBanza</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!--<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    -->
    <script src="{{asset('assets/autre/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/autre/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/autre/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/autre/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/autre/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/autre/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/autre/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/autre/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/autre/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('assets/autre/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('assets/autre/js/sweetalert.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/autre/js/main.js')}}"></script>
    <script>
        function addToBasket(productId, qty){
            $.ajax({
               type:'GET',
               url:"{{ url('add/basket') }}/"+productId,
               success:function(data){
                    $('#basketElement').text(data.panier_element);
                    Swal.fire({
                      title: "Succès!",
                      text: "Le produit a été ajouté au panier!",
                      icon: "success"
                    });
               },
               error : function(data){
                    Swal.fire({
                      title: "Erreur!",
                      text: "Le produit n'a pas été ajouté au panier!",
                      icon: "error"
                    });
               }
            });
        }

        @if (session('success')) 
             Swal.fire({
                      title: "Succès!",
                      text: "{{session('success')}}",
                      icon: "success"
                    });
        @endif

        @if (session('error')) 
             Swal.fire({
                      title: "Erreur!",
                      text: "{{session('error')}}",
                      icon: "error"
                    });
        @endif
    </script>
  @yield('script')
</body>

</html>