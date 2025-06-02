<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet"
        type="text/css"href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>

<body>
    <div class="container mt-5">
        <div class="card mt3">
            <div class="card-header">
                <h1>Show Product {{ $product->id }}</h1>

            </div>
            <div class="card-body">
                <p>{{ $product->name }} <b>{{ $product->price }}</b> <i>{{ $product->description }}</i></p>
                <img src="{{ asset("productImages/".$product->image) }}" alt="{{ $product->img }}" style="width:50px;heigh:50px;"/>
            </div>
            <div class="card-footer">
                <a href="{{ route('products') }}" class="btn btn-outline-dark">Back</a>
            </div>
        </div>
    </div>
</body>

</html>
