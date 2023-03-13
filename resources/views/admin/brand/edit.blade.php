
@extends('admin.admin_master')


@section('admin')  

    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> Edit Brand Info</div>
                        <div class="card-body">
                            <form action="{{ url('/brand/update/' . $brand->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
                                    <input type="text" value="{{ $brand->brand_name }}" name="brand_name"
                                        class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Brand Image</label>
                                    <input type="file" value="{{ $brand->brand_image }}" name="brand_image"
                                        class="form-control" id="exampleFormControlInput1">
                                </div>
                                <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

                                <div class="form-group">
                                    <img src={{ asset('image/brand/' . $brand->brand_image) }} style="height:100px;width:200px">
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
    </div>
    </div>

    @endsection

