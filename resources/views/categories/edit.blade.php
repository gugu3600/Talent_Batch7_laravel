@extends("layouts.master")
@section("content")
    {{-- <h1>Edit Category</h1> --}}

    {{-- {{ dd($category) }} --}}

    {{-- <form action="{{ route("category.update",['id' => $category->id]) }}" method="post">
        @csrf
        <input type="text" value="{{ $category->name }}" name="name"/>
        <input type="submit" value="Update"/>
    </form> --}}
    {{-- {{ dd($category) }} --}}
    <div class="container">
        <div class="card mt-5">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class='text-danger'>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="card-header">
                <h1>Update Category</h1>
            </div>
            <form action="{{ url("/category/$category->id/edit") }}" method="post">
                @csrf
                <div class="card-body">
                    <input type="text" value="{{ $category->name }}" name="name" class="form-control" />
                    <img src="{{ asset("categoryImages/$category->image") }}" style="width:100px;height:100px;"
                        alt=""/>
                </div>

                <div class="card-footer">
                    <input type="submit" value="Update" class="btn btn-outline-primary" />
                </div>
            </form>
        </div>
    </div>


@endsection
