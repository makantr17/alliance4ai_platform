@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

<div class="container-fluid ml-0 row justify-content-center align-items-center bg-light">
    @if ($discussion -> id)
    <div class="col-sm-9 list-group-item list-group-item-action border d-block gap-3 py-3 bg-white mb-2">
        <div class="d-block justify-content-center overflow-hidden mb-2" style="max-height: 40vh;">
            @if ($discussion-> files )
                <img src="{{ '/storage/images/discussion/'.$discussion->id.'/'.$discussion->files }}" alt="twbs" width="100%" class="flex-shrink-0 shadow-sm mr-3 my-1">
            @else
                <img src="/images/-min.jpg" alt="twbs" width="100%"  class="rounded flex-shrink-0 shadow-sm p-1">
            @endif
        </div>
        <div class="container d-flex flex-row-reverse">
            <a href="{{ route('discussion')}}">
                <button class="btn btn-muted  btn-sm text-info"> <i class="fa fa-arrow-left pr-1" aria-hidden="true"></i> Back</button>
            </a>
        </div>
                <h5 class="mb-1 pt-4 m-0">{{$discussion-> title}} </h5>
                <small class="text-muted m-0 p-0">By- {{ $discussion-> user->name }}</small>
        <div class="d-flex gap-2 w-100 justify-content-between pb-2 border-bottom">
            <div>
                @if ($discussion->category === '1' )
                    <img src="/images/icon/Plan2.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                @elseif ($discussion->category === '2' )
                    <img src="/images/icon/Plan4.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                @else
                    <img src="/images/icon/Plan7.png" alt="twbs" width="50" height="" class="rounded flex-shrink-0">
                @endif
                    <small class="opacity-100 text-nowrap"><i class="fa fa-calendar fa-1x fw-light"></i> Meeting: {{ $discussion-> date }}</small>   
            </div>
            <div class="d-flex justify-content-between align-items-center px-0 pt-0">
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
        </div>

        <div class="mt-3 pt-2">
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
            <div class="row my-1 py-2"></div> 
        </div>
    </div>
    @endif  

    
</div> 

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
