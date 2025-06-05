@extends("layouts.master");
@section("content")
    
    {{-- <form action="{{ Route("category.store")}}" method="post">
        @csrf
        <input type='text' name="name" placeholder="Category Name"/>
        <input type="submit" value="Create">
    </form> --}}

    <div class="container">
        @if ($errors->any())
            <ul class="mt-3 fw-bold">
                @foreach ($errors->all() as $error )
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="card mt-3">
            <div class="card-header">
                <h1>Create New Category</h1>
            </div>
            <form action="{{ route("category.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                 <div class="card-body">
                    <input type="text" name="name" placeholder="Category Name" class="form-control">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a href="{{ route("category.index") }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script> --}}
@endsection