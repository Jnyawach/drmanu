@extends('layouts.main')
@section('title',$resource->title)
@section('content')
    <section class="p-3 p-lg-5">
        <div class="row">
            <div class="col-10">
                <div class="mt-3">
                    <img src="{{asset($resource->getFirstMediaUrl('cover')? $resource->getFirstMediaUrl('cover'):'/images/no-image.png' )}}"
                         class="img-fluid mb-3 curved" alt="{{$resource->name}}" title="{{$resource->name}}">
                </div>
                <h2>{{$resource->name}}</h2>
                <h6 class="fs-5">Category: {{$resource->category->name}}</h6>
                <div>{!! $resource->description !!}</div>
                @if($resource->link)
                    <div>
                        <a href="{{$resource->link}}" title="{{$resource->name}}" class="btn btn-link" target="_blank">
                            Follow the link to view
                        </a>
                    </div>
                @endif
                @if($resource->getFirstMediaUrl('resourceFile'))
                    <a class="btn btn-link text-success" role="button" href="{{$resource->getFirstMediaUrl('resourceFile')}}"
                       download="{{$resource->getFirstMedia('resourceFile')->name}}">
                        Download Resource
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection
