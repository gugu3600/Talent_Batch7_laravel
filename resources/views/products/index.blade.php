<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>

    <h1>Products List</h1>

     @foreach ($products as $product)
        <p>{{ $product->id }} : {{$product["name"]}} - <i>$ {{$product->price}}</i> - <b>{{$product->description}}</b></p> 
        <a href="{{ route("product",['id' => $product->id]) }}">Show</a>
     @endforeach
    
</body>
</html>