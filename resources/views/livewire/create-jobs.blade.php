<div>
    <form wire:submit.prevent="createJob">
        <div class="form-group row mt-3">
            <div class="col-12 col-md-6">
                <label for="status" class="control-label">Job Status:</label>
                <select class="form-select" name="select" wire:model="status" required>
                    <option selected value="">Select Status</option>
                    <option value="0">In-active</option>
                    <option value="1">Active</option>

                </select>
                @error('status') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Active: means the post will be visible on the front website</small>
            </div>
            <div class="col-12 col-md-6">
                <label for="deadline" class="control-label">Deadline:</label>
                <input type="date" class="form-control" wire:model="deadline" name="deadline" required>
                @error('deadline') <span class="error">{{ $message }}</span> @enderror<br>
                <small>The date for the end of application period</small>
            </div>

        </div>
        <div class="form-group mt-3">
            <label for="title" class="control-label">
               Job Title:
            </label>
            <input type="text" name="title" wire:model="title" id="title" required
                   class="form-control">
            @error('title') <span class="error">{{ $message }}</span> @enderror<br>
            <small>Should not exceed 120 Characters.</small>
        </div>
        <div  class="form-group mt-3">

            <div wire:ignore class="form-group mt-3 ">
                <label for="description" class="control-label">Description:</label>
                <div
                    class="form-textarea w-full"
                    x-data
                    x-init="
                         ClassicEditor.create($refs.myIdentifierHere)
                        .then( function(editor){
                            editor.model.document.on('change:data', () => {
                               $dispatch('input', editor.getData())
                            })
                        })
                        .catch( error => {
                            console.error( error );
                        } );
                    "
                    wire:ignore
                    wire:key="myIdentifierHere"
                    x-ref="myIdentifierHere"
                    wire:model.debounce.9999999ms="description"
                >{!! $description !!}</div>
                @error('description') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Should contain at least one Keyword in the first 150 words</small>
            </div>

        </div>
        <div class="form-group mt-3">
            <button class="btn btn-primary" type="submit">Publish Job</button>
        </div>
        <div class="mt-2">
            @if($success)
                <p class="text-success">{{$success}}</p>
                <a href="{{route('jobs.index')}}" class="btn btn-link">
                    Return Home
                </a>
            @endif
        </div>
    </form>
    <script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
</div>
