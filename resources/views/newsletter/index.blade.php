@extends('layouts.main')
@section('title','Newsletter')
@section('content')
    <section class="p-5">
        <h1>Subscribe to our Newsletter</h1>
        <h5 class="fs-4">Never be left out! Subscribe to get access to:</h5>
        <ul class="fs-4">
            <li>Expert Health News and reports</li>
            <li>Well researched and developed health tips</li>
            <li>Product reviews and recommendations</li>
        </ul>

       <div class="mt-3">
           @include('includes.subscriber')
       </div>

    </section>
    <section class="integrity p-5">
        <div class="row">
            <div class="col-11 col-md-6 mx-auto">
                <h2 class="fs-5">Dr. Manu</h2>
                <h1 class="fs-2">Integrity and accuracy of Information Matter to Us</h1>
                <p>At Healthline, we set high standards of quality, research, and transparency
                    for what we share, ensuring you have access to nothing but the best. Here's how:</p>
                <ul>
                    <li>To ensure accuracy, each of our 20,000+ articles is reviewed by a medical subject
                        matter expert such as a doctor, nurse, or therapist.</li>
                    <li>Our recommendations are current and based on research thanks to our diligent
                        health and medical monitoring standards</li>
                    <li>Featured brands are reviewed for medical credibility, business practices, and social impact.</li>
                </ul>
            </div>
            <div class="col-11 col-md-6 mx-auto">
                <img src="{{asset('images/lens.png')}}" class="img-fluid" alt="Dr. Manu">
            </div>
        </div>

    </section>
@endsection
