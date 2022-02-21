@extends('layouts.main')
@section('title','Advertising Policy')
@section('content')
    <section class="p-5">
        <h4 class="fw-bold">Active Since: {{$policy->created_at->isoFormat('MMMM Do YYYY')}}</h4>
        <div>{!! $policy->text !!}</div>
    </section>
@endsection
