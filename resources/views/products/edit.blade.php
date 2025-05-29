<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>

    <h1>Product Edit</h1>
    <form action="{{ route("product.update",["id" => $product->id]) }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name"/>
        <input type="text" name="price" placeholder="price"/>
        <input type="text" name="description" placeholder="Des"/>
        <input type="submit" value="Update"/>
    </form>
    
</body>
</html>