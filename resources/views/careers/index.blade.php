@extends('layouts.main')
@section('title','Careers')
@section('content')
    <!--
    <section>
        <div class="row text-center starter pt-5 pb-5">
            <div class="col-12 col-md-8 col-lg-8 mx-auto pt-5 pb-5">

                <h1 class="fs-1">Love Dr. Manu?</h1>
                <h3 class="fw-bold">Guess What! You will fit right in!</h3>
                <p class="mt-4 fs-4">We’re looking for dedicated, creative people to<br>
                    join us in making Dr.Manu even better. Is that you?</p>
                <a href="#target" class="btn btn-success mt-4" title="Careers">View Openings</a>
            </div>
        </div>
        <div class="row pt-3 pb-5 ">
            <div class="col-11 col-md-8 col-lg-8 mx-auto why m-2 ">
                <h3 class="text-center fw-bold">Why work with us?</h3>
                <p class="fs-4 text-center" >At Dr. Manu, our most valuable resource is our people,
                    A diversity of background, ideas, options, and life experiences. We are
                    open to ideas and taking risks because all this is learning and mastery.
                    Besides, it is  an opportunity to be yourself and impact the lives of other
                    millions
                </p>
            </div>

        </div>

    </section>
    -->
    <section class="p-5">
        @if($careers->count()>0)
            <div class="row " id="target">

                <div class="col-8 col-md-8 col-lg-8 ">
                    <h1 class="fs-1">Current Openings</h1>
                    <p class="mt-4 fs-5">We’re looking for dedicated, creative people to
                        join us in making Dr.Manu even better. Is that you?</p>
                    <p class="fs-5 " >At Dr. Manu, our most valuable resource is our people,
                        A diversity of background, ideas, options, and life experiences. We are
                        open to ideas and taking risks because all this is learning and mastery.
                        Besides, it is  an opportunity to be yourself and impact the lives of other
                        millions
                    </p>
                    @foreach($careers as $index=>$career)
                        <div >
                            <a href="{{route('careers.show', $career->slug)}}" class="btn btn-link text-decoration-none" title="{{$career->title}}"> {{$index+1}}.&nbsp;&nbsp;{{$career->title}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <h2>There are no openings currently!</h2>
        @endif
    </section>
    <section class="team">
        <img src="{{asset('images/nairobi-skyline.png')}}" class="img-fluid">
        <div class="row pt-5 pb-5">

            <div class="col-11 col-md-5 col-lg-5 mx-auto ">
                <h2 class="text-center fs-1">Work as a team in Nairobi</h2>
            </div>
            <div class="col-11 col-md-5 col-lg-5 mx-auto">

                <p class="text-justify">Team Dr. Manu is only just over a ten people — still a
                    tight-knit group, considering everything that’s happened so far.
                    Every day brings new challenges, and every day we work together to meet them.
                    (We also have plenty of fun together: hack days, happy hours,
                    trips, workshops, movies, lunches, and a lot of laughing.)</p>

            </div>
        </div>
    </section>

@endsection
