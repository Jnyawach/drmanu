@extends('layouts.main')
@section('title','General Health, Fitness & Wellness Advice')
@section('content')

        <section class="intro ">
            <div class="row mt-5">

                <div class="col-11 col-md-5 mx-auto">

                    <a href="{{route('articles.show',$intro->title)}}" title="{{$intro->title}}" class="text-decoration-none m-2">
                        <img src="{{asset($intro->getFirstMediaUrl('imageCard')? $intro->getFirstMediaUrl('imageCard','blog-thumb'):'/images/no-image.png' )}}" class="img-fluid curved mb-3"
                        alt="{{$intro->imageAlt}}" title="{{$intro->imageTitle}}">
                        <h2>{{$intro->title}}</h2>
                        <h6 class="ms-2 text-uppercase">{{$intro->category->name}}: {{$intro->created_at->diffForHumans()}}</h6>
                    </a>


                </div>

                <div class="col-11 col-md-6 mx-auto">
                    @foreach($header as $head)
                    <a href="{{route('articles.show',$head->title)}}" class="text-decoration-none m-2" title="{{$head->title}}">
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <img src="{{asset($head->getFirstMediaUrl('imageCard')? $head->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved"
                                title="{{$head->title}}" alt="{{$head->imageTitle}}">
                            </div>
                            <div class="col-8">
                                <h2 class="fs-4">{{$head->title}}</h2>
                                <h6 class="ms-2 text-uppercase">{{$head->category->name}}: {{$head->created_at->diffForHumans()}}</h6>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

        </section>
        <section class="explore-by m-5">
            <div>
                <h1 class="text-uppercase fs-4">Explore by
                    <a href="{{route('explore.index')}}" class="float-end text-decoration-none" title="Explore Categories">
                        <span>See All<i class="fa-solid fa-angle-right ms-1"></i></span></a>
                </h1>
                <hr class="">
                <div class="row mt-5 mb-5 pt-3">
                    @foreach($categories as $category)
                    <div class="col-6 col-md-3 text-center">
                        <a href="{{route('explore.show',$category->slug)}}" class="text-decoration-none" title="{{$category->name}}">
                            <img src="{{asset($category->getFirstMediaUrl('grey-icon'))}}" class="img-fluid" style="height: 80px"
                                 onmouseover="this.src='{{asset($category->getFirstMediaUrl('orange-icon'))}}'"
                                 onmouseout="this.src='{{asset($category->getFirstMediaUrl('grey-icon'))}}'">
                            <h2 class="fs-4">{{$category->name}}</h2>
                        </a>
                    </div>
                    @endforeach

                </div>

            </div>
        </section>
        <section class="trending m-5 pt-3">
            <h1 class="text-uppercase fs-4">For You</h1>
            <hr>
            <div class="row">
                @foreach($you as $post)
                <div class="col-12 col-lg-6">
                    <a href="{{route('articles.show',$post->slug)}}" class="text-decoration-none m-2">
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved"
                                alt="{{$post->imageAlt}}" title="{{$post->imageTitle}}">
                            </div>
                            <div class="col-8">
                                <h2 class="fs-4">{{$post->title}}</h2>
                                <h6 class="ms-2 text-uppercase">{{$post->category->name}} {{$post->created_at->diffForHumans()}}</h6>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
            <div class="subscribe p-5">

                <h2 class="mt-5">Never Miss a Thing...</h2>
                <p class="fs-4">Subscribe to get expert health news, report, tips, recommendations and reviews</p>
                @include('includes.subscriber')
            </div>
        </section>
        <section class="trending m-5 pt-3">
            <h1 class="text-uppercase fs-4">Most Trending</h1>
            <hr>
            <div class="row mt-5">
                @foreach($trending as $post)
                <div class="col-11 col-md-4 col-lg-3 p-2">
                    <a href="{{route('articles.show',$post->slug)}}" title="{{$post->title}}" class="text-decoration-none">
                        <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','imageCard-icon'):'/images/no-image.png' )}}" class="img-fluid curved mb-2"
                             alt="{{$post->imageAlt}}" title="{{$post->imageTitle}}">
                        <h2 class="fs-5">{{$post->title}}</h2>
                    </a>

                </div>
                @endforeach
            </div>
        </section>
        <section class="resources m-5 pt-3">
            <h1 class="text-uppercase fs-4">Resources
                <a href="{{route('health-resources.index')}}" class="float-end text-decoration-none" title="Explore Categories">
                    <span>See All<i class="fa-solid fa-angle-right ms-1"></i></span></a>
            </h1>
            <hr>
            <div class="row">
                @foreach($resources as $resource)
                <div class="col-11 col-sm-6 col-md-3 mx-auto p-2">
                    <a href="{{route('health-resources.show',$resource->slug)}}" title="{{$resource->name}}">
                        <img src="{{asset($resource->getFirstMediaUrl('cover')? $resource->getFirstMediaUrl('cover'):'/images/no-image.png' )}}" class="img-fluid curved" alt="{{$resource->name}}"
                        title="{{$resource->name}}">
                    </a>


                </div>
                @endforeach

            </div>
        </section>

        <section class="integrity p-5">
            <div class="row">
                <div class="col-11 col-md-6 mx-auto">
                    <h2 class="fs-5">Dr. Manu</h2>
                    <h1 class="fs-2">Integrity and accuracy of Information Matter to Us</h1>
                    <p>At Healthline, we set high standards of quality, research, and transparency
                        for what we share, ensuring you have access to nothing but the best. Here's how:</p>
                    <ul>
                        <li>To ensure accuracy, each of our 20,000+ articles is reviewed by a medical subject
                            matter expert such as a doctor, nurse, or therapist.</li>
                        <li>Our recommendations are current and based on research thanks to our diligent
                            health and medical monitoring standards</li>
                        <li>Featured brands are reviewed for medical credibility, business practices, and social impact.</li>
                    </ul>
                </div>
                <div class="col-11 col-md-6 mx-auto">
                    <img src="{{asset('images/lens.png')}}" class="img-fluid" alt="Dr. Manu">
                </div>
            </div>

        </section>

@endsection
