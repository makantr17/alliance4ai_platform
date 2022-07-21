@extends('layouts.app')

@section('content')


<div class="px-4 py-5 my-0 text-center" style="background-image: url('/images/icon/back-col8.png');" height="100">
    <!-- <img class="d-block mx-auto mb-4 rounded-circle" src="/images/icon/back-slim3.png" alt="" width="72" height="72"> -->
    <h1 class="display-5 fw-bold text-white">Hackathons</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-2">Participate to the hackerthons hosted by Future Maker.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        @auth
            <form action="{{ route('users.create_hackerthon',  auth()->user()->name) }}" method="get" class="">
            @csrf
                <button type="submit"  class="btn btn-primary btn-lg px-4 gap-3">New Hackerthon</button>
            </form>
        @endauth
      </div>
    </div>
</div>

<div class="container px-4 pt-3" id="custom-cards">
    <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
        <div class="col">
            <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                    <i class="fa fa-bookmark-o"></i>&nbsp;  {{ $hackerthons -> count()}} hackathons</span></div>
                    <div class="sc-fUqQNk jDAUBC avatar-group--dense pt-2">
                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                        <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
                    </div>
                </div>
            </div>
        </div>
        <div class=" d-flex flex-wrap align-items-center px-0 py-3 ">
            @auth
                <div class="dropdown mx-2 p-2 px-3">
                    <p style="font-size: 14px; opacity: 0.7;"> <i class="fa fa-bell-o"></i> Notifications <span class="badge p-1 bg-light border text-dark rounded-pill align-text-bottom">{{ auth()->user()->notifications->where('type', 'App\Notifications\HackathonCreated')->count()}}</span> </p>
                    <div class="dropdown-content">
                        @foreach (auth()->user()->notifications->where('type', 'App\Notifications\HackathonCreated') as $notification) 
                        <a href="{{ route('hackathons.details', $notification->data['id']) }}" style="font-size: 14px; opacity: 0.7; color:black" class="border-bottom p-1">
                            {{$notification->data['title']}} 
                        </a>
                        @endforeach
                    </div>
                </div>
            @endauth

            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <div class="courses-search float-right">
                            <form nonvalidate action="{{ route('hackathons') }}" method="get">
                                @csrf
                                <input type="text" name="search" placeholder="Search" 
                                class="form-control py-2  rounded-lg @error('search') border border-danger @enderror" value="{{ old('search')}}">

                                @error('search')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> 
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-1">
    @if ($hackerthons -> count())
        @foreach($hackerthons as $hackerthon)
            <div class="col-md-3 py-4">
                <div class="card card-cover h-100 overflow-hidden text-white rounded-5 shadow-sm" 
                style="background-image: url('/images/icon/back-slim3.png');background-repeat: no-repeat; background-size: 100% 110px; background-position: bottom;">
                    <div class="d-flex flex-column h-100 p-3 pb-2 text-shadow-1">
                        <h5 class="pt-2 mt-2 mb-0 display-7 lh-1 fw-bold text-dark">{{ Str :: limit($hackerthon-> title, 20) }} </h5>
                        <p style="font-size: 14px; line-height:22px; font-weight:300" class="pb-0">{{ Str :: limit($hackerthon-> description1, 60) }}</p>
                        
                        <!-- images -->     
                            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                                <nav class="mb-0 opacity-100 my-1 text-muted">
                                    @if ($hackerthon->user->image)
                                        <img src="{{ '/storage/images/'.$hackerthon->user->id.'/'.$hackerthon->user->image }}" alt="twbs" width="20" height="20" class="border rounded-circle flex-shrink-0">
                                    @else
                                        <img src="/images/cxc.jpg" alt="twbs" width="20" height="20" class="border rounded-circle flex-shrink-0">
                                    @endif
                                    <small>, by {{ $hackerthon-> user->name}}</small>
                                </nav>
                                @auth
                                    @if ($hackerthon->isCompeting(auth()->user()))
                                        <nav href="" style="font-size:12px" class=" m-0 text-info"> Joined</nav>
                                    @endif
                                @endauth
                            </div>
                        <!-- End images -->
                        @if ($hackerthon->category === 'Machine Learning' )
                            <img src="/images/icon/Plan2.png" alt="twbs"  width="80" height="80" class="rounded-circle m-2">
                        @elseif ($hackerthon->category === 'Bensfield connect' )
                            <img src="/images/icon/Plan4.png" alt="twbs" width="80" height="80" class="rounded-circle m-2">
                        @else
                            <img src="/images/icon/Plan7.png" alt="twbs" width="80" height="80" class="rounded-circle m-2">
                        @endif
                        <ul class="d-flex list-unstyled mt-auto">
                            <a href="{{ route('hackathons.details',  $hackerthon->id) }}" class="mr-2 btn btn-light btn">view</a>
                            <li class="d-flex align-items-center">
                                <i class="fa fa-calendar m-1 text-light"></i>
                                <small class="opacity-80 text-nowrap text-black">{{ $hackerthon-> created_at->diffForHumans() }}</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    </div>
</div>
<div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
    {{ $hackerthons -> links()}}
</div>


</div>


@endsection