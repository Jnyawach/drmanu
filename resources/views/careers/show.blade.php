@extends('layouts.main')
@section('title',$career->title)
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-11">
                <h1>{{$career->title}}</h1>
                <div>{!! $career->description !!}</div>
                <p class="fs-6 fw-bold">Deadline:<span>{{\Carbon\Carbon::parse($career->deadline)->isoFormat('MMMM Do YYYY')}}</span></p>
            </div>
        </div>
    </section>
@endsection
