<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>

    <h1>Hello</h1>
    <a href="{{ Route("category.create") }}">+ Create</a>
    @foreach ($categories as $category ) 
        <p>{{$category["id"]}}. {{$category["name"]}}</p>
        {{-- <a href="{{ url('categories/'.$category['id']) }}">Show</a> --}}
        <a href="{{route("category.show",["id"=>$category->id])  }}">Show</a>
        <a href={{ route("category.edit",["id" => $category->id]) }}>Edit</a>
        {{-- <a href={{ route("category.delete",["id" => $category->id]) }}>Delete</a> --}}
        <a href={{ url("/category/$category->id/delete") }}>Delete</a>
        <form action="{{ route("category.delete",$category->id) }}" method="POST">
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endforeach
</body>
</html>