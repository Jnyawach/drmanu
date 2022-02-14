@extends('layouts.admin')
@section('title','Edit User')
@section('content')
    <section>
        <div class="row p-5">
            <div class="col-10 mx-auto">
                <h2>Edit User</h2>
                <h5>{{$user->name}} {{$user->last_name}}</h5>
                <p><span>Role Name:</span> {{$user->getRoleNames()->first()}}</p>
                <p><span>Status:</span>
                    @if($user->status==0)
                        In-active
                    @elseif($user->status==1)
                        Active
                    @else
                        Banned
                    @endif
                </p>
                <form method="POST" action="{{route('users.update',$user->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row mt-3">
                        <div class="col-12 col-sm-6 col-md-5">
                            <label class="control-label" for="role">Change Role</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="role">
                                <option selected disabled>Change Role</option>
                                @foreach($roles as $unique=>$role)
                                    <option value="{{$unique}}">{{$role}}</option>
                                @endforeach

                            </select>
                            @error('role') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12 col-sm-6 col-md-5">
                            <label class="control-label" for="status">Status</label>
                            <select class="form-select" aria-label="Default select example" name="status" id="status">
                                <option selected value="{{$user->status}}">Edit Status</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                                <option value="2">Banned</option>
                            </select>
                            @error('status') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12 col-sm-6 col-md-5 col-lg-5">
                            <label for="name" class="control-label">First Name:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}"
                                   required>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12 col-sm-6 col-md-5 col-lg-5">
                            <label for="lastname" class="control-label">Last Name:</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" value="{{$user->lastname}}"
                                   required>
                            @error('lastname') <span class="error">{{ $message }}</span> @enderror
                        </div>


                    </div>
                    <div class="form-group row mt-3">


                        <div class="col-12 col-sm-6 col-md-5 col-lg-5">
                            <label for="cellphone" class="control-label">Cellphone:</label>
                            <input type="text" name="cellphone" class="form-control" id="cellphone" value="{{$user->cellphone}}"
                                   required>
                            @error('cellphone') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

