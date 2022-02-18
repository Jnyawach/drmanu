<div>
    <div wire:ignore.self class="modal fade" id="secondModal" tabindex="-1" aria-labelledby="secondModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-4" id="secondModalLabel">How can we improve the article?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="p-5" wire:submit.prevent="createReview">
                        <input type="hidden" name="review" value="0" wire:model="review">
                        <input type="hidden" name="postId" value="{{$post->id}}" wire:model="postId">
                        <div class="form-group">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingComment" name="comment" wire:model.lazy="comment"></textarea>
                                <label for="floatingComment">Please tell us what was the problem with this article</label>
                            </div>
                            @error('comment') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group row mt-5">
                            <div class="col-12 col-md-6 p-2">
                                <input type="text"  class="form-control" placeholder="Your Name (optional)" name="name" wire:model.lazy="name">
                                @error('name') <span class="error">{{ $message }}</span> @enderror<br>
                            </div>
                            <div class="col-12 col-md-6 p-2">
                                <input type="email"  class="form-control" placeholder="Your Email (optional)" name="email" wire:model.lazy="email">
                                @error('email') <span class="error">{{ $message }}</span> @enderror<br>
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <div class="mt-2">
                                @if($success)
                                    <p class="text-success">{{$success}}</p>
                                @endif
                            </div>
                            <div class="mt-3">
                                <small>We value you <a href="{{route('privacy_policy.index')}}" title="Privacy policy">privacy</a> </small>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
