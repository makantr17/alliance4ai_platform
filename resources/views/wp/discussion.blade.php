@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
<section id="courses-part" class="pb-120 ">       
    <header class="masthead">
        <div class="container px-1 px-lg-1 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center ">
                <div class="col-lg-6 align-self-center pl-5">
                        <h1 class="font-weight-bold" style="color:#ffc000">Future Maker Discussions</h1>
                </div>
                <div class="col-lg-6 align-self-baseline">
                    <!-- <p class="text-white-75 mb-5">Start Alliance4ai can help you build better experience with the Future Maker!</p> -->
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <!-- Navbar -->
        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between py-4 ">
            <div class="col "></div>
            <div class="">
                <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                    
                    
                    <form class="needs-validation pr-2 m-1" novalidate action="{{ route('discussion') }}" method="get">
                        @csrf  
                        <div class="d-flex align-items-center">
                            <select name="period" id="period" style="font-size: 14px; opacity: 0.9;"
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
                            <button class="btn btn-muted border ml-0" style="font-size: 14px;" type="submit"><i class="fa fa-clock-o"></i> Period</button>
                        </div>
                    </form> 
                    <form class="needs-validation pr-2 m-1" novalidate action="{{ route('discussion') }}" method="get">
                        @csrf  
                        <div class="d-flex align-items-center">
                            <select name="category" id="category" style="font-size: 14px; opacity: 0.9;"
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
                            <button class="btn btn-muted ml-0 border" style="font-size: 14px;" type="submit"><i class="fa fa-filter"></i> Filter</button>
                        </div>
                    </form>
                    @auth
                    <div class="dropdown mx-2 p-2 px-3">
                        <p style="font-size: 14px;"> <i class="fa fa-bell-o"></i> Notifications <span class="badge p-1 bg-light border text-dark rounded-pill align-text-bottom">{{ auth()->user()->notifications->where('type', 'App\Notifications\DiscussionCreated')->count()}}</span> </p>
                        <div class="dropdown-content">
                            @foreach (auth()->user()->notifications->where('type', 'App\Notifications\DiscussionCreated') as $notification) 
                            <a href="{{ route('discussion.details', $notification->data['id']) }}" style="font-size: 14px; opacity: 0.9; color:black" class="border-bottom p-1">
                                {{$notification->data['title']}} 
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endauth
                    @auth
                        <form action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="get" class="mr-0">
                        @csrf
                            <button type="submit" class="btn btn btn-info " style=""> New discussion</button>
                        </form>
                    @endauth    
                    
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-12 d-flex gap-2 w-100 justify-content-center pt-0">
            <div class="col-lg-10 ">
                <h3 class="pt-2 mt-2 mb-2 lh-1 text-dark fw-bold"> Discussions </h3>
                <nav class="mb-0 opacity-100 my-1"><p class="text-gray opacity-50">Join Future Makers hosted discussions</p></nav>
                <nav class="mb-0 opacity-100 my-1 text-secondary opacity-40">{{$discussion -> count()}} discussions</nav>
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
                                <img src="/images/icon/Plan2.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                            @elseif ($discussions->category === '2' )
                                <img src="/images/icon/Plan4.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                            @else
                                <img src="/images/icon/Plan7.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                            @endif
                        </div>
                        <div class="col-sm-9 d-flex gap-2 w-100 justify-content-between align-items-start">
                            <div>
                                <p class="pt-2 mt-2 mb-2 lh-1 text-black fw-bold"> {{ Str :: limit($discussions-> title, 45) }} </p>
                                <nav class="mb-0 opacity-100 my-1 text-secondary text-info"> <i class="fa fa-map-marker fa-1x fw-light"></i> {{ $discussions-> location}}</nav>
                                <nav class="mb-0 opacity-100 my-1 text-secondary">  {{ $discussions-> date}}, From</small> {{ $discussions-> start_time}} <small>To</small> {{ $discussions-> end_time}}</nav>
                                <div class="d-flex align-items-start">
                                    <nav class="mb-0 opacity-100 mr-2 text-muted">
                                        <nav class="d-flex mb-0 opacity-100 my-1 text-muted">
                                            @if ($discussions->user->image)
                                                <img src="{{ '/storage/images/'.$discussions->user->id.'/'.$discussions->user->image }}" alt="twbs" width="25" height="25" class="rounded-circle flex-shrink-0 border mr-1">
                                            @else
                                                <img src="/images/cxc.jpg" alt="twbs" width="25" height="25" class="rounded-circle flex-shrink-0 border mr-1">
                                            @endif
                                            <nav>, by {{ $discussions-> user->name}}</nav>
                                        </nav>
                                    </nav>
                                    @if (($discussions -> date) > Carbon\Carbon::now())
                                        <nav class="mb-0 opacity-100 my-1 text-info">upcoming</nav>
                                    @elseif (Carbon\Carbon::now() > ($discussions -> date))
                                        <nav class="mb-0 opacity-100 my-1 text-info">past</nav>
                                    @elseif (($discussions -> date) === Carbon\Carbon::now() && $discussions -> end_time > (Carbon\Carbon::now())->toTimeString() )
                                        <nav class="mb-0 opacity-100 my-1 text-info">past</nav>
                                    @elseif (($discussions -> date) === (Carbon\Carbon::now())->toDateString() && (
                                        (Carbon\Carbon::now() )->toTimeString() >= $discussions -> start_time && 
                                        $discussions -> end_time  >= (Carbon\Carbon::now())->toTimeString() ))
                                        <nav class="mb-0 opacity-100 my-1 text-info">ongoing</nav>
                                    @elseif (($discussions -> date) === (Carbon\Carbon::now())->toDateString() && 
                                        (Carbon\Carbon::now()) ->toTimeString() > $discussions -> end_time )
                                        <nav class="mb-0 opacity-100 my-1 text-info">past</nav>
                                    @elseif (($discussions -> date) === (Carbon\Carbon::now())->toDateString() && (
                                        $discussions -> start_time  > (Carbon\Carbon::now())->toTimeString()) )
                                        <nav class="mb-0 opacity-100 my-1 text-info">upcoming</nav>
                                    @else
                                        <nav class="mb-0 opacity-100 my-1 text-info">past</nav>
                                    @endif
                                   
                                </div>
                                
                            </div>
                            <nav class="opacity-80 text-nowrap">{{ $discussions-> created_at->diffForHumans() }} 
                                <nav> {{ $discussions->registeration->count() }} registered</nav>
                            </nav>
                        </div>
                    </a>
                    @endforeach
                @else
                <nav class="py-2 d-col text-center justify-content-center"><i class="fa fa-braille fa-2x text-secondary" aria-hidden="true"></i> <p style="font-size:12px">no discussion</p></nav>
                @endif
            </div>
            <!-- END Listed Topics here -->
        </div>

        <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
            {{ $discussion -> links()}}
        </div>
        <!-- END CONTENTS HERE -->

    </div> <!-- container -->
</section>
@endsection