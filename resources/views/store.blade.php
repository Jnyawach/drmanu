<div class="form-group row mt-3">
    <div class="col-12 col-md-6">
        <label for="category" class="control-label">Category:</label>
        <select class="form-select" name="select" wire:model="category" required>
            <option selected value="">Select Category</option>
            @foreach($categories as $identity=>$category)
                <option value="{{$identity}}">{{$category}}</option>
            @endforeach
        </select>
        @error('category') <span class="error">{{ $message }}</span> @enderror<br>
        <small>Select the category which the post belongs</small>
    </div>

</div>
