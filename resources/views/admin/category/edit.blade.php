<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category List') }}
        </h2>
    </x-slot>
    <div class="container">
     <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Edit Category</div>
                    <div class="card-body">
                        <form action="{{ url('/category/update/'.$categories->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                                <input type="text" value="{{ $categories-> category_name }}" name="category_name" class="form-control"
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
                    <button type="submit" class="btn btn-primary"> Update Category</button>
                    </form>
                </div>   
            </div>
        </div>
    </div>
    </div>
</div>
</x-app-layout>
