@extends('layouts.auth')

@section('content')
    <section class="mt-5 pt-5">
        <div class=" mt-5">
            <div class="row">
                <div class="col-11 col-sm-9 col-md-8 col-lg-6 mx-auto register">
                    <div class="text-center">
                        <a href="#" title="Return Home">
                            <img src="images/manu-logo.png" class="img-fluid">
                        </a>
                        <h2 class="mt-3 fs-4">Please Register</h2>

                    </div>
                    <form class="m-sm-5" action="{{route('login')}}" method="POST">
                        @csrf

                        <div class="form-group mt-4">
                            <label class="control-label" for="email">Email:</label>
                            <input type="email" id="email" class="form-control" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">
                                   @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label class="control-label" for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
