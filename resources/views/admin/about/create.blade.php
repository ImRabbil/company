@extends('admin.admin_master')

@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add About Info</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1"> About Title </label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" required>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea class="form-control" name="short_description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea id="textarea" class="form-control" name="long_description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>

                </div>
        </form>
    </div>
</div>
    
@endsection
