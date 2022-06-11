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
        <!-- HEADER SLIDE START HERE -->
        <!-- <div class="mx-5">
            <div class="pb-2">
                <h1 class="display-5 fw-bold pb-1" style="color:#F87B06">Topics</h1>
                <p class="text-muted">Read Topics, watch class material early and facilitate group topics with their presentation</p>
            </div>
            <div class="bg-white text-secondary mb-2 text-center rounded" style="opacity:0.8">
                <div class="overflow-hidden" style="max-height: 35vh;" >
                    <div class="" >
                        <img src="/icons/backview1.png" class="img-fluid rounded shadow-lg rounded" alt="Example image" width="100%" height="400"  loading="lazy">
                    </div>
                </div>
            </div>
            <div class="py-4">
                
            </div>
        </div> -->

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="mx-5 mb-3">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div class="col">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                        <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-sliders text-muted fsize-3"></i>&nbsp; {{ $topics-> count()}} </span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                    </div>
                </div>
                <div class="">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                        <form class="needs-validation pr-2" novalidate action="{{ route('topics') }}" method="get">
                            @csrf  
                            <div class="d-flex align-items-center">
                                <i class="fa fa-sort pr-2" style="font-size:20px"></i>
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
                            <form action="{{ route('users.createtopics',  auth()->user()->name) }}" method="get" class="mr-1">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-info">New topic</button>
                            </form>
                        @endauth
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>

<div class="col-sm-12 d-flex justify-content-center align-items-start">
    <div class="col-sm-10 d-flex gap-2 w-100 justify-content-between align-items-start">
        <div>
            <h1 class="pt-2 mt-2 mb-2 lh-1 text-info fw-bold"> Future Makers Topics </h1>
            <nav class="mb-0 opacity-100 my-1 text-secondary"><small class="text-black">Learn from Future Makers</small></nav>
            <img src="/images/icon/bg-dasha4ai.png" alt="twbs" width="" height="120" class="rounded flex-shrink-0">
            
        </div>
        <small class="opacity-80 text-nowrap">      
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/10161132-gr.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/10161132-gr.jpg" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/10332673-kg.jpg" title="Ajith Pushparaj" alt="j"></div>
        </small>
    </div>
</div>



<!-- display all elements -->
<div class="row justify-content-center align-items-center bg-white">
    <!-- START Listed Topics here -->
    <div class="col-sm-10 mt-4 ">
        @if ($topics -> count())
            @foreach($topics as $topic)
            <a href="{{ route('topics.details', $topic) }}" class="border-bottom list-group-item-action d-flex flex-wrap justify-content-between gap-3 py-3 my-0 bg-white p-0" aria-current="true">
                <div class="col-sm-2 overflow-hidden"  style="max-height: 19vh;">
                    @if ($topic->category === '1' )
                        <img src="/icons/background_futurtech.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                    @elseif ($topic->category === '2' )
                        <img src="/icons/background_fm.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                    @else
                        <img src="/icons/background_education.png
                        " alt="twbs" width="" height="" class="rounded flex-shrink-0">
                    @endif
                </div>
                <div class="col-sm-9 d-flex gap-2 w-100 justify-content-between align-items-start">
                    <div>
                        <p class="pt-2 mt-2 mb-2 lh-1 text-black fw-bold"> {{$topic-> topic}} </p>
                        <nav class="mb-0 opacity-100 my-1 text-secondary"> <i class="fa fa-map-marker fa-1x fw-light"></i> <small class="text-black">{{ $topic-> topic}}</small></nav>
                       <div class="d-flex align-items-start">
                            <nav class="mb-0 opacity-100 my-1 text-muted"><small>, by {{ $topic-> user->name}}</small></nav>
                        </div>
                    </div>
                    <small class="opacity-80 text-nowrap">{{ $topic-> created_at->diffForHumans() }} 
                        
                        <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/5256931-kg.jpeg" title="Abhishek Kumar" alt="r">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/10161132-gr.jpg" title="Jason Sykes" alt="s">
                            <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="https://storage.googleapis.com/kaggle-avatars/thumbnails/10332673-kg.jpg" title="Ajith Pushparaj" alt="j"></div>
                    </small>
                </div>
            </a>
            @endforeach
        @else
            <p>No Topics Available or posted</p>
        @endif
    </div>
    <!-- END Listed Topics here -->
</div>


    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
