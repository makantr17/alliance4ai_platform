@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->


<div class="container-fluid col-xxl-8 px-0 py-2 px-4 mb-3">
    <div class="rounded">
        <!-- HEADER SLIDE START HERE -->
        <div class="mx-5">
            <div class="pb-2">
                <h1 class="display-5 fw-bold pb-1" style="color:#F87B06">Topics</h1>
                <p class="text-muted">Read Topics, watch class material early and facilitate group discussion with their presentation</p>
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
        </div>

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






<div class="container-fluid p-5">
    <div class="row ">
        <div class="d-flex flex-wrap">
            <div class=" d-flex flex-wrap bg-light justify-content-around wrap">
                <div class="list-group-item list-group-item-action border d-block gap-3 py-2 bg-white col-lg-4"  aria-current="true">
                    <div class="d-block justify-content-center mb-5 mt-3">
                        <!-- <img src="/images/icon-alliance/message.png" alt="twbs" width="100%" height="" class="rounded flex-shrink-0"> -->
                        <div class="overflow-hidden" style="max-height: 30vh;" >
                            <img src="/icons/background_futurtech.png" class="img-fluid rounded mb-4" alt="Example image" width="100%" height=""  loading="lazy">
                        </div>
                    </div>
                    <h3 class="p-0 pb-3 fw-light text-success">Futur Tech</h3>
                    <ul class="nav flex-column">
                    @if ($topics -> count())
                        @foreach($topics as $topic)
                            @if($topic -> category === "0")
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href=" {{ route('topics.details', [$topic->id]) }}" style="color:#115978">
                                    <i class="fa fa-check pr-1" aria-hidden="true" style="font-size:20px; color:#115978"></i>
                                    {{ $topic-> topic}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                    </ul>
                </div>

                <div class="list-group-item list-group-item-action border d-block gap-3 py-2 bg-white col-lg-4" aria-current="true">
                    <div class="d-block justify-content-center mb-5 mt-3">
                        <!-- <img src="/images/icon-alliance/message.png" alt="twbs" width="100%" height="" class="rounded flex-shrink-0"> -->
                        <div class="overflow-hidden" style="max-height: 30vh;" >
                            <img src="/icons/background_fm.png" class="img-fluid rounded mb-4" alt="Example image" width="100%" height=""  loading="lazy">
                        </div>
                    </div>
                    <h3 class="p-0 pb-3 fw-light text-success">Workplace Skills</h3>
                    <ul class="nav flex-column">
                    @if ($topics -> count())
                        @foreach($topics as $topic)
                            @if($topic -> category === "1")
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href=" {{ route('topics.details', [$topic->id]) }}" style="color:#115978">
                                    <i class="fa fa-check pr-1" aria-hidden="true" style="font-size:20px; color:#115978"></i>
                                    {{ $topic-> topic}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                    </ul>
                </div>

                <div class="list-group-item list-group-item-action border d-block gap-3 py-2 bg-white col-lg-4" aria-current="true">
                    <div class="d-block justify-content-center mb-5 mt-3">
                        <!-- <img src="/images/icon-alliance/message.png" alt="twbs" width="100%" height="" class="rounded flex-shrink-0"> -->
                        <div class="overflow-hidden" style="max-height: 30vh;" >
                            <img src="/icons/background_education.png" class="img-fluid rounded mb-4" alt="Example image" width="100%" height=""  loading="lazy">
                        </div>
                    </div>
                    <h3 class="p-0 pb-3 fw-light text-success">Ethics & History</h3>
                    <ul class="nav flex-column">
                    @if ($topics -> count())
                        @foreach($topics as $topic)
                            @if($topic -> category === "2")
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href=" {{ route('topics.details', [$topic->id]) }}" style="color:#115978">
                                    <i class="fa fa-check pr-1" aria-hidden="true" style="font-size:20px; color:#115978"></i>
                                    {{ $topic-> topic}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>












<!-- <div class="container-fluid px-5">

    <div class="container-fluid mt-0 ">
        <div class="row">
            <div class="col-lg-12 d-flex flex-wrap">
            @if ($topics -> count())
                @foreach($topics as $topic)
                <a href=" {{ route('topics.details', [$topic->id]) }} " class="list-group-item list-group-item-action border d-block gap-3 py-2 m-1 bg-white col-3" aria-current="true">
                    <div class="d-block justify-content-center">
                        @if ($topic -> image)
                            <img src="{{ '/storage/images/topic/'.$topic->topic.'/'.$topic->image }}" alt="twbs" width="100%" height="200" class="rounded flex-shrink-0 ">
                        @else
                            <img src="/images/icon-alliance/message.png" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0">
                        @endif
                        <small class="opacity-50 text-nowrap">By {{ $topic->user->name }}</small>
                    </div>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $topic-> topic}}</h6>
                            <nav>{{ $topic-> question_1}}</nav>
                            <small class="opacity-50 text-nowrap">{{ $topic-> created_at->diffForHumans() }}</small>
                            
                            <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                                    <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $topic-> likes ->count() }}</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">{{ $topic-> message ->count() }}</span> </span> 
                                </div>
                                @auth
                                    @if (!$topic->likedBy(auth()->user()))
                                        <form action="{{ route('discussion.topic.messages.likes', $topic) }}" method="post" class="mx-2">
                                        @csrf
                                            <button type="submit" class="btn btn-light btn-sm border">Like</button>
                                        </form>
                                    @else
                                        <form action="{{ route('discussion.topic.messages.likes', $topic) }}" method="post" class="mx-2">
                                        @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light btn-sm border">UnLike</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            @else
            <div class="col-lg-12 text-center"> 
                <div class="d-flex justify-content-center align-items-center">
                    <img src="/images/icon-alliance/chat1.png" class="border-3" alt="twbs" width="" height="200" class="flex-shrink-0 ">
                </div>
                No topic posted
            </div>
        @endif
        </div>
    </div>
</div>  -->

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
