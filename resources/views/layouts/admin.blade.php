<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "icon" href =
    "{{asset('images/Manu-icon-01.jpg')}}"
          type = "image/x-icon">
    <title>Dr. Manu:@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/awesome/css/all.css')}}" rel="stylesheet">
    @yield('styles')
    @livewireStyles
</head>
<body class="admin">
<header class="p-5">
    <div class="row">
        <div class="col-4">

            <button class="btn btn-link fs-5 text-decoration-none ps-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideBar" aria-controls="sideBar">
                <span><i class="fa-solid fa-bars me-2"></i></span>MENU
            </button>

            <h3><span class="d-none d-sm-block fw-bold fs-6"> Dr. Manu CMS</span></h3>


        </div>
        <div class="col-8">
            <ul class="nav justify-content-end admin-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"><i class="far fa-envelope"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-bell"></i></a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle text-uppercase text-decoration-none" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{route('profile.index')}}">My Profile</a></li>
                            <li><hr class="dropdown-divider"> </li>
                            <li><a class="dropdown-item" href="#">Messages</a></li>
                            <li><hr class="dropdown-divider"> </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>


</header>
<!---------------------------Sidebar------------>
<div class="offcanvas offcanvas-start sidebar" data-bs-scroll="true" tabindex="-1" id="sideBar" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
        <button type="button" class="text-reset close" data-bs-dismiss="offcanvas" aria-label="Close" style="color: white; background: none !important;
    border: none !important; font-size: 28px">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion accordion-flush admin-sidebar " id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <i class="far fa-user me-3"></i>Users
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">

                            <li><a href="{{route('users.index')}}" title="Admins">Users</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="fas fa-user-lock me-3"></i>Roles & Permission
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="{{route('roles.index')}}" title="Admins">Create Roles & Permission</a> </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                        <i class="fas fa-code-branch me-2"></i>Categories
                    </button>
                </h2>
                <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-collapseSeven" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="{{route('categories.index')}}" title="Admins">Create Categories</a> </li>

                        </ul>

                    </div>
                </div>

            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        <i class="fa-regular fa-envelope me-3"></i>Messages
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="{{route('messages.index')}}" title="Admins">Inbox</a> </li>

                        </ul>
                    </div>
                </div>

            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        <i class="far fa-file-alt me-2"></i>Policies
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-collapseFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="{{route('policies.index')}}" title="Admins">Policies</a> </li>

                        </ul>
                        <ul class="list-unstyled folders">
                            <li><a href="{{route('policies.create')}}" title="Admins">Create Policy</a> </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                        <i class="fa-solid fa-users me-2"></i>Subscriptions
                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-collapseSix" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="{{route('subscriptions.index')}}" title="Admins">Subscribers</a> </li>

                        </ul>

                    </div>
                </div>

            </div>


            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingNine">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
                        <i class="fas fa-blog me-2"></i>Blog
                    </button>
                </h2>
                <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-collapseNine" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="#" title="Admins">Manage Blog</a> </li>


                        </ul>
                        <ul class="list-unstyled folders">
                            <li><a href="#" title="Admins">Create Posts</a> </li>

                        </ul>

                    </div>
                </div>

            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTen">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen">
                        <i class="fas fa-money-check-alt me-2"></i>Promotions
                    </button>
                </h2>
                <div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-collapseTen" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="#" title="Admins">View Promotions</a> </li>

                        </ul>
                        <ul class="list-unstyled folders">
                            <li><a href="#" title="Admins">Create Promotions</a> </li>

                        </ul>

                    </div>
                </div>

            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingEleven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEleven" aria-expanded="false"
                            aria-controls="flush-collapseEleven">
                        <i class="fab fa-sketch me-2"></i>Interface
                    </button>
                </h2>
                <div id="flush-collapseEleven" class="accordion-collapse collapse" aria-labelledby="flush-collapseEleven" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="#" title="Admins">Design Interface</a> </li>

                        </ul>


                    </div>
                </div>

            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwelve">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwelve" aria-expanded="false"
                            aria-controls="flush-collapseTwelve">
                        <i class="fas fa-gift me-2"></i>Coupon
                    </button>
                </h2>
                <div id="flush-collapseTwelve" class="accordion-collapse collapse" aria-labelledby="flush-collapseTwelve" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul class="list-unstyled folders">
                            <li><a href="#" title="Admins">Create & Manage Coupon</a> </li>

                        </ul>


                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
<!----------------------End of sidebar----------------->
<main>
    @yield('content')
</main>

<footer class="p-5">
    <div class="row">
        <div class="col-11 col-md-6 mx-auto">
            <div class="row">
                <div class="col-6 col-md-4">
                    <a href="#" title="Dr. Manu">
                        <img src="{{asset('images/manu-logo-white.png')}}" class="img-fluid" style="width: 150px">
                    </a>
                </div>
                <div class="col-6">
                    <div class="social">
                        <a href="#" title="Facebook" class="m-2"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" title="Instagram" class="m-2"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" title="Instagram" class="m-2"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" title="Instagram" class="m-2"><i class="fa-brands fa-pinterest-p"></i></a>
                    </div>
                </div>
            </div>
            <p class="mt-4">Subscribe to get expert health news, report, tips, recommendations, and reviews</p>
            <form class="m-2 ">
                <div class="form-group row">
                    <div class="col-12 col-md-4 p-2">
                        <input type="text" placeholder="Your Name" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-4 p-2">
                        <input type="email" placeholder="Your Email" class="form-control" required>
                    </div>
                    <div class="col-12 col-md-2 p-2">
                        <button type="submit" class="btn btn-success">Subscribe</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-11 col-md-3 mx-auto">
            <ul class="nav flex-column footer-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Terms and Conditions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Careers</a>
                </li>
            </ul>
        </div>
        <div class="col-11 col-md-3 mx-auto">
            <ul class="nav flex-column footer-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Advertising Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Advertise with us</a>
                </li>

            </ul>

            <p>Dr. Manu Website resources and contents are for informational purposes only.
                Please note that we do not provide any medical advice, diagnosis, or treatment. In case of a
                medical emergency consult with your physician or the nearest medical facility.</p>

        </div>

    </div>

</footer>
<div class="copy">
    <p class="p-3">&copy; 2022 Dr. Manu is a Cerve Ltd Company. All rights reserved.</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@yield('scripts')
@livewireScripts
</body>
</html>

