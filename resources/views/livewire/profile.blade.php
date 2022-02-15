<div>
    <div class="picture">
        <img src="{{asset($user->getFirstMediaUrl('profile')?$user->getFirstMediaUrl('profile','profile-card'):'images/user.png')}}" alt="{{$user->name}}" style="width: 100px">
    </div>
    <form class="mt-3" wire:submit.prevent="updateProfile">
        <div class="mb-3">
            <label for="profile" class="form-label profile-change ps-3 pe-3 pt-2 pb-2">
                <i class="fa-solid fa-camera me-2"></i> Change Picture
            </label>
            <input class="form-control d-none" type="file" id="profile" name="profile" wire:model="profile">

        </div>
    </form>
    <section>
        <div class="row">
            <div class="col-12">

                <div class="detail">
                    <h2 class="fs-6">User Type: <span>Author</span></h2>
                    <h2 class="fs-6">Name: <span>{{$user->name}}&nbsp;{{$user->lastname}}</span></h2>
                    <h2 class="fs-6">Email: <span>{{$user->email}}</span></h2>
                    <h2 class="fs-6">Since: <span>{{$user->created_at->diffForHumans()}}</span></h2>
                    <h2 class="fs-6">Cellphone: <span>{{$user->cellphone?$user->cellphone:'Not available'}}</span></h2>
                    <h2 class="fs-6">Title: <span>{{$user->bio?$user->bio->title:'Not available'}}</span></h2>
                    <h2 class="fs-6">Profession: <span>{{$user->bio?$user->bio->profession:'Not Available'}}</span></h2>
                    <h2 class="fs-6"><span>About</span></h2>
                    <p>{{$user->bio?$user->bio->about:'Not Available'}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="edit-profile">
        <hr>
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit you Profile</h5>
                    </div>
                    <div class="card-body p-3">
                        <form wire:submit.prevent="updateUser">
                            <div class="form-group mt-3">
                                <label class="control-label" for="userName">First Name:</label>
                                <input type="text" class="form-control" wire:model="name" name="name" id="userName">
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label" for="lastName">Last Name:</label>
                                <input type="text" class="form-control" wire:model="lastname" name="lastname" id="lastName">
                                @error('lastname') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label" for="cellphone">Cellphone:</label>
                                <input type="text" class="form-control" wire:model="cellphone" name="cellphone" id="cellphone">
                                @error('cellphone') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label" for="title">Title:</label>
                                <input type="text" class="form-control" wire:model="title" name="title" id="title">
                                @error('title') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label" for="profession">Profession:</label>
                                <input type="text" class="form-control" wire:model="profession" name="profession" id="profession">
                                @error('profession') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="about" class="control-label">About:</label>
                                <textarea name="about" class="form-control" id="about" rows="6" wire:model="about"></textarea>
                                <small>Write a short bio about your self. A maximum of 150 words</small>
                                @error('about') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            @if($success)
                            <div class="alert alert-success mt-2">Successfully Updated.</div>
                           @endif
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Change Password</h5>
                    </div>
                    <div class="card-body p-3">
                        <form wire:submit.prevent="updatePassword">
                            <div class="form-group mt-3">
                                <label class="control-label" for="password">New Password:</label>
                                <input type="password" class="form-control" name="password" id="password" wire:model="password">
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label" for="password_confirmation">Confirm New Password:</label>
                                <input type="password" class="form-control" wire:model="password_confirmation" name="password_confirmation" id="password_confirmation">
                                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                            @if($password_updated)
                            <div class="alert alert-success mt-2">Sucessfully Updated.</div>
                           @endif
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </section>
</div>
