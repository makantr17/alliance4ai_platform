
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
                <h1 class="display-6 fw-bold text-dark">Hackathon</h1>
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
                        <form action="{{ route('users.create_hackerthon',  auth()->user()) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Create new Hackathon</button>
                        </form>
                        <form action="{{ route('users.hackerthon.manage', [$hackerthon[0]->user, $hackerthon[0]->id]) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"> Details</button>
                        </form>
                        <form action="{{ route('users.update_hackerthon',  $hackerthon[0]-> id) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Edit</button>
                        </form>
                        <form action="{{ route('users.hackerthon.manage.competitors', [auth()->user(), $hackerthon[0]]) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm">Participants</button>
                        </form>
                        <form action="{{ route('users.hackerthon',  auth()->user()) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-arrow-left pr-1"></i> Back</button>
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
        @if ($hackerthon)
            <div class="mb-4">
                <div class="container-fluid">
                    <h4 class="display-7 py-1 fw-bold ">{{ $hackerthon[0]-> title}}</h4>
                    <p style="font-size: 14px"><strong class="text-primary">Start at </strong> {{ $hackerthon[0]-> start_date}}</p>
                    <p style="font-size: 14px"><strong class="text-primary">Deadline </strong> {{ $hackerthon[0]-> deadline}}</p>
                    <p><small>hosted by</small> <small class="text-info">{{ $hackerthon[0]-> user->name}}</small></p>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
            <form action="{{ route('hackathons.details', [$hackerthon[0]->id]) }}" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>
    </div>
    

    <div class="col-lg-8 py-1">
      <div class="">
            <div class="">
                @if($hackerthon)
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="overview-description">
                                <div class="singel-description pt-30 pb-10">
                                    <h3 class="fw-bold text-info mt-1 py-2">Participants</h3>
                                    <nav class="text-muted">list of competitors participating to this Hackerthon</nav>
                                </div>
                                <div class="list-group pt-3">
                                    @if ($hackerthon[0]->competitors -> count())
                                        @foreach($hackerthon[0]->competitors as $competitor)
                                        <a href="{{ route('users.score', $competitor->user->name) }}" class=" list-group-item-action d-flex gap-3 px-1 py-3 border-bottom" aria-current="true">
                                            
                                            @if ($competitor->user->image )
                                                <img src="{{ '/storage/images/'.$competitor->user_id.'/'.$competitor->user->image }}" alt="twbs" width="70" height="70" class="rounded-circle border border flex-shrink-0">
                                            @else
                                                <img src="/images/cxc.jpg" alt="twbs" width="70" height="70" class="rounded-circle border border-info p-1 flex-shrink-0">
                                            @endif
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <nav class="mb-0 fw-bold text-dark"> {{ $competitor->user->name}} </nav>
                                                    <small class="text-muted" >From {{ $competitor->user->city}}, {{ $competitor->user->country}}</small>
                                                    <br><strong class="text-muted">{{ $competitor->user->profession}}</strong>
                                                </div>
                                                <small class="opacity-70 text-nowrap">{{ $competitor-> created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                        @endforeach

                                    @else
                                        <div class="d-flex justify-content-center">
                                            <i class="fa fa-hourglass-half pt-5 pb-2 fa-3x"></i> <br>
                                        </div>
                                        <div class="text-muted text-center col-12">
                                            <a href="">join </a>
                                              the hackerthon;
                                        </div>
                                    @endif


                                </div>


                                
                            </div> <!-- overview description -->
                        </div>
                    </div> 
                @else
                    <p></p>
                @endif
            </div>
          </div>
    </div>
</div>
    
@endsection