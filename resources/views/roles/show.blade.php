@extends("layouts.master")

@section("content")

<div class="container">
    <div class="card">
        <div class="card-header">
            <p>{{$role->name}}</p>
        </div>

        <div class="card-body">
            <h4>This Role Can Do</h4>

            @foreach ($role->permissions as $permission)
                <h3 class="my-3 text-success fw-bold spacing-3">{{$permission->name}}</h3>
            @endforeach
        </div>
    </div>
</div>

@endsection