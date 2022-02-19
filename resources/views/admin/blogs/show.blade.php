@extends('layouts.admin')
@section('title',$post->title);
@section('content')
    <section>
        <div class="row">
            <div class="col-11 mx-auto">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{route('blogs.edit',$post->id)}}" class="btn btn-link text-decoration-none">Edit</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link text-decoration-none">
                            Status: <span>{{$post->status->name}}</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link text-decoration-none">
                            Category: <span>{{$post->category->name}}</span>
                        </button>
                    </li>
                    @can('Edit-model')
                        <li class="nav-item">
                            <button type="button" class="btn btn-link text-decoration-none text-success" data-bs-toggle="modal" data-bs-target="#changeStatus">
                                Change Status<i class="fa-solid fa-pen-circle ms-2"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="changeStatusModalLabel">Change Status</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <form action="{{route('blog-status',$post->id)}}" method="POST" id="statusForm">
                                               @method('PATCH')
                                               @csrf
                                               <p>Changing post status will determine if it will
                                               be visible to readers. Only active status-post is visible to readers</p>
                                               <select class="form-select" aria-label="Select Status" required name="status_id">
                                                   <option selected value="">Select Status</option>
                                                   @foreach($statuses as $identity=>$status)
                                                       <option value="{{$identity}}">{{$status}}</option>
                                                   @endforeach

                                               </select>
                                           </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" form="statusForm">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endcan
                </ul>
                <hr>
                <h1>{{$post->title}}</h1>
                <div class="hero">
                    <div>
                    <img src="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard'):'/images/no-image.png' )}}"
                         class="img-fluid mb-3">
                    </div>
                    <small>Image credit: {{$post->imageCredit}}</small>
                    <p class="fw-bold">By: <span>{{$post->user->name}} {{$post->user->lastname}}</span> on {{$post->created_at->diffForHumans()}}</p>
                    <p class="fw-bold">Tags: <span>{{$post->tags}}</span></p>
                    <div class="summary">
                        <p class="p-0 m-0 fst-italic">{{$post->summary}}</p>
                    </div>
                    <p>{!! $post->content !!}</p>

                </div>
            </div>
        </div>
    </section>
    <section class="reviews p-5">
        <h2>Article Reviews</h2>
        <div class="row">
            @foreach($reviews as $review)
            <div class="col-11">
                @if($review->review==1)
               <h4>Yes: Helpful</h4>
                @else
                   <h4 class="text-danger"> No: Not Helpful</h4>
                @endif
                    <p><span>Name:</span> {{$review->name}}</p>
                    <p><span>Email:</span> {{$review->email}}</p>
                <p>{{$review->comment}}</p>
                <hr>
            </div>
            @endforeach
        </div>
        <div>
            {{$reviews->links('vendor.pagination.custom-pagination-links-view')}}
        </div>

    </section>
@endsection
