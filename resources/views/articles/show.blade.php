@extends('layouts.main')
@section('title', $post->title)
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section>
        <!--Ads Space-->
    </section>
    <section class="post p-5">
        <div class="row mt-5">
            <div class="col-11 col-md-9 mx-auto">
                <h6 class="fw-bold fs-6 text-uppercase">{{$post->category->name}}</h6>
                <h1 class="fs-1">{{$post->title}}</h1>
                <h4 class="mb-4">{{$post->summary}}</h4>
                <div>
                    <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard'):'/images/no-image.png' )}}"
                         alt="{{$post->imageAlt}}" class="img-fluid rounded" title="{{$post->imageTitle}}">
                </div>
                <small class="fst-italic mb-4">Image Credit:{{$post->imageCredit}}</small>
                <div>{!! $post->content !!}</div>
                <div class="mt-3">
                    <div class="social" >
                        <h6 class="fs-6">Share this article:</h6>
                        <a href="#" title="Facebook" class="m-2" style="color: black"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" title="Instagram" class="m-2" style="color: black"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" title="Instagram" class="m-2" style="color: black"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" title="Instagram" class="m-2" style="color: black"><i class="fa-brands fa-pinterest-p"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-11 col-md-3 mx-auto writer position-relative">
                <div class="writer-detail">

                    <div class="row mb-4">
                        <div class="col-3 col-md-3 pt-3">
                            <img src="{{asset($post->user->getFirstMediaUrl('profile')?$post->user->getFirstMediaUrl('profile','profile-card'):'images/user.png')}}"
                                 class="img-fluid rounded-circle" alt="{{$post->user->name}}">
                        </div>
                        <div class="col-9 col-md-9">
                            <hr>
                            <h5>Written by {{$post->user->name}} {{$post->user->lastname}} on {{$post->created_at->diffForHumans()}}. <!--Reviewed by Dr. Margret
                                    Kinyanjui MBS Nairobi University--></h5>
                        </div>

                    </div>
                    <div class="review">
                        <h2 class="fs-5">Did you find this article helpful?</h2>
                        <!-- Button trigger modal -->
                        <div class="modal-launch mt-3">
                            <button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#firstModal">
                                Yes
                            </button>
                            <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal" data-bs-target="#secondModal">
                                No
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        @livewire('show-post',['post'=>$post])
        @livewire('review-article',['post'=>$post])
    </section>
    <section class="resources m-5 pt-3">
        <h1 class="text-uppercase fs-4">Resources
            <a href="{{route('resources.index')}}" class="float-end text-decoration-none" title="Explore Resources">
                <span>See All<i class="fa-solid fa-angle-right ms-1"></i></span></a></h1>
        <hr>
        <div class="row">
            <div class="col-11 col-sm-6 col-md-3 mx-auto p-2">
                <a href="#" title="download">
                    <img src="{{asset('images/HL-Fitness_Hub-600x900-Pinterest.jpg')}}" class="img-fluid rounded" alt="#">
                </a>

            </div>
            <div class="col-11 col-sm-6 col-md-3 mx-auto p-2">
                <a href="#" title="download">
                    <img src="{{asset('images/HL-Key-Art-ALTG-Heart-Health-Foundation_pinterest_600x900.jpg')}}" class="img-fluid rounded" alt="#">
                </a>

            </div>
            <div class="col-11 col-sm-6 col-md-3 mx-auto p-2">
                <a href="#" title="download">
                    <img src="{{asset('images/Managing-Your-Mental-Health-During-the-Pandemic-600x900-SPOTLIGHT.jpeg')}}" class="img-fluid rounded" alt="#">
                </a>

            </div>
            <div class="col-11 col-sm-6 col-md-3 mx-auto p-2">
                <a href="#" title="download">
                    <img src="{{asset('images/Type-2-Diabetes-600x900-Pinterest.jpg')}}" class="img-fluid rounded" alt="#">
                </a>

            </div>
        </div>
    </section>
    <section class="trending m-5 pt-3">
        <h1 class="text-uppercase fs-4">More From {{$post->category->name}}</h1>
        <hr>
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-12 col-lg-6">
                    <a href="{{route('articles.show',$post->slug)}}" class="text-decoration-none m-2">
                        <div class="row">
                            <div class="col-4 col-md-3">
                                <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard','blog-thumb'):'/images/no-image.png' )}}" class="img-fluid curved"
                                     alt="{{$post->imageAlt}}" title="{{$post->imageTitle}}">
                            </div>
                            <div class="col-8">
                                <h2 class="fs-4">{{$post->title}}</h2>
                                <h6 class="ms-2 text-uppercase">Fitness may 6, 2021</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>

    </section>
@endsection
@section('scripts')
    @livewireScripts
@endsection
