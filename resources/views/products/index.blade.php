<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

</head>

<body>

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
        <h2><a href="{{ route("product.create") }}" class="btn btn-secondary my-3">+ Create</a></h2>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
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

</body>

</html>
