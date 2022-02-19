@extends('layouts.admin')
@section('title','Create Resource')
@section('styles')
    @livewireStyles
@endsection
@section('content')
    <section class="p-5">
        @livewire('create-resource',['categories'=>$categories])
    </section>
@endsection
@section('scripts')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
