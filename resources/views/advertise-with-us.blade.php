@extends('layouts.main')
@section('title','Advertise with Us')
@section('content')
    <section class="p-5 advert">
        <div class="row">
            <div class="col-12 col-md-10">
                <div class="advertise mt-5">
                    <h4 class="fw-bold fs-6">ADVERTISE WITH US</h4>
                    <h1>Let's work together towards achieving greater health and wellbeing
                        around the world</h1>
                    <p class="mt-3 fs-4">Feel free to reach us via the email <span>advertising@drmanu.com</span>.<br>
                        Our representative will contact you and share with you the details
                    </p>
                    <p class="fs-4">Read our advertising
                        <a href="{{route('advertising-policy')}}" class="text-decoration-none"><span>policy</span></a> </p>
                </div>
            </div>
        </div>

    </section>
@endsection
