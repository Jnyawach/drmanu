@extends('layouts.main')
@section('title','Health-Resources')
@section('content')
    <section>
            <div class="resource-intro">
                <div class="resource-header">
                    <div class="row p-5">
                        <div class="col-11 col-md-8 pt-5 ">
                            <h2> A more robust way to access health tips...</h2>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    @livewire('health-resource',['resources'=>$resources,'categories'=>$categories])



@endsection
