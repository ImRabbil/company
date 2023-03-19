@extends('admin.admin_master')

@section('admin')
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 card">
                    {{-- <a href="{{ route('add.service') }}"> <button class="btn btn-info" style="float: right">Add
                            Services</button></a> --}}
                    <div class="card">
                        <div class="card-header  d-flex justify-content-between"> All Features List
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createService">
                                Add Feature
                            </button>
                        </div>

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">SI No</th>
                                    <th scope="col">Feature Title</th>
                                    <th scope="col">Icon Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($features as $row)
                                    <tr>
                                        <th scope="row" width="5%"> {{ $i++ }}</th>
                                        <td width="5%">{{ $row->title }}</td>
                                        <td width="5%"> {{ $row->icon_name }}</td>

                                        <td width="15%">
                                            <a href="{{ url('edit.feature', $row->id) }}" type="button" class="btn btn-info" data-toggle="modal" data-target="#EditFeature{{ $row->id }}">
                                                Edit
                                            </a>
                                            <a href="{{ url('feature/delete', $row->id) }}"
                                                onclick="return confirm('Are You sure to Delete of Select Data')"
                                                class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>


                                    {{-- edit modal is start --}}

                                 <div class="modal fade" id="EditFeature{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Feature </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form action="{{ route('update_feature',$row->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlInput1">Features Name </label>
                                                                    <input type="text" name="title"  value="{{ $row->title }}" class="form-control"
                                                                        id="exampleFormControlInput1" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="exampleFormControlInput1"> Icon Name </label>
                                                                    <input type="text" name="icon_name" value="{{ $row->icon_name }}" class="form-control"
                                                                        id="exampleFormControlInput1" required>
                                                                </div>
                    
                                                            <div class="modal-footer ">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                    
                                        </div>
                                    </div>
                                </div>
                                {{-- edit modal is end --}}


                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <br>


{{-- create Feature modal start --}}
            <div class="modal fade" id="createService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Team</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="{{ route('feature_store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1">Features Name </label>
                                                <input type="text" name="title" class="form-control"
                                                    id="exampleFormControlInput1" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1"> Icon Name </label>
                                                <input type="text" name="icon_name" class="form-control"
                                                    id="exampleFormControlInput1" required>
                                            </div>

                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- creat modal is end --}}


        </div>
    </div>
@endsection
