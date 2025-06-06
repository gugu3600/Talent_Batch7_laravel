@extends('layouts.master');
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Create User
            </div>

            <form action="{{ Route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="@gmail.com">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="Address">Address</label>
                        <textarea name="address" id="address" class="form-control" placeholder="Eneter an address" ></textarea>
                    </div>

                    <div class="form-group">
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="male" class="form-check-input" value="M">

                        <label for="female">Female</label>
                        <input type="radio" name="gender" id="female" class="form-check-input" value="F">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="checkbox" id="status" class="form-check" class="form-control" name="status">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="img" class="form-control">
                    </div>


                </div>

                <div class="card-footer">
                    <div class="form-group">
                        <a href="{{ Route('users') }}" class="btn btn-outline-dark">Back</a>
                        <input type="submit" class="btn btn-outline-primary" value="Create">
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
