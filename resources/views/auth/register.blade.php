@extends('layouts.auth')

@section('content')
    <section class="mt-5 pt-5">
        <div class=" mt-5">
            <div class="row">
                <div class="col-11 col-sm-9 col-md-8 col-lg-6 mx-auto register">
                    <div class="text-center">
                        <a href="#" title="Return Home">
                            <img src="{{asset('images/manu-logo.png')}}" class="img-fluid">
                        </a>
                        <h2 class="mt-3 fs-4">Please Register</h2>

                    </div>
                    <form class="m-sm-5" method="POST" action="{{ route('register') }}">
                        @csrf
                        @honeypot
                        <div class="form-group">
                            <label class="control-label" for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="name" class="form-control"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                                   @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="control-label" for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastname" class="form-control"
                                   value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                   @error('lastname') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="control-label" for="email">Email:</label>
                            <input type="email" id="email"  class="form-control"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">
                                   @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="control-label" for="password">Password:</label>
                            <input type="password" id="password"  class="form-control"
                                   name="password" required autocomplete="new-password">
                                   @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="control-label" for="confirmPassword">Confirm Password:</label>
                            <input type="password" id="confirmPassword"  class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
