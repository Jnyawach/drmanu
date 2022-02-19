@extends('layouts.admin')
@section('title',$resource->name)
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{route('resources.edit',$resource->id)}}" class="btn btn-link text-decoration-none">Edit</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link text-decoration-none">
                            Status: <span>{{$resource->status->name}}</span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link text-decoration-none">
                            Category: <span>{{$resource->category->name}}</span>
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
                                            <form action="{{route('resources.update',$resource->id)}}" method="POST" id="statusForm{{$resource->id}}">
                                                @method('PATCH')
                                                @csrf
                                                <p>Changing post status will determine if it will
                                                    be visible to readers. Only active status-post is visible to readers</p>
                                                <h4>Current Status: {{$resource->status->name}}</h4>
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
                <div class="mt-3">
                    <img src="{{asset($resource->getFirstMediaUrl('cover')? $resource->getFirstMediaUrl('cover'):'/images/no-image.png' )}}"
                         class="img-fluid mb-3">
                </div>
                <h2>{{$resource->name}}</h2>
                <h6 class="fs-5">Category: {{$resource->category->name}}</h6>
                <div>{!! $resource->description !!}</div>
                @if($resource->link)
                   <div>
                       <a href="{{$resource->link}}" title="{{$resource->name}}" class="btn btn-link" target="_blank">
                           Follow the link to view
                       </a>
                   </div>
                @endif
                @if($resource->getFirstMediaUrl('resourceFile'))
                    <a class="btn btn-link text-success" role="button" href="{{$resource->getFirstMediaUrl('resourceFile')}}"
                       download="{{$resource->getFirstMedia('resourceFile')->name}}">
                        Download Resource
                    </a>
                @endif
            </div>
        </div>
    </section>
@endsection
