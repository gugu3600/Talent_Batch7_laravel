<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Edit Category</h1>

    {{-- {{ dd($category) }} --}}
    
    {{-- <form action="{{ route("category.update",['id' => $category->id]) }}" method="post">
        @csrf
        <input type="text" value="{{ $category->name }}" name="name"/>
        <input type="submit" value="Update"/>
    </form> --}}
    {{-- {{ dd($category) }} --}}

    <form action="{{ url("/category/$category->id/edit") }}" method="post">
        @csrf
        <input type="text" value="{{ $category->name }}" name="name"/>
        <input type="submit" value="Update"/>
    </form>
    
</body>
</html>