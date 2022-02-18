@extends('layouts.admin')
@section('title','Section')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-11 mx-auto">
                <div class="position-relative">
                    @include('includes.status')
                    <h5>AvailableSections
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#sectionsModal">Create Section</button>
                    </h5>
                    <!-- Modal -->
                    <div class="modal fade" id="sectionsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create sections</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   <form action="{{route('sections.store')}}" method="POST" id="sectionForm">
                                       @csrf
                                       @honeypot
                                       <div class="form-group">
                                           <label class="control-label" for="section">
                                               Section Name:
                                           </label>
                                           <input type="text" name="section" id="section" class="form-control" required>
                                           @error('section') <span class="error">{{ $message }}</span> @enderror<br>
                                       </div>
                                   </form>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary" form="sectionForm">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card shadow-sm mt-5">
                    <div class="card-header p-3">
                        <h5 style="font-size: 18px">Managers<span class="float-end fw-bold">Total:
                                            {{$sections->count()}}</span></h5>
                    </div>
                    <div class="card-body">
                        <table id="table_id5" class="display">
                            <thead>
                            <tr>
                                <th>Created</th>
                                <th>Name</th>
                                <th>Total Posts</th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($sections->count()>0)
                                @foreach($sections as $section)
                                    <tr>
                                        <td>{{$section->created_at->isoFormat('MMM Do Y')}}</td>
                                        <td>{{$section->name}}</td>
                                       <td>{{$section->blogs->count()}}</td>
                                        <td>
                                            <!---remember to use auth for super admin-->
                                            <div class="dropdown">
                                                <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                                        id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    See action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="message1">
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('sections.show',$section->id)}}">
                                                            View <i class="fas fa-external-link-square-alt ms-2"></i>
                                                        </a>

                                                    </li>
                                                    @can('Edit-model')
                                                        <li><button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#sectionsEditModal{{$section->id}}">
                                                                Edit</button></li>
                                                        <li>
                                                            <form method="POST" action="{{route('sections.destroy',
                                                            $section->id)}}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn text-danger">Delete <i
                                                                        class="far fa-trash-alt ms-2"></i></button>
                                                            </form>
                                                        </li>
                                                    @endcan
                                                </ul>
                                                <div class="modal fade" id="sectionsEditModal{{$section->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Create sections</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('sections.update',$section->id)}}" method="POST" id="sectionForm{{$section->id}}">
                                                                    @method('PATCH')
                                                                    @csrf
                                                                    @honeypot
                                                                    <div class="form-group">
                                                                        <label class="control-label" for="section">
                                                                            Section Name:
                                                                        </label>
                                                                        <input type="text" name="section" id="section" class="form-control" required value="{{$section->name}}">
                                                                        @error('section') <span class="error">{{ $message }}</span> @enderror<br>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit" class="btn btn-primary" form="sectionForm{{$section->id}}">Save changes</button>
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
                            <tr>
                            <tr>
                                <th>Created</th>
                                <th>Name</th>
                                <th>Total Posts</th>
                                <th>Action </th>
                            </tr>
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
