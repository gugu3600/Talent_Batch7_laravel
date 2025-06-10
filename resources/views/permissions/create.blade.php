@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{ route('permissions.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Add New Permission</h3>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="permission">Add New Permission</label>
                        <input type="text" name="name" id="permission">
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
