<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
</head>
<body>

    <div class="container">
        <h1>Categories</h1>
        <a href="{{ Route("category.create") }}" class="btn btn-outline-success my-4">+ Create</a>
        <a href="{{ route("products") }}" class="btn btn-secondary my-3">Products</a>
    {{-- @foreach ($categories as $category )  --}}
        {{-- <p>{{$category["id"]}}. {{$category["name"]}}</p> --}}
        {{-- <a href="{{ url('categories/'.$category['id']) }}">Show</a> --}}
        {{-- <a href="{{route("category.show",["id"=>$category->id])  }}">Show</a> --}}
        {{-- <a href={{ route("category.edit",["id" => $category->id]) }}>Edit</a> --}}
        {{-- <a href={{ route("category.delete",["id" => $category->id]) }}>Delete</a> --}}
        {{-- <a href={{ url("/category/$category->id/delete") }}>Delete</a> --}}
        {{-- <form action="{{ route("category.delete",$category->id) }}" method="POST"> --}}
            {{-- @csrf --}}
            {{-- <button type="submit">Delete</button> --}}
        {{-- </form> --}}
    {{-- @endforeach --}}

        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="bg-dark text-white">ID</th>
                    <th class="bg-dark text-white">Name</th>
                    <th class="bg-dark text-white">Image</th>
                    <th class="bg-dark text-white">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                    <img
                        src="{{ asset("categoryImages/".$category->image )}}" 
                        alt="{{ $category->name }}"
                        style="width:100px;height:100px"
                    />
                    
                    </td>
                    <td class="d-flex">
                       <a href="{{route("category.show",["id"=>$category->id])  }}" class="me-4 btn btn-outline-dark">Show</a> 
                       <a href={{ route("category.edit",["id" => $category->id]) }} class="me-4 btn btn-outline-success">Edit</a>
                        <form action="{{ route("category.delete",$category->id) }}" method="POST">
                         @csrf
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>