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
                    <div class="card-header"> All Categorry</div>
                </div>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">SI No</th>
                            <th scope="col">Category_Name</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Action</th>
                            {{-- <th scope="col">Created_At</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ( $categories as $cat )
                        <tr>
                            <th scope="row"> {{ $i++ }}</th>
                            <td>{{ $cat->category_name }}</td>
                            <td>{{ $cat->user_id }}</td>
                            <td>
                                <a href="{{ url('category/edit',$cat->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ url('category/softdelete',$cat->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                            {{-- <td>{{ $cat->created_at }}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->onEachSide(5)->links() }}
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"> Add Category</div>
                    <div class="card-body">
                        <form action="{{ route('store.category') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                                <input type="text" name="category_name" class="form-control"
                                    id="exampleFormControlInput1">
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
                    <button type="submit" class="btn btn-primary"> Add Category</button>
                    </form>
                </div>
            </div>
        </div>
        <br>


        <div class="col-md-8 card">
            <div class="card">
                <div class="card-header"> Trash Category List</div>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">SI No</th>
                        <th scope="col">Category_Name</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Action</th>
                        {{-- <th scope="col">Created_At</th> --}}
                    </tr>
                </thead>
                <tbody>
                    
                        @php
                            $i = 1;
                        @endphp
                        @foreach ( $trashCat as $cat )
                        <tr>
                            <th scope="row"> {{ $i++ }}</th>
                            <td>{{ $cat->category_name }}</td>
                            <td>{{ $cat->user_id }}</td>
                            <td>
                                <a href="{{ url('category/restore',$cat->id) }}" class="btn btn-info">Restore</a>
                                <a href="{{ url('category/pdelete',$cat->id) }}" class="btn btn-danger">P Delete</a>
                            </td>
                            {{-- <td>{{ $cat->created_at }}</td> --}}
                        </tr>
                        @endforeach
                  
                    
                   
                </tbody>
            </table>
            {{ $trashCat->links() }}
        </div>






    </div>
    {{-- </div> --}}
{{-- </div> --}}
</x-app-layout>
