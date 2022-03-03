@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('content')
    <section class="p-5">
        <div class="row m-5">
            <div class="col-12 col-md-6 mx-auto text-center pt-5">
                <a href="/" title="Dr. Manu">
                    <img src="{{asset('images/manu-logo.png')}}">
                </a>
                <div class="error-message mt-5">
                    <h1 class="display-1 fw-bold">429</h1>
                    <p class="fs-3 fw-bold">Too Many Requests</p>
                    <a href="/" class="btn btn-primary" title="Dr. Manu">
                        Go back Home
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
