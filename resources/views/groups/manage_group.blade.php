@extends('layouts.app')

@section('content')



@auth
    <x-menu />
@endauth

<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="bg-light p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <div class="bg-dark text-secondary px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-white">My Circles</h1>
            </div>
            <div class="overflow-hidden" style="max-height: 15vh;">
                <div class="container px-3">
                    <img src="/icons/abstract_background.jpg" class="img-fluid rounded-3 shadow-lg mb-4" alt="Example image" width="90%" height="500" loading="lazy">
                </div>
            </div>
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">2</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div>
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.creategroups',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-light">New Circle</button>
                        </form>

                        <form action="{{ route('group.addmember',  $group[0]->name) }}" method="get" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">Invite</button>
                        </form>

                        <form action="" method="post" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">Collaborators</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>


<div class="row">
    <!-- START list of Discussions -->
    <div class="col-sm-5">
        <div class="list-group bg-light">
            <h6 class="p-2">Created</h6>
            @if ($group -> count())
                @foreach($group as $groups)
                <a href="" class="list-group-item list-group-item-action border d-block gap-3 py-2 m-2 bg-white" aria-current="true">
                    <div class="d-flex justify-content-between mb-2">
                        @if ($groups-> image )
                            <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm border border-info p-1">
                        @else
                            <img src="/images/icon-alliance/discussion.png" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-warning p-1">
                        @endif
                        <small class="opacity-50 text-nowrap">{{ $groups-> created_at->diffForHumans() }}</small>
                    </div>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $groups-> titre}}</h6>
                            <nav>{{ $groups-> description}}</nav>
                            <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $groups-> count() }}</span> </div> </div>
                            </div>
                        </div>
                        
                    </div>
                </a>
                @endforeach
            @else
                <span>No discussion</span>
            @endif
        </div>
    </div>
    <!-- END LIST OF DISCUSSION -->
    <!-- Participated POSTED MESSAGE  -->
    <div class="col-sm-5">
        <div class="list-group bg-light">
            <h6 class="p-2 mb-0">Particpants</h6>
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
                <div class="col-lg-12 d-block justify-content-center align-items-center text-center mb-2">
                    <img src="/images/icon-alliance/chat1.png" alt="twbs" width="220" height="" class="flex-shrink-0 p-1">
                    @auth
                        <form action="{{ route('users.createtopics',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-info">Add Topic</button>
                        </form>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <!-- END POSTED MESSAGE -->
</div>



@endsection