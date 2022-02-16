<div>
    <form class="m-2 " wire:submit.prevent="userSubscribe">
        @honeypot
        <div class="form-group row">
            <div class="col-12 col-md-4 p-2">
                <input type="text" placeholder="Your Name" class="form-control" required
                wire:model="name" name="name">
                @error('name') <span class="error">{{ $message }}</span> @enderror<br>
            </div>
            <div class="col-12 col-md-4 p-2">
                <input type="email" placeholder="Your Email" class="form-control" required
                wire:model="email" name="email">
                @error('email') <span class="error">{{ $message }}</span> @enderror<br>
            </div>
            <div class="col-12 col-md-2 p-2">
                <button type="submit" class="btn btn-success">Subscribe</button>
            </div>
            @if($success)
            <p><span>{{$success}}</span></p>
            @endif
        </div>
    </form>
</div>
