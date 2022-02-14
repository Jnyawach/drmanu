@extends('layouts.admin')
@section('title', 'Profile')
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-10">
                @livewire('profile')

            </div>
        </div>

    </section>
@endsection
