@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
   <div class="px-4 py-5 my-0 text-center" style=" background-image: url('/images/icon/calendar.jpg');">
        <!-- <img class="d-block mx-auto mb-4" src="" alt="" width="72" height="57"> -->
        <h1 class="display-5 fw-bold text-black">Calender</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">See all ongoing discussion, login to create a new discussion.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form action="{{ route('discussion') }}" method="get" class="mr-0">
                @csrf
                    <button type="submit" class="btn btn-primary btn-lg px-4 gap-3">Discussions</button>
                </form>
                @auth
                    <form action="{{ route('logout') }}"  method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-lg px-4">Sign out</button>
                    </form>
                @endauth
                @guest
                    <form action="{{ route('login') }}"  method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-lg px-4">Sign out</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div>
            <div class="d-flex gap-2 w-100 justify-content-between my-2">
                <div class="col">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                        <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">2</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                    </div>
                </div>
                <div class="">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                        <form class="needs-validation pr-2" novalidate action="{{ route('groups') }}" method="get">
                            @csrf  
                            <div class="d-flex align-items-center"></div>
                        </form>
                        @auth
                        <div class="dropdown mx-2 p-2 px-3">
                            <p style="font-size: 14px; opacity: 0.7;">Notifications <span class="badge p-1 bg-light border text-dark rounded-pill align-text-bottom">{{ auth()->user()->notifications->where('type', 'App\Notifications\DiscussionCreated')->count()}}</span> </p>
                            <div class="dropdown-content">
                                @foreach (auth()->user()->notifications->where('type', 'App\Notifications\DiscussionCreated') as $notification) 
                                <a href="{{ route('discussion.details', $notification->data['id']) }}" style="font-size: 14px; opacity: 0.7;" class="border-bottom p-1">
                                    {{$notification->data['title']}} 
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endauth
                        <form class="needs-validation py-1" novalidate action="{{ route('users.calendardiscussion') }}" method="post">
                            @csrf  
                            <div class="d-flex align-items-center">
                                <select name="category" id="category" style="font-size: 14px; opacity: 0.7;"
                                    class="form-control  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                                    <option value="">Select all</option>
                                    <option value="0">Futur Tech</option>
                                    <option value="1">History & Ethics</option>
                                    <option value="2">Workplace Skills</option>
                                </select>
                                @error('category')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button class="btn btn-info" style="font-size: 14px; " type="submit">Filter</button>
                            </div>
                        </form>
                        @auth
                            <form action="{{ route('users.calendardiscussion.mycalendar', auth()->user()->name) }}" method="get" >
                            @csrf
                                <button type="submit" class="btn btn-md ml-1 text-white" style="font-size: 14px; background:#F87B06">My calender</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
        <div class="row row-cols row-cols-sm-2 row-cols-md-3 g-3 mb-5 d-flex justify-content-center align-items-center">
            <div class="col-sm-10 bg-light p-2">
                <div class="card-body">
                    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        
        <!-- <div class="p-5">
            <x-calender />
        </div> -->
    </div>

<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,


            })
        });
</script>
        
@endsection

