@extends('layouts.app')

@section('content')

<div class="container-fluid mb-5">
    
    @if ($group -> count())
      @foreach($group as $groups)
        <div class="my-1 rounded-3">
            <a href="#" class="d-block align-items-center text-dark text-decoration-none">
                <div class="bg-light text-secondary mb-2 text-center">
                    <div class="overflow-hidden" style="max-height: 50vh;">
                        <div class="">
                            @if ($groups-> image )
                                <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" alt="twbs" width="85%" height="500" loading="lazy" class="img-fluid rounded shadow-lg mb-4 rounded">
                            @else
                                <img src="/images/icon-alliance/discussion.png" alt="twbs" width="85%" height="500" loading="lazy" class="img-fluid rounded shadow-lg mb-4 rounded">
                            @endif
                            <!-- <img src="/icons/abstract_background.jpg" class="img-fluid rounded shadow-lg mb-4 rounded" alt="Example image" width="100%" height="500" loading="lazy"> -->
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="d-flex col-sm-12 gap-2 w-100 justify-content-center flex-wrap align-items-center my-2">
        
            <div class="col-sm-10 d-flex my-2 justify-content-right">
                <form action="{{ route('groups.members', [$groups ->id]) }}" method="get" class="mr-1">
                @csrf
                    <button type="submit"class="btn btn-muted btn-sm "><i class='fa fa-quote-left' style='color:rgba(216,212,206,255); font-size:15px; padding:1px'></i> Discussion</button>
                </form>
                <form action="{{ route('groups.members.joined', [$groups ->id]) }}" method="get" class="mr-1">
                @csrf
                    <button type="submit"class="btn btn-muted btn-sm border-bottom"><i class="fa fa-user-circle-o" style="color:rgba(216,212,206,255); font-size:15px; padding:1px"></i> Members</button>
                </form>
                
                <div class="container d-flex flex-row-reverse">
                    <a href="{{ route('groups.members', [$groups ->id]) }}">
                        <button class="btn btn-muted text-info btn-sm">Back</button>
                    </a>
                    @auth
                        @if ($groups->joinedBy(auth()->user()))
                            <form class="mx-1"novalidate  action="{{ route('groups.members.unjoin', [$groups->id]) }}" method="post">
                            @csrf
                                @method('DELETE')
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-muted border text-danger btn-sm my-0">  Unjoin</button>
                                    </div>
                                </div>
                            </form>
                            <a href="" class="pt-1 m-0 text-secondary">joined</a>
                        @endif
                    @endauth
                    @auth
                        @if ($group_members -> count())
                            @if (!$group_members -> contains('user_id', auth()->user()->id ))
                                <form class="mx-1" novalidate action="{{ route('groups_details', [$group[0] ->id] ) }}" method="post">
                                    @csrf
                                    <div class="">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-primary my-3">Join Circle</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @else
                            <form class="mx-1"novalidate  action="{{ route('groups_details', [$group[0] ->id] ) }}" method="post">
                                @csrf
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-primary btn-sm my-0">Join Circle</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endauth
                    
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-12 gap-2 w-100 justify-content-center flex-wrap align-items-center my-2">
            <nav class="col-sm-10 py-3">
                <div class="">
                    <h3 class="display-7 pb-2 fw-bold text-black" style="color: rgba(9,74,127,255)">{{ $groups-> name}}</h3>
                    <small class="opacity-50">{{ $groups-> description}}</small>
                </div>
                <p> <i class="fa fa-map-marker text-danger" aria-hidden="true"></i> <small>{{ $groups-> location}} , </small> <small class="text-info text-right">{{ $groups-> created_at->diffForHumans() }}</small> </p>
                <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                    <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                    <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                    <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j"></div>
                </div>
                
            </nav>
        </div>
      <!-- <hr class="my-1"> -->
      @endforeach
    @else
        <p>No Groups Available or posted</p>
    @endif  
    <!-- <div>
        <h1 class='h1 py-2 pt-5'>Circles</h1>
    </div> -->
    <div class="row justify-content-center col-md-12">
        <div class="row bg-white py-2 justify-content-center col-md-10">
            <div class="col-sm-12">
                <h5 class="pt-1 m-0 fw-bold text-info ">Future Makers</h5>
                @auth
                    @if ($groups->joinedBy(auth()->user()))
                        <a href="" class="p-1 m-0  text-secondary"> <i class="fa fa-bookmark-o"></i> {{ $group_members->count() }} members</a>
                    @endif
                @endauth
                    <div class="row justify-content-center align-items-center bg-white">
                        <!-- START Listed Topics here -->
                        <div class="col-sm-12 mt-5 ">
                            @if ($group_members -> count())
                                @foreach($group_members as $group_member)
                                <a href="#" class="border-bottom list-group-item-action d-flex  justify-content-between gap-3 py-2 my-0 bg-white p-0" aria-current="true">
                                    <div class=" overflow-hidden"  style="max-height: 19vh;">
                                    @if ($group_member ->user->image)
                                        <img class="bd-placeholder-img flex-shrink-0 rounded-circle border shadow-sm" width="80" height="80" src="{{ '/storage/images/'.$group_member->user_id.'/'.$group_member -> user ->image}}" alt="12">
                                    @else
                                        <img class="bd-placeholder-img flex-shrink-0 rounded-circle shadow-sm " width="80" height="80" src="/images/icon-alliance/man.png" alt="default">
                                    @endif
                                    </div>
                                    <div class="col-sm-9 d-flex gap-2 w-100 justify-content-between align-items-center">
                                        <div>
                                            <p class="pt-0 mt-2 mb-2 lh-1 text-black fw-bold"> {{$group_member -> user ->name}} </p>
                                            <p class="pt-0 mt-2 mb-1 lh-1 text-black fw-bold"> {{$group_member -> user ->profession}},  </p>
                                            
                                        </div>
                                        <small class="opacity-80 text-nowrap">{{ $group_member-> created_at->diffForHumans() }} <nav class="mb-0 opacity-100 my-1 text-secondary"> <i class="fa fa-map-marker fa-1x fw-light"></i> <small class="text-black">{{ $group_member -> user -> country}}</small></nav></small>
                                    </div>
                                </a>
                                @endforeach
                            @else
                                <nav class="py-2 d-col text-center justify-content-center"><i class="fa fa-braille fa-2x text-secondary" aria-hidden="true"></i> <p style="font-size:12px">no participants</p></nav>
                            @endif
                        </div>
                        <!-- END Listed Topics here -->
                    </div>

                    <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
                        {{ $group_members -> links()}}
                    </div>
            </div>
        </div>
    </div>
</div>












        


@endsection