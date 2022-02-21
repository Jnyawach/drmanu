@extends('layouts.admin')
@section('title','Open Positions at Dr. Manu')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <h2>Posted Jobs</h2>
        <hr>
        @include('includes.status')
        <div class="card shadow-sm">
            <div class="card-header p-3">
                <h5 style="font-size: 18px">Users<span class="float-end fw-bold">Total:
                                            {{$jobs->count()}}</span></h5>
            </div>
            <div class="card-body">
                <table id="job" class="display">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Posted On</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($jobs->count()>0)
                        @foreach($jobs as $job)
                            <tr>
                                <td>{{$job->id}}</td>
                                <td>{{$job->title}}</td>
                                <td>{{$job->created_at->diffForHumans()}}</td>
                                <td>{{\Carbon\Carbon::parse($job->deadline)->isoFormat('MMMM Do YYYY')}}</td>
                                <td>
                                    @if($job->status==0)
                                        <p>In-active</p>
                                    @elseif($job->status==1)
                                        <p class="text-success">Active</p>
                                    @endif
                                </td>
                                <td>
                                    <!---remember to use auth for super admin-->
                                    <div class="dropdown">
                                        <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                                id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                            See action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="message1">
                                            <li><a class="dropdown-item" href="{{route('jobs.show',
                                                        $job->slug)}}">View <i
                                                        class="fas fa-external-link-square-alt
                                                                    ms-2"></i></a></li>
                                            @can('Edit-model')
                                                <li><a class="dropdown-item" href="{{route('jobs.edit',
                                                       $job->id)}}">Edit <i
                                                            class="fas fa-bookmark ms-2"></i></a></li>

                                                <li>
                                                    <form method="POST" action="{{route('jobs.destroy',
                                                            $job->id)}}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn text-danger">Delete <i
                                                                class="far fa-trash-alt ms-2"></i></button>
                                                    </form>
                                                </li>
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
                    <th>Posted On</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Action </th>
                    </tfoot>

                </table>
            </div>
            <div class="card-footer">
                <a href="{{route('jobs.create')}}">Post Jobs</a>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#job').DataTable();

        } );
    </script>
@endsection
