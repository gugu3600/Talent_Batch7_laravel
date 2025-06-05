@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        {{-- <ul class="list">
            <li>{{$user->name}}</li>            
            <li>{{$user->email}}</li>            
            <li>{{$user->address}}</li>            
            <li>{{$user->phone}}</li>            
            <li>{{$user->gender}}</li>
            <li><img src="" alt=""></li>    
            @if ($user->status == 1)
            <li class="text-success">Active</li>
            @else
            <li class="text-danger">Suspended</li>
            @endif
            <li>{{$user->created_at}}</li>
        </ul> --}}
        <div class="card text-center">
            <div class="card-header text-center">
                <h3>{{$user->name}}</h3>
                <span>{{$user->id}}</span>
            </div>

            <div class="card-body">
                <img src="" alt="">
                <p class="bg-warning p-4 fw-bold">Email -> {{$user->email}}</p>
                <p>Address -> {{$user->address}}</p>
                <p>Phone -> {{$user->phone}}</p>
                <p>Gender -> {{$user->gender}}</p>
            </div>

            <div class="card-footer">
                @if ($user->status == 1)
                    <p class="text-success fw-bold">
                        Active
                    </p>
                    @else
                    <p class="text-danger fw-bold">
                        Suspended
                    </p>
                @endif

                <a href="{{ Route("users") }}">Back</a>
            </div>
        </div>
    </div>
@endsection
