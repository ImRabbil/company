@extends('admin.admin_master')

@section('admin')
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 card">
                    <a href="{{ route('add_contact') }}"> <button class="btn btn-info" style="float: right">Add
                            Admin Contact</button></a>
                    <div class="card">
                        <div class="card-header"> All Contact List</div>

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">SI No</th>
                                    <th scope="col">Contact Email</th>
                                    <th scope="col">Contact Phone</th>
                                    <th scope="col">Contact Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($contacts as $row)
                                    <tr>
                                        <th scope="row" width="5%"> {{ $i++ }}</th>
                                        <td width="15%">{{ $row->email }}</td>
                                        <td width="15%">{{ $row->phone }}</td>
                                        <td width="15%">{{ $row->address }}</td>

                                        {{-- <td width="5%"> <img src="{{ asset('image/slider/' . $row->image) }}"
                                                style="height:70px; width:100px;">
                                        </td> --}}

                                        <td width="15%">
                                            <a href="{{ url('contact/edit', $row->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('contact/delete', $row->id) }}"
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
