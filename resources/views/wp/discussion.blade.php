@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
    <section id="courses-part" class="pb-120 ">
        <div class="container-fluid">
            <div>
                <div class=" text-secondary mb-2 text-center rounded" style="background:#019DE2">
                <div class="py-2">
                    <h1 class="display-6 fw-bold text-light py-2">Discussion</h1>
                    </div>
                        <div class="overflow-hidden" style="max-height: 30vh;">
                            <div class="">
                                <img src="/icons/AI_event_1.jpg" class="img-fluid rounded-3 shadow-lg mb-4 rounded" alt="Example image" width="60%" height="500" loading="lazy">
                            </div>
                            
                        </div>
                    </div>
            </div>

            <!-- Navbar -->
            <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
            <div class="d-flex gap-2 w-100 justify-content-between py-4">
                <div class="col">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                        <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">0</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                    </div>
                </div>
                <div class="">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                        @auth
                        <div class="dropdown mx-2 p-2 px-3">
                            <p>Notifications <span class="badge p-1 bg-light border text-dark rounded-pill align-text-bottom">{{ auth()->user()->notifications->count()}}</span> </p>
                            <div class="dropdown-content">
                                @foreach (auth()->user()->notifications as $notification) 
                                <a href="" class="border-bottom p-1">
                                    {{$notification->data['title']}} 
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endauth
                    

                        
                        <form class="needs-validation pr-2" novalidate action="{{ route('discussion') }}" method="get">
                            @csrf  
                            <div class="d-flex align-items-center">
                                <i class="fa fa-sort pr-2" style="font-size:15px; color:gray"></i>
                                <select name="period" id="period"
                                    class="form-control rounded-lg @error('period') border border-danger @enderror" value="{{ old('period')}}">
                                    <option value="">Select all</option>
                                    <option value="2">Future Discussion</option>
                                    <option value="1">Past Discussion</option>
                                    <option value="0">Ongoing Discussion</option>
                                </select>
                                @error('period')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button class="btn btn-info ml-0" type="submit">Period</button>
                            </div>
                        </form> 
                        <form class="needs-validation pr-2" novalidate action="{{ route('discussion') }}" method="get">
                            @csrf  
                            <div class="d-flex align-items-center">
                                <i class="fa fa-sort pr-2" style="font-size:15px; color:gray"></i>
                                <select name="category" id="category"
                                    class="form-control rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                                    <option value="">Select all</option>
                                    <option value="1">Futur Tech</option>
                                    <option value="2">History & Ethics</option>
                                    <option value="3">Workplace Skills</option>
                                </select>
                                @error('category')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button class="btn btn-info ml-0" type="submit">Filter</button>
                            </div>
                        </form>
                        @auth
                            <form action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="get" class="mr-1">
                            @csrf
                                <button type="submit" class="btn btn-info ">New Discussion</button>
                            </form>
                        @endauth
                        </span>
                    </div>
                </div>
            </div>


            <!-- DISPLAY CONTENTS HERE -->
            <div class="row justify-content-center align-items-center bg-white">
                <!-- START Listed Topics here -->
                <div class="col-sm-10 mt-5 ">
                    @if ($discussion -> count())
                        @foreach($discussion as $discussions)
                        <a href="{{ route('discussion.details', $discussions) }}" class="border-bottom list-group-item-action d-flex flex-wrap justify-content-between gap-3 py-3 my-0 bg-white p-0" aria-current="true">
                            <div class="col-sm-2 overflow-hidden"  style="max-height: 19vh;">
                                @if ($discussions->category === '1' )
                                    <img src="/images/icon/plan2.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                                @elseif ($discussions->category === '2' )
                                    <img src="/images/icon/plan4.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                                @else
                                    <img src="/images/icon/plan7.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                                @endif
                            </div>
                            <div class="col-sm-9 d-flex gap-2 w-100 justify-content-between align-items-start">
                                <div>
                                    <p class="pt-2 mt-2 mb-2 lh-1 text-black fw-bold"> {{$discussions-> title}} </p>
                                    <nav class="mb-0 opacity-100 my-1 text-secondary"> <i class="fa fa-map-marker fa-1x fw-light"></i> <small class="text-black">{{ $discussions-> location}}</small></nav>
                                    <nav class="mb-0 opacity-100 my-1 text-secondary"><i class="fa fa-calendar fa-1x fw-light"></i>  {{ $discussions-> date}}, From</small> {{ $discussions-> start_time}} <small>To</small> {{ $discussions-> end_time}}</nav>
                                    <div class="d-flex align-items-start">
                                        @if (($discussions -> date) > Carbon\Carbon::now() && $discussions -> start_time > (Carbon\Carbon::now())->toTimeString() )
                                            <nav class="mb-0 opacity-100 my-1 text-muted"><small>upcoming</small></nav>
                                        @elseif (($discussions -> date) === (Carbon\Carbon::now())->toDateString() && (
                                            (Carbon\Carbon::now() )->toTimeString() >= $discussions -> start_time && 
                                            $discussions -> end_time  >= (Carbon\Carbon::now())->toTimeString() ))
                                            <nav class="mb-0 opacity-100 my-1 text-muted"><small>ongoing</small></nav>
                                        @elseif (($discussions -> date) === (Carbon\Carbon::now())->toDateString() && 
                                            (Carbon\Carbon::now()) ->toTimeString() > $discussions -> end_time )
                                            <nav class="mb-0 opacity-100 my-1 text-muted"><small>past</small></nav>
                                        @elseif (($discussions -> date) === (Carbon\Carbon::now())->toDateString() && (
                                            $discussions -> start_time  > (Carbon\Carbon::now())->toTimeString()) )
                                            <nav class="mb-0 opacity-100 my-1 text-muted"><small>upcoming</small></nav>
                                        @else
                                            <nav class="mb-0 opacity-100 my-1 text-muted"><small>past</small></nav>
                                        @endif
                                        <nav class="mb-0 opacity-100 my-1 text-muted"><small>, hosted by {{ $discussions-> user->name}}</small></nav>
                                    </div>
                                    
                                </div>
                                <small class="opacity-80 text-nowrap">{{ $discussions-> created_at->diffForHumans() }} 
                                    <nav> {{ $discussions->registeration->count() }} registered</nav>
                                    <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/5256931-kg.jpeg" title="Abhishek Kumar" alt="r">
                                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/10161132-gr.jpg" title="Jason Sykes" alt="s">
                                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/10332673-kg.jpg" title="Ajith Pushparaj" alt="j"></div>
                                </small>
                            </div>
                        </a>
                        @endforeach
                    @else
                        <p>No Discussion Available or posted</p>
                    @endif
                </div>
                <!-- END Listed Topics here -->
            </div>
            <!-- END CONTENTS HERE -->

            
        </div> <!-- container -->
    </section>
@endsection
