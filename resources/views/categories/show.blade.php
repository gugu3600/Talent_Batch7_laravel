@extends("layouts.master");
@section("content")
    <div class="container mt-5">
        <div class="card mt-3">
            <div class="card-header">
                <h1>View Category</h1>
            </div>
            <div class="card-body">
                <p>{{ $category->id }} : {{ $category['name'] }}</p>
                <img src="{{ asset("categoryImages/$category->image") }}" style="width:100px;height:100px;" alt=""/>
            </div>
            <div class="card-footer">
                <a href="{{ route("category.index") }}" class="btn btn-outline-dark">Back</a>
            </div>
        </div>
    </div>
@endsection
