@extends('admin.admin_master')
@section('admin')
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 card">
                    <a href="{{ route('add.slider') }}"> <button class="btn btn-info" style="float: right">Add
                            Slider</button></a>
                    <div class="card">
                        <div class="card-header"> All Slider List</div>

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">SI No</th>
                                    <th scope="col">Slider Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Slider Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <th scope="row" width="5%"> {{ $i++ }}</th>
                                        <td width="5%">{{ $slider->title }}</td>
                                        <td width="25%">{{ $slider->description }}</td>
                                        <td width="5%"> <img src="{{ asset('image/slider/' . $slider->image) }}"
                                                style="height:70px; width:100px;">
                                        </td>

                                        <td width="15%">
                                            <a href="{{ url('slider/edit', $slider->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('slider/delete', $slider->id) }}"
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
