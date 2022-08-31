
@extends('layouts.app')

@section('content')


@auth
    <x-menu />
@endauth

<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <!-- HEADER SLIDE START HERE -->
        <div class="px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-dark">My Circles</h1>
            </div>
            
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between border-bottom py-1">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">2</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.creategroups',  auth()->user()) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> New Circle</button>
                        </form>
                        <form action="{{ route('group.addmember',  $groups->id) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Invite FM</button>
                        </form>
                        <form action="" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"> Update</button>
                        </form>
                        <form action="{{ route('users.group.manage', [$groups->user, $groups->id]) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-arrow-left"></i> Back</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>


<div class="col-lg-12 row y-1">
    <div class="col-lg-3 mx-2 bg-light py-2">
        @if ($groups)
            <div class="mb-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between mb-2">
                        @if ($groups-> image )
                            <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" alt="twbs" width="120" height="120" class="rounded-circle flex-shrink-0 shadow-sm border border-info p-1">
                        @else
                            <img src="/images/icon-alliance/discussion.png" alt="twbs" width="120" height="120" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-warning p-1">
                        @endif
                    </div>
                    <h4 class="display-7 py-1 fw-bold ">{{ $groups-> name}}</h4>
                    <p style="font-size: 14px"><strong class=""> {{ $groups-> titre}}</strong></p>
                    <p style="font-size: 14px"><strong class="text-primary">Description </strong> {{ $groups-> description}}</p>
                    <p><small>hosted by</small> <small class="text-info">{{ $groups-> user->name}}</small></p>
                    <small class="opacity-50 text-nowrap">{{ $groups-> created_at->diffForHumans() }}</small>
                </div>
                
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
            <form action="{{ route('groups.members', [$groups ->id]) }}" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>
        <div class="p-3 gray-bg my-2 rounded">
            <p class="text-secondary pb-2">Delete Circle</p>
            @auth
                <form action="{{ route('users.group.delete', [$groups->user, $groups->id]) }}" method="post" class="mr-1">
                @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endauth
        </div>
    </div>
    
    <div class="col-lg-8 py-1 row d-flex ">
        
    <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center" enctype="multipart/form-data"
            novalidate action="{{ route('users.updategroup',  [auth()->user(), $groups->id]) }}" method="post">
            
            @csrf
            <!-- <div class="col-md-6">
                <label for="name" class="form-label">Circle Name</label>
                <input type="text" name="name" id="name" placeholder="circle name" 
                class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="{{ $groups->name}}">
                
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div> -->
            <div class="col-md-12">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" id="location" placeholder="circle location" 
                class="form-control py-2  rounded-lg @error('location') border border-danger @enderror" value="{{ $groups->location}}">
                
                @error('location')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <p class="text-info">{{ $groups->description}}</p>
                <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="5" value="{{ $groups->description}}"></textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex">
                <button type="submit" class="w-100 btn btn-primary m-1">Update Group</button>
                <a href="{{ route('users.group.manage', [$groups->user, $groups->id]) }}" class="m-1 w-100 btn btn-danger ml-2">Cancel</a>
            </div>
            
        </form>
    </div>
</div>
    
@endsection
