<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" type="text/css"href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

</head>

<body>

    <div class="container mt-5">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="card mt-3">
            <div class="card-header">
                <h1>Product Create</h1>
            </div>
            <form action="{{ route('product.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <input type="text" name="name" placeholder="Name" class="form-control d-block mb-3 py-3" />
                    <input type="text" name="price" placeholder="price" class="form-control d-block mb-3 py-3" />
                    <input type="text" name="description" placeholder="Des" class="form-control d-block py-3" />
                </div>
                <div class="card-footer">
                    <input type="submit" value="Create" class="btn btn-outline-success" />
                    <a href="{{ route("products") }}" class="btn btn-outline-dark">Back</a>
                </div>
            </form>

        </div>
    </div>


</body>

</html>
