@extends('admin.admin_master')

@section('admin')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Add Contact Info</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('store.contact') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1"> Contact Email </label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" required>

                <label for="exampleFormControlInput1"> Contact Phone </label>
                <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" required>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Contact Address</label>
                    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" required></textarea>
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>

                </div>
        </form>
    </div>
</div>
    
@endsection
