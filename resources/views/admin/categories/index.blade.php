@extends('layouts.admin')
@section('title','Categories')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">

        @include('includes.status')
        <section class="p-5">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-header p-3">
                            <h5 style="font-size: 18px" class="float-start">Categories</h5>
                            <!-- Button trigger modal -->
                            <button class="float-end btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#createCategoryModal">Create Category
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="#createCategoryModal" tabindex="-1" aria-labelledby="#createCategoryModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="#createCategoryModalLabel">Create Category</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('categories.store')}}" method="POST" id="roleForm" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group required">
                                                    <label class="control-label" for="name">
                                                        Category</label>
                                                    <input type="text" class="form-control complete" name="name"
                                                           required>
                                                    @error('name') <span class="error">{{ $message }}</span> @enderror

                                                </div>
                                                <div class="form-group mt-3">
                                                    <label class="control-label" for="status">
                                                        Status</label>
                                                    <select class="form-select" name="status"
                                                            id="status">
                                                        <option selected
                                                                value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                    @error('status') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <div class="">
                                                        <label for="greyIcon" class="form-label">Grey Icon File</label>
                                                        <input class="form-control" type="file" id="greyIcon" name="grey-icon">
                                                    </div>
                                                    @error('grey-icon') <span class="error">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="form-group mt-3">
                                                    <div class="">
                                                        <label for="orangeIcon" class="form-label">Orange Icon File</label>
                                                        <input class="form-control" type="file" id="orangeIcon" name="orange-icon">
                                                        @error('orange-icon') <span class="error">{{ $message }}</span> @enderror
                                                        <small>Please not that the grey and orange icon must be the same size. The file
                                                        type must be transparent png</small>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" form="roleForm" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="role" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>IMAGE</th>
                                    <th>HOVER IMAGE</th>
                                    <th>POSTS</th>
                                    <th>CREATED ON</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><img src="{{asset($category->getFirstMediaUrl('grey-icon')?$category->getFirstMediaUrl('grey-icon'):'images/user.png')}}" alt="{{$category->name}}" style="height: 60px"></td>
                                        <td><img src="{{asset($category->getFirstMediaUrl('orange-icon')?$category->getFirstMediaUrl('orange-icon'):'images/user.png')}}" alt="{{$category->name}}" style="height: 60px"></td>
                                        <td>100</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false" style="cursor: pointer">Action</h5>
                                                <ul class="dropdown-menu" aria-labelledby="roleButton">
                                                    <li><a class="dropdown-item" href="{{route('categories.show',$category->slug)}}">View</a> </li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                           data-bs-target="#editModal{{$category->id}}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{route('categories.destroy',$category->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Category</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{route('categories.update',$category->id)}}"
                                                                method="POST" id="roleEdit{{$category->id}}" enctype="multipart/form-data">
                                                                @method('PATCH')
                                                                @csrf
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="name">
                                                                        Category Name:
                                                                    </label>
                                                                    <input type="text" class="form-control complete"
                                                                           name="name"
                                                                           required value="{{$category->name}}">
                                                                    @error('name') <span class="error">{{ $message }}</span> @enderror

                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <label class="control-label" for="status">
                                                                        Status</label>
                                                                    <select class="form-select" name="status"
                                                                            id="status">
                                                                        <option selected
                                                                                value="1">Active</option>
                                                                        <option value="0">Inactive</option>

                                                                    </select>
                                                                    @error('status') <span class="error">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="">
                                                                        <label for="greyIcon" class="form-label">Grey Icon File</label>
                                                                        <input class="form-control" type="file" id="greyIcon" name="grey-icon">
                                                                    </div>
                                                                    @error('grey-icon') <span class="error">{{ $message }}</span> @enderror
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <div class="">
                                                                        <label for="orangeIcon" class="form-label">Orange Icon File</label>
                                                                        <input class="form-control" type="file" id="orangeIcon" name="orange-icon">
                                                                        @error('orange-icon') <span class="error">{{ $message }}</span> @enderror
                                                                        <small>Please not that the grey and orange icon must be the same size. The file
                                                                            type must be transparent png</small>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"
                                                                    form="roleEdit{{$category->id}}">Save changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>IMAGE</th>
                                    <th>HOVER IMAGE</th>
                                    <th>POSTS</th>
                                    <th>CREATED ON</th>
                                    <th>ACTION</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#role').DataTable();
        } );
    </script>
@endsection
