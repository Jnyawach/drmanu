@extends('layouts.main')
@section('title', 'About us')
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                <h1 class="fs-1">About Us</h1>
                <p class="fs-5">The journey of life is a long journey. No one deserves to walk this journey alone, everyone needs a companion.
                    Dr. Manu desires great health for everyone and that's why we join you through this long journey to empower
                    you and other millions of people to walk stronger and healthier. Our team will work tirelessly to research and
                    gather crucial health information in one place and avail it to you so that you can make an informed decision.
                    We hope that you effectively tap into these resources and learn how to stay healthier and strong through this journey.
                </p>

                <div class="mt-5">
                    <h2>Work with Us</h2>
                    <p class="fs-5">At Dr. Manu, our most valuable resource is our people.
                        A diversity of backgrounds, ideas, options, and life experiences.
                        We are open to ideas and taking risks because all this is learning and mastery.
                        Besides, it is an opportunity to be yourself and impact the lives of other millions.
                        <a href="{{route('careers.index')}}" title="Careers at Dr. Manu" class="text-decoration-none"><span> Join our team.</span></a>
                    </p>
                </div>

                <div class="mt-5">
                    <h2>Privacy Policy</h2>
                    <p class="fs-5">Dr. Manu values the privacy of its customers.
                        We develop our products with privacy topping our decision-making model.
                        Feel free to read our<a href="{{route('privacy-policy')}}" title="Privacy Policy" class="text-decoration-none">
                            <span>privacy policy.</span></a></p>
                </div>

                <div class="mt-5">
                    <h2>Terms of Use</h2>
                    <p class="fs-5">
                        Dr. Manu Website resources and contents are for informational purposes only.
                        Please note that we do not provide any medical advice, diagnosis, or
                        treatment. In case of a medical emergency consult with your physician or
                        the nearest medical facility.
                        Read more about our <a href="{{route('terms-of-use')}}" title="Terms of Use" class="text-decoration-none"><span>terms of use</span></a>
                    </p>
                </div>
                <div class="mt-5">
                    <h2>Contact Details</h2>
                    <p class="fs-5">Shii Hse. Alego Rd. Bahati Nairobi<br>
                   P.O Box 457-00100 Nairobi Kenya<br>
                    Tel. +254 717 109280<br>
                    Email; management@drmanu.com</p>
                </div>

            </div>
        </div>

    </section>
@endsection
