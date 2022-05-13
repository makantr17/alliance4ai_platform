@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

@auth
    <x-menu />
@endauth
<div class="container-fluid">
    <!-- Score ################### -->
    <div class="bg-info p-5 rounded d-flex row align-items-center ">
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
            <h3 class="text-light mb-2">Progress Tracker Score <strong>15/20</strong></h3>
            <div class="">
                <div class="card-body">
                    <h4 class="small font-weight-bold text-light">Shared Learning<span
                            class="float-right">20%</span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{($learning -> count() * 100)/ $count_learning }}%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold text-light">Topics shared <span
                            class="float-right">{{($topics -> count() * 100)/ $count_topic }}%</span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{($topics -> count() * 100)/ $count_topic }}%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold text-light">Question answered <span
                            class="float-right">60%</span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: 60%"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold text-light">Hosted Discussion <span
                            class="float-right">{{($discussion -> count() * 100)/ $count_discussion }}%</span></h4>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{($discussion -> count() * 100)/ $count_discussion }}%"
                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    <!-- End Score ######################" -->


    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Annual) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Tasks Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Pending Requests Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>





    <div class="container-fluid mt-20">
        <div class="row">
                <div class="col-lg-3 border p-2 rounded bg-light ">
                    <!-- START Listed Topics here -->
                    <h6 class="p-2 fw-bold my-2 ">Shared Topics 
                        <span class="badge p-1 bg-secondary border text-light rounded-pill align-text-bottom">{{$topics -> count()}}</span></h6>
                    @if ($topics -> count())
                        @foreach($topics as $topic)
                        <a href="#" class="list-group-item list-group-item-action border d-flex gap-3 py-2 my-0 bg-white shadow-sm" aria-current="true">
                            <!-- COVER DISCUSSION START HERE ########### -->
                            <div class="d-flex mb-1 overflow-hidden" >
                                @if ($topic -> image)
                                    <img src="{{ '/storage/images/topic/'.$topic->topic.'/'.$topic->image }}" alt="twbs" width="40" height="40" class="rounded-circle border mr-2 flex-shrink-0">
                                @else
                                    <img src="/images/icon-alliance/message.png" alt="twbs" width="30" class="rounded-circle flex-shrink-0">
                                @endif
                                <div class="">
                                    <nav class="opacity-50 text-nowrap">By {{ $topic->topic }}</nav>
                                    <small class="opacity-50 text-nowrap">By {{ $topic->user->name }}</small>
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
                        <span class="badge p-1 bg-danger border text-light rounded-pill align-text-bottom">{{$discussion -> count()}}</span></h6>
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
                    <h6 class="p-2 fw-bold my-2">List of Circle Joined <span class="badge p-1 bg-info border text-light rounded-pill align-text-bottom">{{$joinedCircle -> count()}}</span></h6>
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
                    <h6 class="p-2 fw-bold my-2">Shared Groups 
                        <span class="badge p-1 bg-warning border text-light rounded-pill align-text-bottom">{{$groups -> count()}}</span></h6>
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
                        <span class="badge p-1 bg-light border text-dark rounded-pill align-text-bottom">{{$myCircle -> count()}}</span></h6>
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
