@extends('layouts.app')
@section('content')

@auth
    <x-menu />
@endauth


<div class="container-fluid col-xxl-8 px-4 py-2">
    <div class="p-0 pr-5 pl-5 rounded d-flex row align-items-center border-bottom">
        <div class="profile-images col-sm-3 bg-light py-2">
            @if (auth()->user()->image)
                <img class="my-3 p-1 img-circle border border-info" style="border-radius: 150px;" width="150" height="150" 
                src="{{ '/storage/images/'.auth()->user()->id.'/'.auth()->user()->image}}" alt="{{$user->image}}">
            @else
                <img class="border-info img-circle" style="border-radius: 150px; margin:1rem" width="150" height="150" 
                src="/images/icon-alliance/man.png" alt="default">
            @endif
            @auth
            <div>
                <form action="{{ route('users.profile',  auth()->user()) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <small>Change your profile</small>
                        <input class="form-control btn-sm" name="image" type="file" id="image" value="">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-muted border btn-sm"> <i class="fa fa-cloud-upload"></i> Upload</button>
                    </div>
                </form>
            </div>
            @endauth
        </div>
        <div class="col-sm-9 mx-auto p-4">
            <h1 class="fw-bold pb-2">{{ $user->name}}</h1>
            <p class="opacity-70 text-black pb-1" style="font-size:14px">Email via - {{ $user->email}}</p>
            <p class="opacity-70 text-black pb-1" style="font-size:14px">Live in {{ $user->city}}, in {{ $user->country}}</p>
            <p class="opacity-70 text-black pb-1" style="font-size:14px"><i class="fa fa-map-marker" style="color:black"></i>  {{ $user->address}}</p>
            
            <div class="d-flex col-sm-12 gap-2 w-100 justify-content-between ">
                <small></small>
                <p>Joined <small class="opacity-90 text-info">{{ $user-> created_at->diffForHumans() }} </small></p>
            </div>
        </div>
        
    </div>

    <div class="d-flex col-sm-12 gap-2 w-100 justify-content-center flex-wrap align-items-center my-2">
        
        <div class="col-sm-12 d-flex my-2 justify-content-right">
            <form action="" method="get" class="mr-1">
            @csrf
                <button type="submit"class="btn btn-muted btn-sm border-bottom">{{ $user->name}} </button>
            </form>
            <!-- <form action="" method="get" class="mr-1">
            @csrf
                <button type="submit"class="btn btn-muted btn-sm "><i class="fa fa-eye" style="color:black"></i> My roles</button>
            </form>
            <form action="" method="get" class="mr-1">
            @csrf
                <button type="submit"class="btn btn-muted btn-sm "><i class="fa fa-trophy" style="color:black"></i> Awards</button>
            </form> -->
            
            <div class="container d-flex flex-row-reverse">
                <form  action="{{ route('user.update-profile', auth()->user()) }}">
                    <button type="submit" class="btn btn-primary border btn-sm"> <i class="fa fa-edit"></i> Edit profile </button>
                </form>
            </div>
        </div>
    </div>

    <div class="d-flex col-lg-12 justify-content-between py-2 border bg-light">
        <div class="col-lg-3 bg-light">
            <h6 class="fw-normal my-2 text-info border-bottom pb-1">Admin Access</h6>
            <div class="">
                @if ($admin -> count())
                    @foreach($admin as $admin_user)
                        <nav class="pb-2"><strong class="text-primary">access_admin: </strong>{{$admin_user->access_role[0]-> is_admin ? 'true' : 'false' }}</nav>
                        <nav class="pb-2"><strong class="text-primary">access_admin: </strong>{{$admin_user->access_role[0]-> grant_user_topic ? 'true' : 'false'}}</nav>
                        <nav class="pb-2"><strong class="text-primary">access_admin: </strong>{{$admin_user->access_role[0]-> grant_user_discussion ? 'true' : 'false'}}</nav>
                        <nav class="pb-2"><strong class="text-primary">access_admin: </strong>{{$admin_user->access_role[0]-> grant_user_circles ? 'true' : 'false'}}</nav>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="d-flex col-lg-9 bg-light justify-content-center py-5">
            <i class="fa fa-cloud-upload fa-4x text-primary"></i>
        </div>
    </div>
</div>


@endsection