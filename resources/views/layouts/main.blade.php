<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dr. Manu:@yield('title')</title>
    <link rel = "icon" href =
    "{{asset('images/Manu-icon-01.jpg')}}"
          type = "image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css/awesome/css/all.css')}}" rel="stylesheet">
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
</head>
<body>
<header>
    <section class="pt-3 text-center big-menu">
        <a href="" class="text-center ">
            <img src="{{asset('images/manu-logo.png')}}" class="img-fluid" alt="Dr. Manu Logo" style="height: 60px">
        </a>
        <nav class="navbar navbar-expand-sm menu">
            <div class="container-fluid">
                <div class="navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto explore">
                        <li class="nav-item dropdown full-dropdown me-4">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                EXPLORE <i class="fas fa-angle-down ms-2"></i>
                            </a>
                            <div class="dropdown-menu full-dropdown-content" aria-labelledby="navbarDropdown">
                                <div class="ms-5 mt-3 ">

                                    <div class="row ">
                                        <div class="col-md-4">
                                            <h3>Featured</h3>
                                            <ul class="nav featured flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Nutrition</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Fitness</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Sexual health</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link">Sleep</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link">Mental health</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-8">
                                            <h3>Recent form the Doctor's Journal</h3>
                                            <div class="row p-3">
                                                <div class="col-md-4">
                                                    <a href="#" title="Post" class="text-decoration-none">
                                                        <div class="">
                                                            <img src="images/sick-child-in-bed-runny-nose-732x549-thumbnail.jpg" alt="sick child"
                                                                 class="img-fluid curved mb-3">
                                                            <h6 class="fs-5 fw-normal">Picking the Right Cold Medication by Your Symptoms<span>...[more]</span></h6>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="#" title="Post" class="text-decoration-none">
                                                        <div class="">
                                                            <img src="images/Woman-Sitting-on-Her-Bed-and-Drinking-Tea-thumbnail.jpg" alt="sick child"
                                                                 class="img-fluid curved mb-3">
                                                            <h6 class="fs-5 fw-normal">How to Calculate When You Should Go to Sleep<span>...[more]</span></h6>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-md-4">
                                                    <a href="#" title="Post" class="text-decoration-none">
                                                        <div class="">
                                                            <img src="images/females-marching-protest-732-549-feature-thumb.jpg" alt="sick child"
                                                                 class="img-fluid curved mb-3">
                                                            <h6 class="fs-5 fw-normal"> 8 Empowered Ecofeminists Fighting for Justice<span>...[more]</span></h6>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown full-dropdown me-4">
                            <a class="nav-link" href="#" id="newsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                NEWS <i class="fas fa-angle-down ms-2"></i>
                            </a>
                            <div class="dropdown-menu full-dropdown-content" aria-labelledby="newsDropdown">
                                <div class="news">
                                    <div class="row p-5">
                                        <div class="col-md-3 mx-auto">
                                            <div>
                                                <a href="#" title="#" class="text-decoration-none">
                                                    <img src="images/vaccination-g61f02f055_640.jpg" class="img-fluid curved mb-2" alt="#">
                                                    <h6 class="fs-5 fw-normal">Why Omicron is SARS-CoV-2’s biggest ‘evolutionary leap’ yet<span>...[more]</span></h6>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mx-auto">
                                            <div>
                                                <a href="#" title="#" class="text-decoration-none">
                                                    <img src="images/vaccine-g9286d6a2a_640.jpg" class="img-fluid curved mb-2" alt="#">
                                                    <h6 class="fs-5 fw-normal"> COVID-19 vaccine combined with infection provides 'super immunity'<span>...[more]</span></h6>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mx-auto">
                                            <div>
                                                <a href="#" title="#" class="text-decoration-none">
                                                    <img src="images/face-mask-g9ebb9151f_640.jpg" class="img-fluid curved mb-2" alt="#">
                                                    <h6 class="fs-5 fw-normal"> Blood transfusions: Getting to the heart of the matter<span>...[more]</span></h6>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mx-auto">
                                            <div>
                                                <a href="#" title="#" class="text-decoration-none">
                                                    <img src="images/protective-suit-g6cca1e4d8_640.jpg" class="img-fluid curved mb-2" alt="#">
                                                    <h6 class="fs-5 fw-normal">Omicron survives longer on plastic surfaces and skin<span>...[more]</span></h6>
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                    <a href="#" title="Read More" class="btn btn-outline-secondary ms-5 mb-5">
                                        Discover All <i class="fa-solid fa-arrow-right-long ms-5"></i>

                                    </a>
                                </div>

                            </div>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#" id="subscribe">
                                SUBSCRIBE
                            </a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#" id="resources">
                                RESOURCES
                            </a>
                        </li>
                        <li class="nav-item dropdown full-dropdown me-4">
                            <a class="nav-link" href="#" id="searchDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <div class="dropdown-menu full-dropdown-content" aria-labelledby="newsDropdown">
                                <div class="search mt-5">
                                    <div class="row">
                                        <div class="col-6 mx-auto">
                                            <form class="mt-5 form-inline">
                                                <div class="col-auto">
                                                    <label class="visually-hidden" for="autoSizingInputGroup">Search Dr. Manu</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Search Dr. Manu">
                                                        <div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-5">
                                        <div class="col-8 mx-auto text-center mb-5">
                                            <a href="#" class="btn btn-outline-secondary m-1">#Nutrition</a>
                                            <a href="#" class="btn btn-outline-secondary m-1">#Fitness</a>
                                            <a href="#" class="btn btn-outline-secondary m-1">#Sexual Health</a>
                                            <a href="#" class="btn btn-outline-secondary m-1">#Sleep</a>
                                            <a href="#" class="btn btn-outline-secondary m-1">#Mental Health</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>

    </section>
    <section class="small-screen pt-4 ps-2 pb-4">
        <div class="row">
            <div class="col-6">
                <img src="{{asset('images/manu-logo-white.png')}}" alt="Dr. Manu logo" style="width:140px">
            </div>
            <div class="col-6 text-end pe-4">

                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <button class="btn btn-link" type="button" data-bs-toggle="modal" data-bs-target="#searchMenu">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-link" type="button" data-bs-toggle="modal" data-bs-target="#smallMenu">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                    </li>



                </ul>
            </div>
        </div>
        <!--Small Menu Modal-->
        <div class="modal fade" id="smallMenu" tabindex="-1" aria-labelledby="smallMenuLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <img src="images/manu-logo.png" alt="Dr. Manu logo" style="width:120px">
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Nutrition<i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Fitness<i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sexual Health<i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="#">Sleeping<i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Mental Health<i class="fa-solid fa-chevron-right float-end"></i></a>
                            </li>
                            <li class="dropdown-divider"><hr></li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa-solid fa-square-rss me-3"></i>NEWS</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa-solid fa-envelope-open-text me-3"></i>SUBSCRIBE</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!--End of Small Menu Modal-->
        <!--Search Modal-->
        <div class="modal fade" id="searchMenu" tabindex="-1" aria-labelledby="searchMenuLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="searchMenuLabel">Search Dr. Manu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="search mt-5">
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <form class="mt-5 form-inline">
                                        <div class="col-auto">
                                            <label class="visually-hidden" for="searchingGroup">Search Dr. Manu</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="searchingGroup" placeholder="Search Dr. Manu">
                                                <div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-11 mx-auto text-center mb-5">
                                    <a href="#" class="btn btn-outline-secondary m-1">#Nutrition</a>
                                    <a href="#" class="btn btn-outline-secondary m-1">#Fitness</a>
                                    <a href="#" class="btn btn-outline-secondary m-1">#Sexual Health</a>
                                    <a href="#" class="btn btn-outline-secondary m-1">#Sleep</a>
                                    <a href="#" class="btn btn-outline-secondary m-1">#Mental Health</a>
                                </div>
                            </div>
                            <div class="row mt-3 mb-5">
                                <div class="col-11 mx-automb-5">
                                    <div>
                                        <a href="#" title="Read More" class="text-decoration-none">
                                            <h4>Picking the Right Cold Medication by Your Symptoms.</h4>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and<span>.. [Read More]</span></p>
                                        </a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</header>
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
                    <a class="nav-link" href="{{route('contact.index')}}">Contact Us</a>
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
@yield('scripts')
</body>
</html>
