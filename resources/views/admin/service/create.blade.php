@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add Services Info</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('store.service') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1"> Service Title </label>
                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" required>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Service Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>

                    <label for="basic-url">Iconic Name</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">bx bx-</span>
                        </div>
                        <input type="text" name="icon_name" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                    </div>

                    {{-- <label for="exampleFormControlInput1"> Iconic Name </label>
                    <input type="text" name="icon_name" class="form-control" id="exampleFormControlInput1" required> --}}

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>

                    </div>
            </form>
        </div>
    </div>
@endsection
