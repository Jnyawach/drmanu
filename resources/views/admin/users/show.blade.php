@extends('layouts.admin')
@section('title',$user->name)
@section('content')
    <section>
        <div class="row p-5">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header ">
                        <h5>User Details
                            <a href="{{route('users.edit',$user->id)}}" class="float-end text-decoration-none">Edit <i class="fas fa-pen-square ms-2"></i></a>
                        </h5>


                    </div>
                    <div class="body p-4">
                        <h3 class="card-title">{{$user->name}} {{$user->lastname}}</h3>
                        <p>Member Since: <span>{{$user->created_at->diffForHumans()}}</span></p>
                        <p>Email: <span>{{$user->email}}</span></p>
                        <p>Cellphone: <span>{{$user->cellphone}}</span></p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
