@extends('layouts.admin')
@section('title','Create Post')
@section('styles')
    @livewireStyles

@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-4">Create Blog Post</h2>
                <hr>
                @livewire('blog-post',['categories'=>$categories])
            </div>

        </div>

    </section>
@endsection
@section('scripts')

    @livewirescripts
@endsection

