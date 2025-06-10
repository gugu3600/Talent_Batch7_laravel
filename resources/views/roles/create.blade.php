@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Add New Role</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="role">Add New Role</label>
                        <input type="text" name="name" id="role">
                    </div>
                    <label for="permit" class="d-block mb-3">Select Permissions</label>

                    <div class="form-group">
                        @foreach ($permissions as $permission)
                            <label for="" class="d-block">{{ $permission->name }}</label>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id}}">
                        @endforeach
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-success me-3" value="Add New Role">
                    <a href="{{ route("roles.index") }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
