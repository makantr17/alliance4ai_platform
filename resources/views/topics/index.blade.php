@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

<header class="masthead2">
    <div class="container px-1 px-lg-1 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-6 align-self-end">
                <h1 class="text-black font-weight-bold">Topics</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-6 align-self-baseline">
                <!-- <p class="text-white-75 mb-5">Start Alliance4ai can help you build better experience with the Future Maker!</p> -->
            </div>
        </div>
    </div>
</header>

<div class="container-fluid col-xxl-8 px-0 py-2 px-4 mb-3">
    <div class="rounded">

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="mx-5 mb-3">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div class="col">
                    <div class=" d-flex flex-wrap align-items-center px-0"></div>
                </div>
                <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                    @auth
                        <div class="dropdown mx-2 p-2 px-3">
                            <p style="font-size: 14px; opacity: 0.7;"> <i class="fa fa-bell-o"></i> Notifications <span class="badge p-1 bg-light border text-dark rounded-pill align-text-bottom">{{ auth()->user()->notifications->where('type', 'App\Notifications\TopicCreated')->count()}}</span> </p>
                            <div class="dropdown-content">
                                @foreach (auth()->user()->notifications->where('type', 'App\Notifications\TopicCreated') as $notification) 
                                <a href="{{ route('topics.details', $notification->data['id']) }}" style="font-size: 14px; opacity: 0.7; color:black" class="border-bottom p-1">
                                    {{$notification->data['topic']}} 
                                </a>
                                @endforeach
                            </div>
                        </div>
                    @endauth
                    <form class="needs-validation pr-2 m-1" novalidate action="{{ route('topics') }}" method="get">
                        @csrf  
                        <div class="d-flex align-items-center">
                            <!-- <i class="fa fa-sort pr-2" style="font-size:20px"></i> -->
                            <select name="category" id="category" style="font-size: 14px; opacity: 0.7;"
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
                            <button class="btn btn-info ml-0" style="font-size: 14px;" type="submit">Filter</button>
                        </div>
                    </form>
                    @auth
                        <form action="{{ route('users.createtopics',  auth()->user()) }}" method="get" class="m-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" style="font-size: 14px;" class="btn btn-info">New topic</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>

<div class="col-sm-12 d-flex justify-content-center align-items-start mb-3">
    <div class="col-sm-10 d-flex gap-2 w-100 justify-content-between align-items-start">
        <div>
            <h4 class="pt-2 mt-2 mb-2 lh-1 text-info fw-bold"> Future Makers Topics </h4>
            <nav class="mb-0 opacity-100 my-1"><p class="text-gray opacity-50">Learn from Future Makers, post your topics</p></nav>
            <nav class="mb-0 opacity-100 my-1 text-secondary opacity-40"> {{ $topics -> count() }} topics</nav>
        </div>
        <small class="opacity-80 text-nowrap">      
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="" height="80" class="flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/icon/bg-dasha4ai.png" title="Abhishek Kumar" alt="r">
            </div>
        </small>
    </div>
</div>



<!-- display all elements -->
<div class="row justify-content-center align-items-center bg-white">
    <!-- START Listed Topics here -->
    <div class="col-sm-10 mt-4 ">
        @if ($topics -> count())
            @foreach($topics as $topic)
            <a href="{{ route('topics.details', $topic) }}" class=" list-group-item-action d-flex flex-wrap justify-content-between gap-3 py-3 my-0 bg-white mb-1 p-0" aria-current="true">
                <div class="col-sm-2 overflow-hidden"  style="max-height: 14vh;">
                    @if ($topic->category === '1' )
                        <img src="/icons/background_futurtech.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                    @elseif ($topic->category === '2' )
                        <img src="/icons/background_fm.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                    @else
                        <img src="/icons/background_education.png
                        " alt="twbs" width="" height="" class="rounded flex-shrink-0">
                    @endif
                </div>
                <div class="col-sm-9 d-flex gap-2 w-100 justify-content-between align-items-start border-bottom">
                    <div>
                        <h5 class="py-2 mt-1 mb-0 lh-1 text-black fw-bold"> {{Str :: limit($topic-> topic, 50)}} </h5>
                        <!-- <p class="p-0">{{ Str :: limit($topic-> description, 50) }}...</p> -->
                        <nav class="mb-0 opacity-100 my-1 text-muted">
                            @if ($topic->user->image)
                                <img src="{{ '/storage/images/'.$topic->user->id.'/'.$topic->user->image }}" alt="twbs" width="20" height="20" class="rounded-circle flex-shrink-0">
                            @else
                                <img src="/images/cxc.jpg" alt="twbs" width="20" height="20" class="rounded-circle flex-shrink-0">
                            @endif
                            <small>, by {{ $topic-> user->name}}</small>
                        </nav>
                        
                        <nav class="mb-0 opacity-100 my-0 text-secondary"> 
                            @if ($topic->category === '1' )
                                <small class="text-info"> Future Tech</small>
                            @elseif ($topic->category === '2' )
                                <small class="text-info">History & Ethics</small>
                            @else
                                <small class="text-info">Workplace Skills</small>
                            @endif
                        </nav>
                        
                    </div>
                    
                    <div>
                        <small class="opacity-80 text-nowrap text-info">{{ $topic-> created_at->diffForHumans() }}</small>
                        <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                            
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
                        </div>
                       
                    </div>
                </div>
            </a>
            @endforeach
        @else
            <p>No Topics Available or posted</p>
        @endif
    </div>
    <!-- END Listed Topics here -->
    <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
        {{ $topics -> links()}}
    </div>
</div>


    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
