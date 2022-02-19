<div>
    <header>
        <section class="pt-3 text-center big-menu">
            <a href="/" class="text-center ">
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
                                                <h3 class="fw-bold">Featured</h3>
                                                <ul class="nav featured flex-column">
                                                    @foreach($categories as $category)
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{route('explore.show',$category->slug)}}" title="{{$category->name}}">{{$category->name}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-md-8">
                                                <h3 class="fw-bold">Recent form the Doctor's Journal</h3>
                                                <a href="{{route('articles.show',$post->slug)}}" title="{{$post->title}}" class="text-decoration-none">
                                                <div class="row p-3 pt-4">
                                                    <div class="col-md-4">
                                                        <div class="">
                                                            <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png')}}" alt="{{$post->imageAlt}}"
                                                                     class="img-fluid curved mb-3" title="{{$post->imageTitle}}">
                                                            </div>

                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6 class="fs-4 fw-bold">{{$post->title}}</h6>
                                                        <p class="fs-5 fw-bold">{{$post->summary}}<span>...[more]</span></p>
                                                    </div>

                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!--
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
                            -->
                            <li class="nav-item me-4">
                                <a class="nav-link" href="{{route('resources.index')}}" id="resources" title="Health Resources">
                                    RESOURCES
                                </a>
                            </li>
                            <li class="nav-item me-4">
                                <a class="nav-link" href="{{route('newsletter.index')}}" id="subscribe" title="Subscribe to Our Newsletter">
                                    SUBSCRIBE
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
                                                            <input type="search" class="form-control" id="autoSizingInputGroup" placeholder="Search Dr. Manu">
                                                            <div class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row mt-3 mb-5">
                                            <div class="col-8 mx-auto text-center mb-5">


                                                    @foreach($categories as $category)
                                                        <a href="{{route('explore.show',$category->slug)}}" title="{{$category->name}}" class="btn btn-outline-secondary m-1">
                                                            #{{$category->name}}</a>
                                                    @endforeach



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
                                <img src="{{asset('images/manu-logo.png')}}" alt="Dr. Manu logo" style="width:120px">
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav flex-column">
                                @foreach($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('explore.show',$category->slug)}}" title="{{$category->name}}">
                                        {{$category->name}}<i class="fa-solid fa-chevron-right float-end"></i></a>
                                </li>
                                @endforeach
                                <li class="dropdown-divider"><hr></li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('resources.index')}}" title="Health Resources">
                                        <i class="fa-solid fa-book-open me-3"></i>RESOURCES</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('newsletter.index')}}" title="Subscribe to our Newsletter">
                                        <i class="fa-solid fa-envelope-open-text me-3"></i>SUBSCRIBE</a>
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
                                        @foreach($categories as $category)
                                        <a href="{{route('explore.show',$category->slug)}}" class="btn btn-outline-secondary m-1">#{{$category->name}}</a>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="row mt-3 mb-5">
                                    <div class="col-11 mx-automb-5">
                                        <div>

                                            <a href="{{route('articles.show',$post->slug)}}" title="Read More" class="text-decoration-none">
                                                <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png')}}" alt="{{$post->imageAlt}}"
                                                     class="img-fluid curved mb-3" title="{{$post->imageTitle}}">
                                                <h1>{{$post->title}}</h1>
                                                <p class="fw-bold">{{$post->summary}}<span>.. [Read More]</span></p>
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
</div>
