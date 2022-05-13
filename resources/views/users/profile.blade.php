@extends('layouts.app')
@section('content')

@auth
    <x-menu />
@endauth


<div class="container-fluid col-xxl-8 px-4 py-2">
    <div class="bg-light p-5 rounded d-flex row align-items-center">
        <div class="profile-images col-sm-3">
            @if (auth()->user()->image)
                <img class="my-3 img-circle" style="border-radius: 150px;" width="150" height="150" 
                src="{{ '/storage/images/'.auth()->user()->id.'/'.auth()->user()->image}}" alt="{{$user->image}}">
            @else
                <img class=" img-circle" style="border-radius: 150px; margin:1rem" width="150" height="150" 
                src="/images/icon-alliance/man.png" alt="default">
            @endif
            @auth
            <div>
                <form action="{{ route('users.profile',  auth()->user()->name) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Change your profile</label>
                        <input class="form-control" name="image" type="file" id="image" value="">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-secondary btn-sm px-4"> Upload</button>
                    </div>
                </form>
            </div>
            @endauth
        </div>
        <div class="col-sm-8 mx-auto">
            <h1>{{ $user->name}}</h1>
            <p><strong>@name </strong> {{ $user->name}}</p>
            <p><strong>@email </strong> {{ $user->email}}</p>
            <p><strong>@coutry </strong>{{ $user->country}}</p>
            <p><strong>@City </strong>{{ $user->city}}</p>
            <p><strong>@address </strong>{{ $user->address}}</p>
            <br>
            <p> Change your information by clicking on the button below.</p>
            
            <form  action="{{ route('user.update-profile', auth()->user()->name) }}">
                <button type="submit" class="btn btn-primary btn-secondary btn-sm">Edit Information &raquo;</button>
            </form>
            </p>
        </div>
    </div>
</div>







@endsection