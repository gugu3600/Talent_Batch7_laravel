@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Edit User
                </div>

                <form action="{{ Route('user.update',["id" => $user->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="Address">Address</label>
                            <textarea name="address" id="address" class="form-control" placeholder="Eneter an address">{{ $user->address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="img" class="form-control">
                        </div>


                    </div>

                    <div class="card-footer">
                        <div class="form-group">
                            <a href="{{ Route('users') }}" class="btn btn-outline-dark">Back</a>
                            <input type="submit" class="btn btn-outline-primary" value="Update">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endsection
