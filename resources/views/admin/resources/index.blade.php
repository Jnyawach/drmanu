@extends('layouts.admin')
@section('title','Resources')
@section('content')
    <section class="p-5">
        <h3 class="fs-4 fw-bold">Based on Status</h3>
        <div class="row">
            @foreach($statuses as $status)
                <div class="col-3 p-2">

                    <div class="card">
                        <div class="card-body">
                            <h2 class="fs-4">{{$status->name}}</h2>
                            <h5>{{$status->resources->count()}}</h5>
                            <a href="{{route('resource-status',$status->id)}}" class="text-decoration-none"><span>See All<i class="fa-solid fa-right-long ms-3"></i></span></a>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

    </section>
    <section class="p-5">
        <h3 class="fs-4 fw-bold">Based on Category</h3>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-3 p-2">

                    <div class="card">
                        <div class="card-body">
                            <h2 class="fs-4">{{$category->name}}</h2>
                            <h5>{{$category->resources->count()}}</h5>
                            <a href="{{route('resource-category',$category->slug)}}" class="text-decoration-none"><span>See All<i class="fa-solid fa-right-long ms-3"></i></span></a>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </section>
@endsection
