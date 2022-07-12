@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

@auth
    <x-menu />
@endauth
<div class="container-fluid">
    <!-- Score ################### -->
    <div class="bg-success p-5 rounded d-flex row align-items-center ">
        <div class="profile-images col-sm-3">
            @if (auth()->user()->image)
                <img class="my-3 img-circle" style="border-radius: 150px;" width="150" height="150" 
                src="{{ '/storage/images/'.auth()->user()->id.'/'.auth()->user()->image}}" alt="">
            @else
                <img class=" img-circle" style="border-radius: 150px; margin:1rem" width="150" height="150" 
                src="/images/icon-alliance/man.png" alt="default">
            @endif
            <p class="text-light">{{ $user->name}}</p>
            <p class="text-light"><i class="fa fa-map-marker"></i> <strong></strong>{{ $user->country}}</p>
        </div>
        <div class="col-sm-5 mx-auto ">
            <h4 class="text-light mb-2">Progress Tracker Score <strong>15/20</strong></h4>
            <div class="">
                <div class="card-body">
                    <h4 class="small font-weight-bold text-light">Shared Learning<span
                            class="float-right">{{ $learning -> count() > 0 ? ($learning -> count() * 100)/ $count_learning : 0}}%</span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $learning -> count() > 0 ? ($learning -> count() * 100)/ $count_learning : 0}}%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold text-light">Topics shared <span
                            class="float-right">{{ $topics -> count() > 0 ? ($topics -> count() * 100)/ $count_topic : 0}}%</span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $topics -> count() > 0 ? ($topics -> count() * 100)/ $count_topic : 0}}%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold text-light">Circle Joined<span
                            class="float-right">{{ $joinedCircle -> count() > 0 ? ($joinedCircle -> count() * 100)/ $count_group : 0}}%</span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: {{ $joinedCircle -> count() > 0 ? ($joinedCircle -> count() * 100)/ $count_group : 0}}%"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold text-light">Hosted Discussion 
                         <span class="float-right">{{ $discussion -> count() > 0 ? ($discussion -> count() * 100)/ $count_discussion : 0}}%</span>
                    </h4>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ $discussion -> count() > 0 ? ($discussion -> count() * 100)/ $count_discussion : 0}}%"
                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <!-- End Score ######################" -->





    <div class="container-fluid mt-20">
        <div class="row">
                <div class="col-lg-3 border p-2 rounded bg-light ">
                    <!-- START Listed Topics here -->
                    <h6 class="p-2 fw-bold my-2 ">Topics Shared
                        <span class="fw-light text-info">{{$topics -> count()}} topics</span></h6>
                    @if ($topics -> count())
                        @foreach($topics as $topic)
                        <a href="#" class="list-group-item list-group-item-action border d-flex gap-3 py-2 my-0 bg-white " aria-current="true">
                            <!-- COVER DISCUSSION START HERE ########### -->
                            <div class="d-flex overflow-hidden" >
                                <div class="">
                                    <nav class="opacity-100 fw-bold text-nowrap">By {{ $topic->topic }}</nav>
                                    <small class="opacity-50 text-nowrap">{{ $topic->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                    <div class="col-lg-12 text-center"> No topic posted</div>
                    @endif
                </div>

                <!-- START CONTENT Topics here  #################################################-->
                <div class="col-lg-3 border p-2 rounded bg-light">
                    <h6 class="p-2 fw-bold my-2">List of Discussion
                        <span class="fw-light text-info">{{$discussion -> count()}} discussion</span></h6>
                    @if ($discussion-> count())
                        @foreach($discussion as $discussions)
                        <a href="#" class="list-group-item list-group-item-action border d-flex gap-3 py-2 my-0 bg-white shadow-sm" aria-current="true">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <p class="fw-light">{{ $discussions-> title}} </p>
                                    <small class="opacity-50 text-nowrap">{{ $discussions-> created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                    <div class="col-lg-12 text-center"> No content added</div>
                    @endif

                </div>
                <!-- END CONTENT Topics here  #################################################-->


                <!-- START Join here #######################" -->
                <div class="col-lg-3 border p-2 rounded bg-light">
                    <h6 class="p-2 fw-bold my-2">List of Circle Joined 
                        <span class="fw-light text-info">{{$joinedCircle -> count()}} joined</span></h6>
                    @if ($joinedCircle-> count())
                        @foreach($joinedCircle as $joinedCircles)
                        <a href="" class="list-group-item list-group-item-action border d-flex gap-3 py-2 my-0 bg-white shadow-sm" aria-current="true">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <nav>{{ $joinedCircles->group->name}}</nav>
                                    <small class="opacity-50 text-nowrap">{{ $joinedCircles-> created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                        <div class="col-lg-12 text-center">Haven't joined any group</div>
                    @endif
                </div>


                <!-- START Shared here -->
                <div class="col-lg-3 border p-2 rounded bg-light">
                    <h6 class="p-2 fw-bold my-2">Groups Shared 
                        <span class="fw-light text-info">{{$groups -> count()}} groups</span></h6>
                    <!-- START Prompts here #######################" -->
                    @if ($groups-> count())
                        @foreach($groups as $group)
                        <a href="" class="list-group-item list-group-item-action border d-flex gap-3 py-2 my-0 bg-white shadow-sm" aria-current="true">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <nav>{{ $group-> name}}</nav>
                                    <small class="opacity-50 text-nowrap">{{ $group-> created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                        <div class="col-lg-12 text-center">No comment</div>
                    @endif
                </div>


                <!-- START Notifications here -->
                <div class="col-lg-3 border p-2 rounded bg-light">
                    <h6 class="p-2 fw-bold my-2">My Circle 
                        <span class="fw-light text-info">{{$myCircle -> count()}} circles</span></h6>
                    @if ($myCircle-> count())
                        @foreach($myCircle as $myCircles)
                        <a href="" class="list-group-item list-group-item-action border d-flex gap-3 py-2 my-0 bg-white shadow-sm" aria-current="true">
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <nav>{{ $myCircles-> name}}</nav>
                                    <small class="opacity-50 text-nowrap">{{ $myCircles-> created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                        <div class="col-lg-12 text-center">no circle created</div>
                    @endif
                </div>
            <!-- END Topics Notification here -->

        <!-- END CONTENTS HERE -->
        </div>
    </div>

    
</div> 

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
