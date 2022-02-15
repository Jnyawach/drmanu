@extends('layouts.admin')
@section('title',$user->name)
@section('content')
    <section>
        <div class="row p-5">
            <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                <div class="card">
                    <div class="card-header ">
                        <h5>User Details
                            <a href="{{route('users.edit',$user->id)}}" class="float-end text-decoration-none">Edit <i class="fas fa-pen-square ms-2"></i></a>
                        </h5>


                    </div>
                    <div class="body p-4">
                        <div class="row">
                            <div class=" col-12 col-md-8">
                                <h3 class="card-title">{{$user->name}} {{$user->lastname}}</h3>
                                <p>Member Since: <span>{{$user->created_at->diffForHumans()}}</span></p>
                                <p>Email: <span>{{$user->email}}</span></p>
                                <p>Cellphone: <span>{{$user->cellphone}}</span></p>
                                <p>Title: <span>{{$user->bio->title}}</span></p>
                                <p>Profession: <span>{{$user->bio->profession}}</span></p>
                            </div>
                            <div class="col-4 col-md-3">
                                <div class="picture">
                                    <img src="{{asset($user->getFirstMediaUrl('profile')?$user->getFirstMediaUrl('profile','profile-card'):'images/user.png')}}" alt="{{$user->name}}" style="width: 100px">
                                </div>
                            </div>
                        </div>

                        <p><span>About:</span></p>
                        <p>{{$user->bio->about}}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
