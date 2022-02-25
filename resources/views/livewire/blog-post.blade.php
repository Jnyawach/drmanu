<div>
    <div>
        <form wire:submit.prevent="createPost">
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
            <div class="form-group mt-3">

                <label for="title" class="control-label">
                    Post Title:
                </label>
                <input type="text" name="title" wire:model="title" id="title" required
                       class="form-control">
                @error('title') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Should not exceed 80 Characters.</small>
                <small>Should contain at least one Keyword For Example:
                    Antiviral drug combo may be effective against <strong>COVID-19</strong></small>
            </div>
            <div class="form-group mt-3">
                <label for="summary" class="control-label">Summary:</label>
                <textarea wire:model="summary" name="summary" id="summary" class="form-control" rows="4"></textarea>
                @error('summary') <span class="error">{{ $message }}</span> @enderror<br>
                <small>Should not exceed 500 Characters. Should be descriptive and contain Keyword</small>
            </div>
            <div class="form-group mt-3">
                <label for="summary" class="control-label">Tags:</label>
                <textarea wire:model="tags" name="tags" id="tags" class="form-control" rows="4"></textarea>
                @error('tags') <span class="error">{{ $message }}</span> @enderror<br>
                <small>A maximum of 15 tags separated by comma. Should contain Keyword</small>
            </div>
            <div  class="form-group mt-3">

                <div wire:ignore class="form-group mt-3 ">
                    <label for="content" class="control-label">Content:</label>
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
                        wire:model.debounce.9999999ms="content"
                    >{!! $content !!}</div>
                    @error('content') <span class="error">{{ $message }}</span> @enderror<br>
                    <small>Should contain at least one Keyword in the first 150 words</small>
                </div>

            </div>
            <div class="form-group mt-3 row">
                <div class="col-md-6">
                    <label for="imageCard" class="form-label">Post Image:</label>

                    <input class="form-control" type="file" id="imageCard" name="imageCard" wire:model="imageCard">
                    @error('imageCard') <span class="error">{{ $message }}</span> @enderror<br>
                    <small>Should be a banner image Size 800px by 550px </small>
                </div>
            </div>
                <div class="form-group mt-3">
                    <label for="imageAlt" class="control-label">
                        Image Alternative text:
                    </label>
                    <input type="text" name="imageAlt" wire:model="imageAlt" id="imageAlt" required
                           class="form-control">
                    @error('imageAlt') <span class="error">{{ $message }}</span> @enderror<br>
                    <small>Should not exceed 50 Characters</small>
                    <small>Should contain at least one Keyword and describe the Post Image</small>
                </div>

                <div class="form-group mt-3">
                    <label for="title" class="control-label">
                        Image Description:
                    </label>
                    <input type="text" name="imageAlt" wire:model="imageTitle" id="imageTitle" required
                           class="form-control">
                    @error('imageTitle') <span class="error">{{ $message }}</span> @enderror<br>
                    <small>Should not exceed 50 Characters </small>
                    <small>Should contain at least one Keyword and describe the
                        post</small>
                    <small>For Example How are COVID-19 deaths counted</small>
                </div>
                <div class="form-group mt-3">
                    <label for="title" class="control-label">
                        Image Credit:
                    </label>
                    <input type="text" name="imageCredit" wire:model="imageCredit" id="imageCredit" required
                           class="form-control">
                    @error('imageCredit') <span class="error">{{ $message }}</span> @enderror<br>
                    <small>Should not exceed 50 Characters </small>
                    <small>For Example Elpidio Costa Junior/Getty Images</small>
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary" type="submit">Publish for Review</button>
                </div>
                <div class="mt-2">
                    @if($success)
                        <p class="text-success">{{$success}}</p>
                        <a href="{{route('blogs.index')}}" class="btn btn-link">
                            Return Home
                        </a>
                    @endif
                </div>



        </form>
        <script src="{{asset('ckeditor5/ckeditor.js')}}"></script>

    </div>

</div>
