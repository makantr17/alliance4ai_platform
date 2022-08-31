

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
                <h1 class="display-6 fw-bold text-dark">Discussions</h1>
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
                        <form action="{{ route('users.creatediscussion',  auth()->user()) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Host discussion</button>
                        </form>
                        <form action="{{ route('users.updatediscussion',  [auth()->user(), $discussion] ) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-edit"></i> Edit</button>
                        </form>
                        <form action="{{ route('users.discussion',  auth()->user()) }}" method="get" class="mr-1">
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
        @if ($discussion -> count())
            <div class="mb-4">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between mb-2">
                        @if ($discussion->category === '1' )
                            <img src="/images/icon/plan2.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                        @elseif ($discussion->category === '2' )
                            <img src="/images/icon/plan4.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                        @else
                            <img src="/images/icon/plan7.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                        @endif
                    </div>
                    <h6 class="display-7 py-1 fw-bold ">{{ $discussion-> title}}</h6>
                    <p style="font-size: 14px"><strong class="text-primary">Description </strong> {{ $discussion-> description}}</p>
                    <p><small>hosted by</small> <small class="text-info">{{ $discussion-> user->name}}</small></p>
                    <small class="opacity-50 text-nowrap">{{ $discussion-> created_at->diffForHumans() }}</small>
                </div>
                
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <small></small>
            <form action="{{ route('discussion.details', $discussion) }}" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>

        <div class="p-3 gray-bg my-2 rounded">
            <p class="text-secondary pb-2">Delete Discussion</p>
            <button  id="link" class="btn btn-danger">Delete</button>

            <!-- <div class="btn btn-primary" id="link">Open meeting</div> -->

            <!-- Modal Pop up confirmation -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                    <h5 class="modal-title">Confirmation</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete the <span class="text-primary">{{ $discussion-> title}}</span>  discussion ?</p>
                </div>
                <div class="modal-footer">
                    @auth
                        <form action="{{ route('users.discussion.delete', [$discussion->user, $discussion->id]) }}" method="post" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" id="link" class="btn btn-danger">Delete</button>
                        </form>
                    @endauth
                    <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                    </div>
                </div>
            </div>
            <!-- End Pop up confirmation  -->





        </div>
    </div>
    <div class="col-lg-8 mx-2 bg-light py-2">
        <div class="d-flex justify-content-between align-items-center px-0 py-2">
                <div class="text-center align-items-center">
                    <div >
                        <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j"></div>
                        </div>
                        @if (($discussion -> date) > Carbon\Carbon::now() && $discussion -> start_time > (Carbon\Carbon::now())->toTimeString() )
                            <nav class="mb-0 opacity-75 my-1 text-black"><small>upcoming</small></nav>
                            @auth
                                @if (!$discussion->participatedBy(auth()->user()))
                                    <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                                    @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">register</button>
                                    </form>
                                @endif
                            @endauth
                        @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && (
                            $discussion -> start_time  > (Carbon\Carbon::now())->toTimeString()) )
                            <nav class="opacity-75 my-1 text-black"><small>upcoming</small></nav>
                            @auth
                                @if (!$discussion->participatedBy(auth()->user()))
                                    <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                                    @csrf
                                        <button type="submit" class="btn btn-secondary">register</button>
                                    </form>
                                @else
                                    <form action="" method="get" class="">
                                    @csrf
                                        <button type="submit"class="btn btn-success">Join</button>
                                    </form>
                                @endif
                            @endauth
                        @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && (
                            (Carbon\Carbon::now() )->toTimeString() >= $discussion -> start_time && 
                            $discussion -> end_time  >= (Carbon\Carbon::now())->toTimeString() ))
                            <!-- If ongoing or live -->
                            @auth
                                @if (!$discussion->participatedBy(auth()->user()))
                                    <form  action="{{route('discussion.details', $discussion) }}" method="POST" class="">
                                    @csrf
                                        <button type="submit" class="btn btn-secondary btn-sm">register live</button>
                                    </form>
                                @else
                                    <form action="" method="get" class="">
                                    @csrf
                                        <button type="submit"class="btn btn-success btn-sm">Join live</button>
                                    </form>
                                @endif
                            @endauth
                        @elseif (($discussion -> date) === (Carbon\Carbon::now())->toDateString() && 
                            (Carbon\Carbon::now()) ->toTimeString() > $discussion -> end_time )
                            <nav class="mb-0 opacity-75 my-1 text-black"><small>past-meeting</small></nav>
                        
                        @else
                            <nav class="mb-0 opacity-75 my-1 text-black"><small>past-meeting</small></nav>
                        @endif
                        
                    </div>
                </div>
        <div class="list-discussion">
            @if ($discussion-> count())
                <div href="" class="d-col gap-3 d-flex justify-content-between pt-0" aria-current="true">
                    <nav class="opacity-100 text-nowrap py-1"><strong>Country</strong></nav>
                    <nav class="opacity-100 text-nowrap py-1">{{ $discussion-> location}}</nav>
                </div>
                <div href="" class="d-col gap-3 d-flex justify-content-between pt-0" aria-current="true">
                    <nav class="opacity-100 text-nowrap py-1"><strong>admin</strong></nav>
                    <nav>{{ $discussion-> admin_1}}</nav>
                </div>
                <div href="" class="d-col gap-3 d-flex justify-content-between pt-0" aria-current="true">
                    <nav class="opacity-100 text-nowrap py-1"><i class="fa fa-time"></i><strong>Time</strong> </nav>
                    <nav>From {{ $discussion-> start_time}} To {{ $discussion-> end_time}}</nav>
                </div>
                
            @endif
            <div class="pt-3">
                @if (sizeof($topics) > 0 )
                    <nav class="opacity-100 text-muted py-0"><i class="fa fa-external-link pr-1"></i> Read the ressources related to the topic <br>
                        <a class="py-1" href="{{ route('topics.details', [$topics[0]-> id]) }}">{{ $topics[0] -> topic}}</a>
                    </nav>
                @endif
            </div>
        </div>
    </div>

</div>
    
@endsection

