@extends('layouts.app')

@section('content')


@auth
    <x-menu />
@endauth

<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="bg-light p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <!-- HEADER SLIDE START HERE -->
        <div class="px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-dark">My Circles</h1>
            </div>
            
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between">
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
                            <button type="submit"class="btn btn-info">New Circle</button>
                        </form>

                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>

<div class="row align-items-center justify-content-center">
    <div class="col-md-10">
        <div class="list-group">
            @if ($groups -> count())
                @foreach($groups as $group)
                <a href="{{ route('users.group.manage', [$group->user, $group->id]) }}" class="list-group-item list-group-item-action border d-flex gap-3 py-2 m-2 bg-white" aria-current="true">
                    @if ($group-> image )
                        <img src="{{ '/storage/images/group/'.$group->name.'/'.$group->image }}" alt="twbs" width="130" height="120" class="rounded flex-shrink-0 border border-info shadow-sm">
                    @else
                        <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 border border-warning  p-2 shadow-sm">
                    @endif
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="my-2">{{ $group-> name}}</h6>
                            <nav class="mb-0">{{ $group-> titre}}</nav>
                            <nav class="mb-0"><strong>Location </strong> {{ $group-> location}}</nav>
                            <div class=" d-flex flex-wrap align-items-center pt-0">
                                
                                @auth
                                    <!-- START CHECK IF USER HAS FILE OF CONTENT -->
                                    @if ($group->image)
                                        <form action="" method="get" class="mr-1 m-2">
                                        @csrf
                                            <button type="submit"class="btn btn-light border btn-sm">Modify cover</button>
                                        </form>
                                    @else
                                        <form action="" method="get" class="mr-1 m-2">
                                        @csrf
                                            <button type="submit"class="btn btn-light border btn-sm">Add cover</button>
                                        </form>
                                    @endif
                                    <!-- END CHECK IF USER HAS FILE -->
                                    <!-- START DELETE TOPICS -->
                                    <form action="" method="get" class="mr-1">
                                    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light border btn-sm">Update content</button>
                                    </form>
                                    <!-- END DELETE TOPICS -->
                                    <form action="" method="post" class="mr-1">
                                    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                        <small class="opacity-50 text-nowrap">{{ $group-> created_at->diffForHumans() }}</small>
                    </div>
                </a>
                @endforeach
            @else
                <div class="col-lg-12 d-block justify-content-center align-items-center text-center mb-2">
                    <img src="/images/icon-alliance/group-users.png" alt="twbs" width="220" height="" class="flex-shrink-0 p-1">
                    @auth
                        <form action="{{ route('users.creategroups',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-info">Add Group</button>
                        </form>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <!-- END LIST OF DISCUSSION -->
</div>



@endsection