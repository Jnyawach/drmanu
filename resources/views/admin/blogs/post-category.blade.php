@extends('layouts.admin')
@section('title',$category->name)
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                <h2 class="fs-4">Category: {{$category->name}}({{$category->blogs->count()}}Posts)</h2>
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
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($category->blogs->count()>0)
                                @foreach($category->blogs as $blog)
                                    <tr>
                                        <td>{{$blog->id}}</td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->created_at->isoFormat('MMM Do Y')}}</td>
                                        <td>{{$blog->status->name}}</td>
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
                                                    @endcan
                                                </ul>
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
                            <th>Status</th>
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
