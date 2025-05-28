<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>

    <h1>Hello</h1>
    @foreach ($categories as $category ) 
        <p>{{$category["id"]}}. {{$category["name"]}}</p>
        {{-- <a href="{{ url('categories/'.$category['id']) }}">Show</a> --}}
        <a href="{{route("category.show",["id"=>$category->id])  }}">Show</a>
    @endforeach
</body>
</html>