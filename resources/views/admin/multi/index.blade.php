@extends('admin.admin_master')

@section('admin')

    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 card">
                    <div class="card">
                        {{-- <div class="card-header"> All Multi-Picture</div> --}}
                        <div class="card-group">
                            @foreach ($multi as $img)
                                <div class="col-md-4 mt-5">
                                    <div class="card">
                                        <img src="{{ asset($img->image) }}" alt="">
                                        <a href="{{ url('multi/delete', $img->id) }}" onclick="return confirm('Are You sure to Delete of Select Data')"
                                            class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Multi-Picture</div>
                        <div class="card-body">
                            <form action="{{ route('store.multi') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Multi_Image</label>
                                    <input type="file" multiple="" name="image[]" class="form-control"
                                        id="exampleFormControlInput1" required>
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
                        <button type="submit" class="btn btn-primary"> Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
        </div>

    @endsection
