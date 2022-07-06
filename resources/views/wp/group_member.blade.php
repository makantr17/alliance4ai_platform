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
                    <button type="submit"class="btn btn-muted btn-sm border-bottom"><i class='fa fa-quote-left' style='color:rgba(216,212,206,255); font-size:15px; padding:1px'></i> Discussion</button>
                </form>
                <form action="{{ route('groups.members.joined', [$groups ->id]) }}" method="get" class="mr-1">
                @csrf
                    <button type="submit"class="btn btn-muted btn-sm "><i class="fa fa-user-circle-o" style="color:rgba(216,212,206,255); font-size:15px; padding:1px"></i> Members</button>
                </form>
                
                <div class="container d-flex flex-row-reverse">
                    <a href="{{ route('groups')}}">
                        <button class="btn btn-muted text-info btn-sm">Back</button>
                    </a>
                
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
                @auth
                    @if ($groups->joinedBy(auth()->user()))
                        <a href="" class="p-1 m-0 text-secondary"> <i class="fa fa-bookmark-o"></i> joined</a>
                    @endif
                @endauth
                </div>
            </div>
        </div>
        <div class="d-flex col-sm-12 gap-2 w-100 justify-content-center flex-wrap align-items-center my-2">
            <nav class="col-sm-10 py-3">
                <div class="">
                    <h3 class="display-7 pb-2 fw-bold text-black" style="color: rgba(9,74,127,255)">{{ $groups-> name}}</h3>
                    <p class="py-1" style="opacity:0.8">{{ $groups-> description}}</p>
                </div>
                <p> <i class="fa fa-map-marker text-danger" aria-hidden="true"></i> <small>{{ $groups-> location}}, </small> <small class="text-info text-right">{{ $groups-> created_at->diffForHumans() }}</small> </p>
                
                    <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
                    </div>
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
    <div class="row justify-content-center col-md-12 bg-light">
        <div class="row bg-white py-2 justify-content-center col-md-10">

            <div class="col-sm-8">
                <div class="my-1 bg-body rounded border">
                <!-- Highlight Futur Discussion -->
                <h5 class="pt-3 pb-2 m-3 fw-bold text-dark border-bottom">Future Discussion Tagged</h5>
                <div class="col-lg-12 pt-3">
                @php $i = 0; @endphp
                    @if ($future_discussions -> count())
                    
                        @foreach($future_discussions as $discussion)
                            @if (str_contains($discussion->groups, $groups->id)) 
                            @php $i += 1 @endphp
                            <!-- USER TOPIC START HERE -->
                            <a href="{{ route('discussion.details', [$discussion->id]) }}" class="list-group-item-action d-flex flex-wrap justify-content-between gap-3 py-3 border-bottom" aria-current="true">
                                <div class="">    
                                    @if ($discussion->category === '1' )
                                        <img src="/images/icon/plan2.png" alt="twbs" width="80" height="" class="rounded flex-shrink-0">
                                    @elseif ($discussion->category === '2' )
                                        <img src="/images/icon/plan4.png" alt="twbs" width="80" height="" class="rounded flex-shrink-0">
                                    @else
                                        <img src="/images/icon/plan7.png" alt="twbs" width="80" height="" class="rounded flex-shrink-0">
                                    @endif
                                </div>
                                <div class="col-sm-10 d-flex gap-2 w-100 justify-content-between align-items-start">
                                    <div>
                                        <p class="mb-2 fw-bold">{{ $discussion-> title}}</p>
                                        <nav class="mb-0 opacity-75">Meeting {{ $discussion-> date}} at {{ $discussion-> start_time}}</nav>
                                        <div>
                                            <small class="opacity-70 text-secondary">by {{ $discussion-> user->name }}</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <!-- Check discussion status -->
                                        @if (($discussion -> date) > Carbon\Carbon::now() && $discussion -> start_time > (Carbon\Carbon::now())->toTimeString() )
                                            <nav class="mb-0 opacity-75 my-1 text-info"></nav>
                                            <!-- add buttons -->
                                            @auth
                                                @if (!$discussion->participatedBy(auth()->user()))
                                                    <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                                                    @csrf
                                                        <button type="submit" class="btn btn-primary btn-sm m-1">register</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('discussion.details', [$discussion->id]) }}" method="get" class="">
                                                    @csrf
                                                        <button type="submit"class="btn btn-secondary btn-sm m-1">Join</button>
                                                    </form>
                                                @endif
                                            @endauth
                                        @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && (
                                            (Carbon\Carbon::now() )->toTimeString() >= $discussion -> start_time && 
                                            $discussion -> end_time  >= (Carbon\Carbon::now())->toTimeString() ))
                                            <nav class="mb-0 opacity-75 my-1 text-warning"><strong>Ongoing</strong></nav>
                                        @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && 
                                            (Carbon\Carbon::now()) ->toTimeString() > $discussion -> end_time )
                                            <nav class="mb-0 opacity-75 my-1 text-light"><i class="fa fa-calendar-times-o fa-1x text-light" aria-hidden="true"></i></nav>
                                        @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && (
                                            $discussion -> start_time  > (Carbon\Carbon::now())->toTimeString()) )
                                            <nav class="mb-0 opacity-75 my-1 text-info"></nav>
                                            <!-- add buttons -->
                                            @auth
                                                @if (!$discussion->participatedBy(auth()->user()))
                                                    <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                                                    @csrf
                                                        <button type="submit" class="btn btn-secondary btn-sm m-1">register</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('discussion.details', [$discussion->id]) }}" method="get" class="">
                                                    @csrf
                                                        <button type="submit"class="btn btn-secondary btn-sm m-1">Join</button>
                                                    </form>
                                                @endif
                                            @endauth
                                        @else
                                            <nav></nav>
                                        @endif
                                        <!-- End -->
                                    </div>
                                </div>
                            </a>
                            <!-- USER TOPIC END HERE -->
                            @endif
                        @endforeach
                    @endif
                    </div>
                    @if($i <= 0 )
                        <nav class="py-2 d-col text-center justify-content-center"><i class="fa fa-braille fa-1x text-secondary" aria-hidden="true"></i> <p style="font-size:12px">no discussion</p></nav>
                    @endif
                </div>
                <!-- Past Discussion -->
                <div class="my-3 bg-body rounded border">
                    <h5 class="pt-3 pb-2 m-3 fw-bold text-dark border-bottom">Past Discussion Tagged</h5>
                    <div class="col-sm-12 py-3">
                        @php $past = 0 @endphp
                        @if ($past_discussions -> count())
                            
                            @foreach($past_discussions as $discussion)
                                @if (str_contains($discussion->groups, $groups->id))
                                @php $past += 1 @endphp 
                                <!-- USER TOPIC START HERE -->
                                <a href="{{ route('discussion.details', [$discussion->id]) }}" class="list-group-item-action d-flex flex-wrap justify-content-between gap-3 py-3 border-bottom" aria-current="true">
                                    <div class="">    
                                        @if ($discussion->category === '1' )
                                            <img src="/images/icon/plan2.png" alt="twbs" width="80" height="" class="rounded flex-shrink-0">
                                        @elseif ($discussion->category === '2' )
                                            <img src="/images/icon/plan4.png" alt="twbs" width="80" height="" class="rounded flex-shrink-0">
                                        @else
                                            <img src="/images/icon/plan7.png" alt="twbs" width="80" height="" class="rounded flex-shrink-0">
                                        @endif
                                    </div>
                                    <div class="col-sm-10 d-flex gap-2 w-100 justify-content-between align-items-start">
                                        <div>
                                            <p class="mb-2 fw-bold">{{ $discussion-> title}}</p>
                                            <nav class="mb-0 opacity-75">Meeting {{ $discussion-> date}} at {{ $discussion-> start_time}}</nav>
                                            <div>
                                                <small class="opacity-70 text-secondary">by {{ $discussion-> user->name }}</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <!-- Check discussion status -->
                                            <nav class="mb-0 opacity-75 my-1 text-danger"><i class="fa fa-calendar-times-o fa-1x text-danger" aria-hidden="true"></i></nav>
                                            <!-- End -->
                                        </div>
                                    </div>
                                </a>
                                <!-- USER TOPIC END HERE -->
                                @endif
                            @endforeach
                        @endif
                        @if($past <= 0 )
                            <nav class="py-2 d-col text-center justify-content-center"><i class="fa fa-braille fa-1x text-secondary" aria-hidden="true"></i> <p style="font-size:12px">no discussion</p></nav>
                        @endif
                    </div>
                    
                </div>
            </div>

            <div class="col-md-4 bg-light border">
                <div class="my-3 p-1 rounded">
                <h6 class=" pb-4 mb-0">Future Makers</h6>
                @if ($group_members -> count())
                    @foreach($group_members as $group_member)
                        <!-- MEMBERS LISTED HERE -->
                        <x-members :group_members="$group_member" />
                        <!-- MEMBERS LISTED STOP HERE -->
                    @endforeach
                @else
                    <p></p>
                @endif

                <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
                    {{ $group_members -> links()}}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection