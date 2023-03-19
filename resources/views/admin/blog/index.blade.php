@extends('admin.admin_master')

@section('admin')
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 card">
                    <div class="card">
                        <div class="card-header  d-flex justify-content-between"> All Blog List
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createBLog">
                                Add Blog
                            </button>
                        </div>

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">SI No</th>
                                    <th scope="col">Blog Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($blog as $row)
                                    <tr>
                                        <th scope="row" width="%"> {{ $i++ }}</th>
                                        <td width="%">{{ $row->title }}</td>
                                        <td width="5%">{{ $row->short_description }}</td>
                                        <td width="5%">{!! $row->long_description !!}</td>

                                        <td width=""> <img src="{{ asset('image/blog/' . $row->image) }}"
                                                style="height:70px; width:100px;">
                                        </td>

                                        <td width="15%">
                                            {{-- <a href="{{ url('about/edit', $row->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('about/delete', $row->id) }}"
                                                onclick="return confirm('Are You sure to Delete of Select Data')"
                                                class="btn btn-danger">Delete</a> --}}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <br>
            <div class="modal fade" id="createBLog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create BLog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">

                                <form action="{{ route('store.blog') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"> Blog Title </label>
                                        <input type="text" name="title" class="form-control"
                                            id="exampleFormControlInput1" required>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Short Description</label>
                                            <textarea class="form-control" name="short_description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Long Description</label>
                                            <textarea id="textarea" class="form-control" name="long_description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">Blog_Image</label>
                                            <input type="file" name="image" class="form-control"
                                                id="exampleFormControlInput1" required>
                                        </div>

                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
