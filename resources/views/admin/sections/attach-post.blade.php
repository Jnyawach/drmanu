@extends('layouts.admin')
@section('title', $section->name)
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <h1 class="fs-4">Section: {{$section->name}}</h1>
                <hr>
                @include('includes.status')

                <!----added posts -->
                <ul class="nav mt-5 bg-light mb-4">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sections.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sections.show', $section->id)}}">Linked Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('attach-post',$section->id)}}">Add Posts</a>
                    </li>

                </ul>

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h5>Attached Posts</h5>
                            </div>

                        </div>

                    </div>
                    <div class="card-body">
                        <table id="table_id5" class="display">
                            <thead>
                            <tr>
                                <th>Created</th>
                                <th>Title</th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{$blog->created_at->isoFormat('MMM Do Y')}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>
                                        @if($section->blogs->contains($blog->id))
                                            <h6 class="text-success fs-5">Attached</h6>
                                        @else
                                        <form action="{{route('post-link',$section->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <input type="hidden" name="blog_id" value="{{$blog->id}}">

                                            <button type="submit" class="btn-sm btn-danger">
                                                link Post
                                            </button>
                                        </form>
                                        @endif
                                    </td>



                                </tr>

                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Created</th>
                                <th>Title</th>
                                <th>Action </th>
                            </tr>
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
            $('#table_id5').DataTable();
        } );
    </script>
@endsection
