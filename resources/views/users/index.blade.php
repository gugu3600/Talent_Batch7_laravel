@extends("layouts.master");
@section("content");

    {{-- {{ dd($users) }} --}}

    {{-- {{ print_r($users) }} --}}

    <div class="container mt-5">
        <a href="{{ route("category.index") }}" class="btn btn-secondary my-3">Categories</a>
        <a href="{{ route("users") }}" class="btn btn-secondary my-3">Users</a>
        <a href="{{ route("products") }}" class="btn btn-secondary my-3">Products</a>
        <a href="{{ route("user.create") }}" class="btn btn-warning my-3">Create</a>
        <table class="table table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <TH>Gender</TH>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{$user->gender}}</td> 
                        @if ($user->status == true)
                            <td class="text-success fw-bold">Active</td>
                        @else
                        <td class="text-danger fw-bold">Suspend</td>
                        @endif
                        <td><img src="{{ asset("userImages/".$user->img) }}" alt="{{ $user->img }}" style="width:50px;heigh:50px;"/></td>
                        <td>{{$user->created_at}}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('user', ['id' => $user->id]) }}" class="me-3 btn btn-outline-primary">Show</a>
                            <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="me-3 btn btn-outline-success">Update</a>
                            <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="post">
                                @csrf
                                <button type="submit" class="me-3 btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection