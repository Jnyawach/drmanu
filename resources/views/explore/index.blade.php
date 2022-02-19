@extends('layouts.main')
@section('title','General Health, Fitness & Wellness Advice')
@section('content')
    <section class="mt-5 explore-by">
        <h1 class="text-center">Featured Topics</h1>
        <div class="row p-5">
            @foreach($categories as $category)
            <div class="col-6 col-md-4 text-center p-3">
                <div>

                        <img src="{{asset($category->getFirstMediaUrl('grey-icon'))}}" class="img-fluid mb-3" style="height: 80px"
                             onmouseover="this.src='{{asset($category->getFirstMediaUrl('orange-icon'))}}'"
                             onmouseout="this.src='{{asset($category->getFirstMediaUrl('grey-icon'))}}'">
                        <h2 class="fs-3">{{$category->name}}</h2>
                    <a href="{{route('explore.show',$category->slug)}}" class="text-decoration-none topics" title="{{$category->name}}">
                    Go to topics <i class="fa-solid fa-right-long ms-3"></i>
                    </a>
                </div>

            </div>
            @endforeach
        </div>
    </section>
@endsection
