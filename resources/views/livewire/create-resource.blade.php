<div>
    <form wire:submit.prevent="createResource">
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
                <small>Select the category which the resource belongs</small>
            </div>

        </div>
        <div class="form-group mt-3">

            <label for="title" class="control-label">
                Resource Name:
            </label>
            <input type="text" name="name" wire:model="name" id="title" required
                   class="form-control">
            @error('name') <span class="error">{{ $message }}</span> @enderror<br>
            <small>Should not exceed 120 Characters.</small>
            <small>Should contain at least one Keyword For Example:
                Antiviral drug combo may be effective against <strong>COVID-19</strong></small>
        </div>
        <div class="form-group mt-3">

            <label for="link" class="control-label">
                Resource Link (optional):
            </label>
            <input type="text" name="link" wire:model="link" id="link" required
                   class="form-control">
            @error('link') <span class="error">{{ $message }}</span> @enderror<br>
            <small>Please provide the link if the resource is external.</small>

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
                <small>Describe what the resource contains. Should contain Keywords</small>
            </div>

        </div>
        <div class="form-group mt-3 row">
            <div class="col-md-6">
                <label for="cover" class="form-label">Resource Thumbnail:</label>

                <input class="form-control" type="file" id="cover" name="cover" wire:model="cover">
                @error('cover') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Should be a banner image Size 400px by 200px.
                This image will be the placeholder for the resource</small>
            </div>
        </div>
        <div class="form-group mt-3 row">
            <div class="col-md-6">
                <label for="resourceFile" class="form-label">Resource File (optional):</label>

                <input class="form-control" type="file" id="resourceFile" name="resourceFile" wire:model="resourceFile">
                @error('resourceFile') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Upload resource file only when the resource is internal and will be
                hosted on this server. Else attach the resource link at the link section.
                If the resource contains multiple files, please zip the files into one folder.
                Allowed files are<span> .docx .pdf .epub .mp3 .mp4 .avi .mkv .zip .ppt .pptx</span></small>
            </div>
        </div>
        <div class="form-group mt-3">
            <button class="btn btn-primary" type="submit">Publish for Review</button>
        </div>
        <div class="mt-2">
            @if($success)
                <p class="text-success">{{$success}}</p>
                <a href="{{route('resources.index')}}" class="btn btn-link">
                    Return Home
                </a>
            @endif
        </div>

    </form>
    <script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
</div>
