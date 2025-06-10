@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{ route('permissions.update',["permission" => $permission->id]) }}" method="POST">
            @csrf
            {{ method_field("PATCH") }}
            <div class="card">
                <div class="card-header">
                    <h3>Edit Permission</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="permission">Edit Permission</label>
                        <input type="text" name="name" id="permission" value="{{ $permission->name }}">
                    </div>
                    
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-success me-3" value="Add New permission">
                    <a href="{{ route("permissions.index") }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection
