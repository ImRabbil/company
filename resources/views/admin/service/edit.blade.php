@extends('admin.admin_master')
@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Add Services Info</div>
                    <div class="card-body">
                        <form action="{{ url('/service/update/' . $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Service Title</label>
                                <input type="text" value="{{ $service->title }}" name="title" class="form-control"
                                    id="exampleFormControlInput1">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">DesCription</label> <br>
                                <textarea type="text" value="" name="description" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">{{ $service->description }}</textarea>
                            </div>


                            <div class="mb-3">

                                <label for="basic-url">Iconic Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">bx bx-</span>
                                    </div>
                                    <input type="text" name="icon_name" value="{{ $service->icon_name }}" class="form-control" id="basic-url"
                                        aria-describedby="basic-addon3" required>
                                </div>
                                {{-- <label for="exampleFormControlInput1" class="form-label">Service Title</label>
                                <input type="text" value="{{ $service->icon_name }}" name="icon_name" class="form-control"
                                    id="exampleFormControlInput1"> --}}
                            </div>

                    </div>
                    <button type="submit" class="btn btn-primary"> Update Info</button>
                    </form>
                </div>




            </div>


        </div>
    </div>
@endsection
