
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
                        <form action="{{ route('users.creategroups',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Create new Circle</button>
                        </form>
                        <form action="{{ route('group.addmember',  $group[0]->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Add member</button>
                        </form>
                        <form action="" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-braille"></i> Collaborators</button>
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
        @if ($group -> count())
            @foreach($group as $groups)
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
            @endforeach
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
            <form action="" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>
    </div>
    

    <div class="col-lg-8 py-1">
        <div class="">

        @if ($group[0] ->group_member -> count())
            @foreach($group[0] ->group_member as $group_members)
            <a href="" class="list-group-item list-group-item-action border d-flex gap-3 py-2 m-2 bg-white" aria-current="true">
                    @if ($group_members->user->image)
                        <img src="{{ '/storage/images/'.$group_members->user->id.'/'.$group_members->user->image }}" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-secondary">
                    @else
                        <img src="/images/user.png" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-secondary">
                    @endif
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $group_members-> user->name}}</h6>
                            <nav>{{ $group_members-> user-> email}}</nav>
                        </div>
                        <small class="opacity-50 text-nowrap">Joined {{ $group_members-> created_at->diffForHumans() }}</small>
                    </div>
            </a>
            @endforeach
        @else
            <p>no users</p>
        @endif
            
        </div>
    </div>
</div>
    
@endsection

