<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Category List') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 card">
                    <div class="card">
                        <div class="card-header"> All Brand List</div>
                    </div>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">SI No</th>
                                <th scope="col">Brand_Name</th>
                                <th scope="col">Brand_Image</th>
                                <th scope="col">Created_At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($brands as $brand)
                                <tr>
                                    <th scope="row"> {{ $i++ }}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td> <img src="{{ asset('image/brand/' . $brand->brand_image) }}"
                                            style="height:70px; width:100px;">
                                    </td>
                                    <td>{{ $brand->created_at }}</td>
                                    <td>
                                        <a href="{{ url('brand/edit', $brand->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ url('brand/delete', $brand->id) }}"
                                            onclick="return confirm('Are You sure to Delete of Select Data')"
                                            class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Brand Info</div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control"
                                        id="exampleFormControlInput1" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Brand_Image</label>
                                    <input type="file" name="brand_image" class="form-control"
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

</x-app-layout>
