@extends('layouts.main')
@section('title', $category->name)
@section('content')

        <section>
            <div class="latest pt-5">
                <div class="row p-5">
                    <div class="col-11 col-md-6 mx-auto">
                        <h6 class="fw-bold fs-6 text-uppercase">Latest from {{$category->name}}</h6>
                        <a href="{{route('articles.show',$intro->slug)}}" title="{{$intro->title}}" class="text-decoration-none">
                            <h2 class="fs-1">{{$intro->title}}</h2>
                            <p class="fs-4">{{$intro->summary}}<span>...[more]</span>
                            </p>
                        </a>
                    </div>
                    <div class="col-11 col-md-5 mx-auto">
                        <a href="{{route('articles.show',$intro->slug)}}" title="{{$intro->title}}">
                            <img src="{{asset($intro->getFirstMediaUrl('imageCard')? $intro->getFirstMediaUrl('imageCard','blog-thumb'):'/images/no-image.png' )}}" class="img-fluid curved"
                            title="{{$intro->imageTitle}}" alt="{{$intro->imageAlt}}">
                        </a>

                    </div>
                </div>

            </div>
        </section>
        <section class="trending m-5 pt-3">
            <h1 class="text-uppercase fs-4">Trending Now</h1>
            <hr>
            <div class="row">
                @foreach($trending as $post)
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

        </section>
        <section class="trending m-5 pt-3">
            <h1 class="text-uppercase fs-4">Featured</h1>
            <hr>
            <div class="row">
                @foreach($featured as $post)
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

        </section>

@endsection
