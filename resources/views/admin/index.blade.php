@extends('layouts.admin')
@section('title','Dr. Manu CMS')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12 col-md-3 p-2">
                <a href="{{route('subscriptions.index')}}" title="View Subscribers" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            Subscribers
                        </h2>
                        <h4 class="fw-bold">Total: {{$subscribers->count()}}</h4>
                    </div>
                    <div class="card-footer">
                        <p class="fs-6 fw-bold">
                            Active: <span>{{$subscribers->count()}}</span>&nbsp;

                        </p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-12 col-md-3 p-2">
                <a href="{{route('users.index')}}" title="View Users" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            Users
                        </h2>
                        <h4 class="fw-bold">Total: {{$users->count()}}</h4>
                    </div>
                    <div class="card-footer">
                        <p class="fs-6 fw-bold">
                            Active: <span>{{$users->where('status',1)->count()}}</span>&nbsp;
                            Inactive: <span>{{$users->where('status',0)->count()}}</span>&nbsp;
                            Banned: <span>{{$users->where('status',2)->count()}}</span>&nbsp;
                        </p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-12 col-md-3 p-2">
                <a href="{{route('blogs.index')}}" title="View Posts" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                           Posts
                        </h2>
                        <h4 class="fw-bold">Total: {{$posts->count()}}</h4>
                    </div>
                    <div class="card-footer">
                        <p class="fs-6 fw-bold">
                            Review: <span>{{$posts->where('status_id',1)->count()}}</span>&nbsp;
                            Active: <span>{{$posts->where('status_id',2)->count()}}</span>&nbsp;
                            Inactive: <span>{{$posts->where('status_id',3)->count()}}</span>&nbsp;
                        </p>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 col-md-3 p-2">
                <a href="{{route('resources.index')}}" title="View Resources" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            Resources
                        </h2>
                        <h4 class="fw-bold">Total: {{$resources->count()}}</h4>
                    </div>
                    <div class="card-footer">
                        <p class="fs-6 fw-bold">
                            Review: <span>{{$resources->where('status_id',1)->count()}}</span>&nbsp;
                            Active: <span>{{$resources->where('status_id',2)->count()}}</span>&nbsp;
                            Inactive: <span>{{$resources->where('status_id',3)->count()}}</span>&nbsp;
                        </p>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-md-6 p-2">
                <a href="{{route('jobs.index')}}" title="Posted Jobs" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
                            Jobs
                        </h2>
                        <h4 class="fw-bold">Total: {{$jobs->count()}}</h4>
                    </div>
                    <div class="card-footer">
                        <p class="fs-6 fw-bold">
                            Active: <span>{{$jobs->where('status',1)->count()}}</span>&nbsp;
                            Closed: <span>{{$jobs->where('status',0)->count()}}</span>&nbsp;

                        </p>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-12 col-md-6 p-2">
                <a href="{{route('messages.index')}}" title="messages" class="text-decoration-none">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">
                                Messages
                            </h2>
                            <h4 class="fw-bold">Total: {{$messages->count()}}</h4>
                        </div>
                        <div class="card-footer">
                            <p class="fs-6 fw-bold">
                                Unread: <span>{{$messages->where('status',0)->count()}}</span>&nbsp;
                                No Response: <span>{{$messages->where('response',null)->count()}}</span>&nbsp;
                                Responded: <span>{{$messages->where('response',true)->count()}}</span>&nbsp;
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h2 class="fs-3">Posts awaiting Approval</h2>
                <hr>
                <div class="card">
                    <div class="card-header">
                        <h6 class="fs-5">Posts</h6>
                    </div>
                    <div class="card-body">
                        <table id="blog" class="display">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Created</th>
                                <th>Category</th>
                                <th>Created By</th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($posts->where('status_id',1)->count()>0)
                                @foreach($posts->where('status_id',1) as $blog)
                                    <tr>
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->created_at->isoFormat('MMM Do Y')}}</td>
                                        <td>{{$blog->category->name}}</td>
                                        <td>{{$blog->user->name}}</td>
                                        <td>
                                            <!---remember to use auth for super admin-->
                                            <div class="dropdown">
                                                <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                                        id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    See action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="message1">
                                                    <li><a class="dropdown-item" href="{{route('blogs.show', $blog->slug)}}">
                                                            View <i class="fas fa-external-link-square-alt ms-2"></i></a>
                                                    </li>
                                                    @can('Edit-model')
                                                        <li><a class="dropdown-item" href="{{route('blogs.edit', $blog->id)}}">
                                                                Edit <i class="fas fa-bookmark ms-2"></i></a></li>
                                                        <li>
                                                            <button type="button" class="btn btn-link text-decoration-none text-success" data-bs-toggle="modal" data-bs-target="#changeStatus{{$blog->id}}">
                                                                Change Status<i class="fa-solid fa-pen-circle ms-2"></i>
                                                            </button>

                                                        </li>
                                                    @endcan
                                                </ul>
                                                <div class="modal fade" id="changeStatus{{$blog->id}}" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="changeStatusModalLabel">Change Status</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('blog-status',$blog->id)}}" method="POST" id="statusForm{{$blog->id}}">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    <p>Changing post status will determine if it will
                                                                        be visible to readers. Only active status-post is visible to readers</p>
                                                                    <h4>Current Status: {{$blog->status->name}}</h4>
                                                                    <select class="form-select" aria-label="Select Status" required name="status_id">
                                                                        <option selected value="">Select Status</option>
                                                                        @foreach($statuses as $identity=>$status)
                                                                            <option value="{{$identity}}">{{$status}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" form="statusForm{{$blog->id}}">Save changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>



                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Created</th>
                            <th>Category</th>
                            <th>Created By</th>
                            <th>Action </th>
                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <h2 class="fs-3">Resources awaiting Approval</h2>
            <hr>
            <div class="card p-0">
                <h6 class="fs-5 card-header">Resources</h6>

                <div class="card-body">
                    <table id="resource1" class="display">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Status</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($resources->where('status_id',1)->count()>0)
                            @foreach($resources->where('status_id',1) as $resource)
                                <tr>
                                    <td>{{$resource->id}}</td>
                                    <td>{{$resource->name}}</td>
                                    <td>{{$resource->created_at->isoFormat('MMM Do Y')}}</td>
                                    <td>{{$resource->status->name}}</td>

                                    <td>
                                        <!---remember to use auth for super admin-->
                                        <div class="dropdown">
                                            <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                                    id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                                See action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="message1">
                                                <li><a class="dropdown-item" href="{{route('resources.show', $resource->slug)}}">
                                                        View <i class="fas fa-external-link-square-alt ms-2"></i></a>
                                                </li>
                                                @can('Edit-model')
                                                    <li><a class="dropdown-item" href="{{route('resources.edit', $resource->id)}}">
                                                            Edit <i class="fas fa-bookmark ms-2"></i></a></li>
                                                    <li>
                                                        <button type="button" class="btn btn-link text-decoration-none text-success" data-bs-toggle="modal" data-bs-target="#changeStatus{{$resource->id}}">
                                                            Change Status<i class="fa-solid fa-pen-circle ms-2"></i>
                                                        </button>

                                                    </li>
                                                @endcan
                                            </ul>
                                            <div class="modal fade" id="changeStatus{{$resource->id}}" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
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
                                                            <button type="submit" class="btn btn-primary" form="statusForm{{$resource->id}}">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>



                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action </th>
                        </tfoot>

                    </table>

                </div>
            </div>
        </div>



    </section>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#blog').DataTable();
            $('#resource1').DataTable();

        } );
    </script>
@endsection
