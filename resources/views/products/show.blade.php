@extends("layouts.master")
@section("content")
    <div class="container mt-5">
        <div class="card mt3">
            <div class="card-header">
                <h1>Show Product {{ $product->id }}</h1>

            </div>
            <div class="card-body">
                <p>{{ $product->name }} <b>{{ $product->price }}</b> <i>{{ $product->description }}</i></p>
                <img src="{{ asset('productImages/' . $product->image) }}" alt="{{ $product->img }}"
                    style="width:50px;heigh:50px;" />
                @if ($product->status == true)
                    <p class="text-success fw-bold">Active</p>
                @else
                    <p class="text-danger fw-bold">Suspend</p>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('products') }}" class="btn btn-outline-dark">Back</a>
            </div>
        </div>
    </div>
@endsection