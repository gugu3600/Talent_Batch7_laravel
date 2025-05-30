<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <link rel="stylesheet"
        type="text/css"href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>

<body>

    <div class="container mt-5">
        <div class="card mt-3">
            <div class="card-header">
                <h1>View Category</h1>
            </div>
            <div class="card-body">
                <p>{{ $category->id }} : {{ $category['name'] }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route("category.index") }}" class="btn btn-outline-dark">Back</a>
            </div>
        </div>
    </div>
</body>

</html>
