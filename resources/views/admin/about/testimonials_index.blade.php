    @extends('admin.admin_master')

    @section('admin')
    <div class="container">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12 card">
            <div class="card-header d-flex justify-content-between">
                All Team About List
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#createTeam">
                    Add Team About
                </button>

            </div>
            <div class="card">


                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">SI No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($test as $row)
                            <tr>
                                <th scope="row" width="5%"> {{ $i++ }}</th>
                                <td width="5%">{{ $row->name }}</td>
                                <td width="10%">{{ $row->designation }}</td>
                                <td width="35%">{{ $row->description }}</td>

                                <td width="5%"> <img src="{{ asset('image/testimonials/' . $row->image) }}"
                                        style="height:70px; width:100px;">
                                </td>

                                    <td width="15%">
                                    {{-- <a href="{{ url('about/edit', $row->id) }}" class="btn btn-info">Edit</a> --}}

    <a href="{{ url('edit.testimonials', $row->id) }}" type="button" class="btn btn-info" data-toggle="modal" data-target="#EditTeam{{ $row->id }}">
        Edit
    </a>


                                    {{-- <a href="{{ url('about/delete', $row->id) }}"
                                        onclick="return confirm('Are You sure to Delete of Select Data')"
                                        class="btn btn-danger">Delete</a> --}}
                                </td>

                            {{-- this modal for Editteam --}}

                            <div class="modal fade" id="EditTeam{{ $row->id }}" tabindex="-1"       role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Testimonials
                                                Pages</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form action="{{ route('update_store_test',$row->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1"> Name
                                                </label>
                                                <input type="text" name="name" value="{{ $row->name }}"
                                                    class="form-control"
                                                    id="exampleFormControlInput1" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1">
                                                    Designation </label>
                                                <input type="text" name="designation" value="{{ $row->designation }}"
                                                    class="form-control"
                                                    id="exampleFormControlInput1" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleFormControlInput1">
                                                    Description </label>
                                                <input type="text" name="description" value="{{ $row->description }}"
                                                    class="form-control"
                                                    id="exampleFormControlInput1" required>
                                            </div>

                                          <div class="col-md-12">
                                                {{-- <label for="exampleFormControlInput1"
                                                    class="form-label">Image</label> --}}
                                                {{-- <input type="file" name="image" value=" {{ asset('image/testimonials/'.$row->image) }} "
                                                    class="form-control"
                                                    id="exampleFormControlInput1"  required> --}}
                                                    

                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label"> Image</label>
                                                        <input type="file" value="{{ $row->image }}" name="image"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <input type="hidden" name="old_image" value="{{ $row->image }}">
                    
                                                    <div class="form-group">
                                                        <img src={{ asset('image/testimonials/'.$row->image) }} style="height:200px;width:200px">
                                                    </div>
                                            </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save
                                                changes</button>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
                            {{-- end of the edit team modal --}}

            </tr>
        @endforeach
    </tbody> 
    </table>
    </div>
    </div>

    </div>

    {{-- create testimonials modal start here============== --}}
                    <div class="modal fade" id="createTeam" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Testimonials
                                        Pages</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <form action="{{ route('store_team_testimonials') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="exampleFormControlInput1"> Name
                                                        </label>
                                                        <input type="text" name="name"
                                                            class="form-control"
                                                            id="exampleFormControlInput1" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleFormControlInput1">
                                                            Designation </label>
                                                        <input type="text" name="designation"
                                                            class="form-control"
                                                            id="exampleFormControlInput1" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleFormControlInput1">
                                                            Description </label>
                                                        <input type="text" name="description"
                                                            class="form-control"
                                                            id="exampleFormControlInput1" required>
                                                    </div>



                                                    <div class="col-md-12">
                                                        <label for="exampleFormControlInput1"
                                                            class="form-label">Image</label>
                                                        <input type="file" name="image"
                                                            class="form-control"
                                                            id="exampleFormControlInput1" required>
                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
    {{-- // modal end --}}






    {{-- edit testimonials modal start here============== --}}


                
                
    {{-- // edit modal end --}}
                    <br>
    </div>
    </div>
    @endsection
