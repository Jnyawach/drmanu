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
@include('includes.menu')
<main>
    @yield('content')
</main>
<footer class="p-5">
    <div class="row">
        <div class="col-10 col-md-6  mx-auto">
            <div class="row">
                <div class="col-6 col-md-4">
                    <a href="/" title="Dr. Manu">
                        <img src="{{asset('images/manu-logo-white.png')}}" class="img-fluid" style="width: 150px">
                    </a>
                </div>
                <div class="col-6">
                    <div class="social">
                        <a href="https://web.facebook.com/DrManuHealth" title="Facebook" class="m-1" target="_blank"><i class="fa-brands fa-facebook-square"></i></a>
                        <a href="https://www.linkedin.com/company/drmanu" title="linkedIn" class="m-1" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#" title="Twitter" class="m-1" target="_blank"><i class="fa-brands fa-twitter-square"></i></a>
                        <a href="https://www.pinterest.com/dr_manu" title="Pinterest" class="m-1" target="_blank"><i class="fa-brands fa-pinterest-square"></i></a>
                    </div>
                </div>
            </div>
            <p class="mt-4">Subscribe to get expert health news, report, tips, recommendations, and reviews</p>
            <div id="subscribe">
            @include('includes.subscriber')
            </div>
        </div>
        <div class="col-11 col-sm-6 col-md-3 mx-auto">
            <ul class="nav flex-column footer-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about-us')}}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('privacy-policy')}}" title="Privacy Policy">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('terms-of-use')}}" title="Terms & Conditions">Terms of Use</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('careers.index')}}">Careers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            </ul>
        </div>
        <div class="col-11 col-md-3 col-sm-6 mx-auto">
            <ul class="nav flex-column footer-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('advertising-policy')}}" title="Advertising Policy">Advertising Policy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('advertise')}}" title="Advertise with us">Advertise with us</a>
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
