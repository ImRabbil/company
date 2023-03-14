@extends('admin.admin_master')

@section('admin')
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 card">
                    <a href="{{ route('add.about') }}"> <button class="btn btn-info" style="float: right">Add
                            Home About</button></a>
                    <div class="card">
                        <div class="card-header"> All About List</div>

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">SI No</th>
                                    <th scope="col">About Title</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($about as $row)
                                    <tr>
                                        <th scope="row" width="5%"> {{ $i++ }}</th>
                                        <td width="5%">{{ $row->title }}</td>
                                        <td width="15%">{{ $row->short_description }}</td>
                                        <td width="15%">{{ $row->long_description }}</td>

                                        {{-- <td width="5%"> <img src="{{ asset('image/slider/' . $row->image) }}"
                                                style="height:70px; width:100px;">
                                        </td> --}}

                                        <td width="15%">
                                            <a href="{{ url('about/edit', $row->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('about/delete', $row->id) }}"
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
