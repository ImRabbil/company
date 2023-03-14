@extends('admin.admin_master')

@section('admin')
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 card">
                    <a href="{{ route('add.service') }}"> <button class="btn btn-info" style="float: right">Add
                            Services</button></a>
                    <div class="card">
                        <div class="card-header"> All Services List</div>

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">SI No</th>
                                    <th scope="col">Services Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Icon Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($service as $row)
                                    <tr>
                                        <th scope="row" width="5%"> {{ $i++ }}</th>
                                        <td width="5%">{{ $row->title }}</td>
                                        <td width="25%">{{ $row->description }}</td>
                                        <td width="5%"> {{ $row->icon_name }}</td>

                                        <td width="15%">
                                            <a href="{{ url('service/edit', $row->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('service/delete', $row->id) }}"
                                                onclick="return confirm('Are You sure to Delete of Select Data')"
                                                class="btn btn-danger">Delete</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <br>
        </div>
    </div>
@endsection
