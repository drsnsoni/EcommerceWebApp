<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sleep Sound 2.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
      <!-- Bootstrap CSS -->

      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <!-- Style -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

  <body>
      <!--navbar-->
      <nav class="navbar navbar-expand-lg bg-body-transparent">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}" style="color: red"><img src="images/sleep_sound.jpeg" style="max-height:80px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" >
                  MATTRESSES
                </a>
                <div class="dropdown-menu border-0 ">
                  <div class="card mb-3 border-0 text-align-center">
                      <div class="row g-0 m-auto">
                        <div class="col-md-5 m-auto">
                          <img src="https://assets.mysleepwell.com/uploads/products/GenX-1-1642236924123.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 m-auto">
                            <ul class="list-unstyled">
                                @foreach ($mattresses as $matt)

                                <li><a class="dropdown-item" href="#">{{ $matt->name }}</a></li>
                            @endforeach

                              <li><a class="dropdown-item" href="#">ORTHO CARE</a></li>
                              <li><a class="dropdown-item" href="#">ORTHO MAGIC</a></li>
                              <li><a class="dropdown-item" href="#">DUAL COMFORT</a></li>
                              <li><a class="dropdown-item" href="#">SMART LATEX</a></li>
                              <li><a class="dropdown-item" href="#">SMART MEMORY</a></li>
                              <li><a class="dropdown-item" href="#">DREAMS LATEX</a></li>
                              <li><a class="dropdown-item" href="#">DREAM MEMORY</a></li>
                              <li><a class="dropdown-item" href="#">SMART COIR</a></li>
                              <li><a class="dropdown-item" href="#">COIR COMFORT</a></li>
                              <li><a class="dropdown-item" href="#">NATURE SLEEP</a></li>
                              <li><a class="dropdown-item" href="#">LATEX LUXURY</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>

                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  BEDSETS
                </a>
                <div class="dropdown-menu border-0 ">
                  <div class="card mb-3 border-0 text-align-center">
                      <div class="row g-0 m-auto">
                        <div class="col-md-5 m-auto">
                          <img src="https://photos2.spareroom.co.uk/images/flatshare/listings/large/42/67/42676966.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-5 m-auto">
                          <ul class="list-unstyled">
                            @foreach ($bedsets as $bedset)
                             <li><a class="dropdown-item" href="#">{{ $bedset->name }}</a></li>
                             @endforeach
                              <li><a class="dropdown-item" href="#">ORTHO CARE</a></li>
                              <li><a class="dropdown-item" href="#">ORTHO MAGIC</a></li>
                              <li><a class="dropdown-item" href="#">DUAL COMFORT</a></li>
                              <li><a class="dropdown-item" href="#">SMART LATEX</a></li>
                              <li><a class="dropdown-item" href="#">SMART MEMORY</a></li>
                              <li><a class="dropdown-item" href="#">DREAMS LATEX</a></li>
                              <li><a class="dropdown-item" href="#">DREAM MEMORY</a></li>
                              <li><a class="dropdown-item" href="#">SMART COIR</a></li>
                              <li><a class="dropdown-item" href="#">COIR COMFORT</a></li>
                              <li><a class="dropdown-item" href="#">NATURE SLEEP</a></li>
                              <li><a class="dropdown-item" href="#">LATEX LUXURY</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>

                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/products') }}">PILLOW</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ">ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ">CONTACT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link ">OFFER</a>
              </li>
            </ul>

        </div>
        <div class="d-flex align-items-center">
          <!-- Icon -->


           <!-- Right Side Of Navbar -->
           <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa-solid fa-user" style="color: #000000;"></i> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->is_admin)
                            <a class="dropdown-item" href="{{ route('create_product') }}">
                                Create product
                            </a>
                        @else
                            <a class="dropdown-item" href="{{ route('show_cart') }}">
                                Cart
                            </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('index_order') }}">
                            Order
                        </a>
                        <a class="dropdown-item" href="{{ route('show_profile') }}">
                            Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

        </div>
        <!-- Right elements -->
      </div>
      </nav>

    <main class="py-4">
        @yield('content')
    </main>
  <!--Footer-->
  <footer class="bg-light text-center text-lg-start text-dark">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row my-4">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

          <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
            <img src="images/sleep_sound.jpeg" height="70" alt=""
                 loading="lazy" />
          </div>

          <p class="text-center">Homless animal shelter The budgetary unit of the Capital City of Warsaw</p>

          <ul class="list-unstyled d-flex flex-row justify-content-center">
            <li>
              <a class="text-black px-2" href="#!">
                <i class="fab fa-facebook-square"></i>
              </a>
            </li>
            <li>
              <a class="text-white px-2" href="#!">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a class="text-white ps-2" href="#!">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
          </ul>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">MATTRESSES</h5>

          <ul class="list-unstyled">
            <li class="mb-2">
              <a href="#!" class="text-black"></i>When your pet is missing</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Recently found</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>How to adopt?</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Pets for adoption</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Material gifts</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Help with walks</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Volunteer activities</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">BADSETS</h5>

          <ul class="list-unstyled">
            <li class="mb-2">
              <a href="#!" class="text-black"></i>General information</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>About the shelter</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Statistic data</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Job</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Tenders</a>
            </li>
            <li class="mb-2">
              <a href="#!" class="text-black"></i>Contact</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase mb-4">Contact</h5>

          <ul class="list-unstyled">
            <li>
              <p><i class="fas fa-map-marker-alt pe-2"></i>Warsaw, 57 Street, Poland</p>
            </li>
            <li>
              <p><i class="fas fa-phone pe-2"></i>+ 01 234 567 89</p>
            </li>
            <li>
              <p><i class="fas fa-envelope pe-2 mb-0"></i>contact@example.com</p>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">


    </div>
    <!-- Copyright -->
  </footer>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
