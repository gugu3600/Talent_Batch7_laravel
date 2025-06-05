@extends('layouts.master');
@section('content')

    <div class="container mt-5">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="card mt-3">
            <div class="card-header">
                <h1>Product Create</h1>
            </div>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <input type="text" name="name" placeholder="Name" class="form-control d-block mb-3 py-3" />
                    <input type="text" name="price" placeholder="price" class="form-control d-block mb-3 py-3" />
                    <input type="text" name="description" placeholder="Des" class="form-control d-block py-3" />

                    <select name="category_id" id="" class="form-select mb-4">
                        <option value="" selected disabled>Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <input type="file" name="image" class="form-control">
                    <div class="form-group my-3">
                        <label for="status">Status</label>
                        <input type="checkbox" id="status" name="status" class="form-checkbox">
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Create" class="btn btn-outline-success" />
                    <a href="{{ route('products') }}" class="btn btn-outline-dark">Back</a>
                </div>
            </form>

        </div>
    </div>

@endsection