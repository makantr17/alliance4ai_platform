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
            <p class="opacity-70 text-black pb-1" style="font-size:14px"><i class="fa fa-map" style="color:black"></i>  {{ $user->address}}</p>
            
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
            <form action="" method="get" class="mr-1">
            @csrf
                <button type="submit"class="btn btn-muted btn-sm "><i class="fa fa-eye" style="color:black"></i> My roles</button>
            </form>
            <form action="" method="get" class="mr-1">
            @csrf
                <button type="submit"class="btn btn-muted btn-sm "><i class="fa fa-trophy" style="color:black"></i> Awards</button>
            </form>
            
            <div class="container d-flex flex-row-reverse">
                <form  action="{{ route('user.update-profile', auth()->user()) }}">
                    <button type="submit" class="btn btn-primary border btn-sm"> <i class="fa fa-edit"></i> Edit profile </button>
                </form>
            </div>
        </div>
    </div>

    <div class="d-flex col-lg-12 justify-content-between py-2 border-top">
        <div class="col-lg-3 bg-white">
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
            


            <form class="needs-validation" novalidate action="{{ route('user.update-profile',  auth()->user()) }}" method="post">
                <div class="row g-3">
                    @csrf

                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Your name" 
                        class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="{{ $user->name}}">
                        
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" placeholder="address" 
                        class="form-control py-2  rounded-lg @error('address') border border-danger @enderror" value="{{ $user->address}}">

                        @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="profession" class="form-label">Profession</label>
                        <select class="form-select" type="text" name="profession" id="profession" 
                        class="form-control py-2  rounded-lg @error('profession') border border-danger @enderror" value="{{ $user->profession}}">
                            <option value="Tech">Tech</option>
                            <option value="Consulting">Consulting</option>
                            <option value="Finance">Finance</option>
                            <option value="Healthcare">Healthcare</option>
                            <option value="Law">Law</option>
                            <option value="Retail">Retail</option>
                            <option value="Government">Government</option>
                            <option value="Art">Art</option>
                            <option value="Writing">Writing</option>
                            <option value="Sports">Sports</option>
                            <option value="above 40">Fashion</option>
                            <option value="above 40">Military</option>
                            <option value="above 40">Other</option>
                        </select>

                        @error('profession')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="age" class="form-label">Age group</label>
                        <select class="form-select" name="age" id="age"
                        class="form-control py-2  rounded-lg @error('age') border border-danger @enderror" value="{{ $user->age}}">
                            <option value="15-25">15-25</option>
                            <option value="26-35">26-35</option>
                            <option value="36-45">36-45</option>
                            <option value="45+">45+</option>
                        </select>

                        @error('age')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" id="gender"
                        class="form-control py-2  rounded-lg @error('gender') border border-danger @enderror" value="{{ $user->gender}}">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>

                        @error('gender')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" type="text" name="country" id="country"
                        class="form-control py-2  rounded-lg @error('country') border border-danger @enderror" value="{{ $user->country}}">
                            <option value="Africa">Africa</option>
                            <option value="North America">North America</option>
                            <option value="South America">South America</option>
                            <option value="Asia">Asia</option>
                            <option value="Europe">Europe</option>
                            <option value="Middle East">Middle East</option>
                            <option value="Australia">Australia</option>
                        </select>

                        @error('country')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" placeholder="phone" 
                        class="form-control py-2  rounded-lg @error('phone') border border-danger @enderror" value="{{ $user->phone}}">

                        @error('phone')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" placeholder="city" 
                        class="form-control py-2  rounded-lg @error('city') border border-danger @enderror" value="{{ $user->city}}">

                        @error('city')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-12">
                        <label for="email" class="form-label">Your email</label>
                        <input type="text" name="email" id="email" placeholder="Your email" 
                        class="form-control py-2  rounded-lg @error('email') border border-danger @enderror" value="{{ $user->email}}">

                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <hr class="my-4">
                
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a class="btn btn-danger" href="{{ route('users.profile', auth()->user())}}">Cancel</a>
                </div>
            </form>


        </div>
    </div>
</div>


@endsection







