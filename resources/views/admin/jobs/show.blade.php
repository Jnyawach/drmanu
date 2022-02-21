@extends('layouts.admin')
@section('title',$job->title)
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12 col-md-10">
                <h1>{{$job->title}}</h1>
                <p>Deadline:<span>{{\Carbon\Carbon::parse($job->deadline)->isoFormat('MMMM Do YYYY')}}</span></p>
                <sp>Status:@if($job->status==0)
                    <span>In-active</span>
                @elseif($job->status==1)
                        <span>Active</span>
                    @endif</p>
                <div>{!! $job->description !!}</div>
                <p>Deadline:<span>{{\Carbon\Carbon::parse($job->deadline)->isoFormat('MMMM Do YYYY')}}</span></p>
            </div>
        </div>

    </section>
@endsection
