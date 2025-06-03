<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

</head>

<body>

    {{-- <h1>Product Edit</h1>
    <form action="{{ route("product.update",["id" => $product->id]) }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name"/>
        <input type="text" name="price" placeholder="price"/>
        <input type="text" name="description" placeholder="Des"/>
        <input type="submit" value="Update"/>
    </form> --}}

    <div class="container mt-5">
        @if ($errors->any())
            <ul class="mt3">
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="card mt-3">
            <div class="card-header">
                <h1>Product Edit</h1>
            </div>
            <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="des">Description</label>
                        <input type="text" name="description" id="des" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="category_id">Choose Categories</label>
                        <select name="category_id" id="category_id" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $product->category_id)
                                    selected
                                @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <img src="{{ asset("productImages/".$product->image) }}" alt="{{ $product->img }}" style="width:50px;heigh:50px;"/>
                        <div class="form-group my-3">
                            <label for="status">Status</label>
                            <input type="checkbox" class="form-checkbox" name="status" {{$product->status == true ? "checked" : ""}}/>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="Update" class="btn btn-outline-success" />
                    <a href="{{ route("products") }}" class="btn btn-outline-warning">Back</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
