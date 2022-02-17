@extends('layouts.admin')
@section('title',$status->name)
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-4">Status: {{$status->name}}<span>({{$status->blogs->count()}}Posts)</span></h2>
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
                            @if($status->blogs->count()>0)
                                @foreach($status->blogs as $blog)
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
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#blog').DataTable();

        } );
    </script>
@endsection

