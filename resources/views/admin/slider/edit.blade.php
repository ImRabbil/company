@extends('admin.admin_master')
@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Add Slider Info</div>
                    <div class="card-body">
                        <form action="{{ url('/slider/update/' . $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" value="{{ $slider->title }}" name="title" class="form-control"
                                    id="exampleFormControlInput1">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                <input type="text" value="{{ $slider->description }}" name="description"
                                    class="form-control" id="exampleFormControlInput1" >
                            </div> --}}
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">DesCription</label> <br>
                                <textarea type="text" value="" name="description" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">{{ $slider->description }}</textarea>
                            </div>


                            <div class="form-group mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Slider_Image</label>
                                <input type="file" value="{{ $slider->image }}" name="image" class="form-control"
                                    id="exampleFormControlInput1">
                            </div>
                            <input type="hidden" name="old_image" value="{{ $slider->image }}">

                            <div class="form-group">
                                <img src={{ asset('image/slider/' . $slider->image) }} style="height:100px;width:200px">
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                    </div>
                    <button type="submit" class="btn btn-primary"> Update Info</button>
                    </form>
                </div>




            </div>


        </div>
    </div>
@endsection
