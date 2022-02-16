@extends('layouts.admin')
@section('title','Post News')
@section('styles')
    @livewireStyles

@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-4">Create News Post</h2>
                <hr>
                @livewire('post-news',['categories'=>$categories])
            </div>

        </div>

    </section>
@endsection
@section('scripts')

    @livewirescripts
@endsection
