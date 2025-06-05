@extends("layouts.master");
@section("content");

    {{-- <h1>Products List</h1>

    <a href="{{ route("product.create") }}">+ Create</a>

     @foreach ($products as $product)
        <p>{{ $product->id }} : {{$product["name"]}} - <i>$ {{$product->price}}</i> - <b>{{$product->description}}</b></p> 
        <a href="{{ route("product",['id' => $product->id]) }}">Show</a>
        <a href="{{ route('product.edit',["id" => $product->id]) }}">Update</a>
        <form action="{{ route("product.delete",["id" => $product->id]) }}" method="post">
            @csrf
            <button type="submit">Delete</button>
        </form>
     @endforeach --}}

    <div class="container mt-5">
        <a href="{{ route("product.create") }}" class="btn btn-secondary my-3 d-inline-block">+ Create</a>
        <a href="{{ route("category.index") }}" class="btn btn-secondary my-3">Categories</a>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <TH>Image</TH>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img src="{{ asset("productImages/".$product->image) }}" alt="{{ $product->img }}" style="width:50px;heigh:50px;"/></td>
                        <td>{{$product->category->name}}</td> 
                        @if ($product->status == true)
                            <td class="text-success fw-bold">Active</td>
                        @else
                        <td class="text-danger fw-bold">Suspend</td>
                        @endif
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('product', ['id' => $product->id]) }}" class="me-3 btn btn-outline-primary">Show</a>
                            <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="me-3 btn btn-outline-success">Update</a>
                            <form action="{{ route('product.delete', ['id' => $product->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="me-3 btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection;