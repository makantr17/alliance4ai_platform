@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

@auth
    <x-menu />
@endauth

<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="bg-light p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <div class=" text-secondary px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-dark">Topics</h1>
            </div>
            
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between my-3">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">0</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.createtopics',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info">Add topic</button>
                        </form>

                    @endauth
                    </span>
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>


<div class="container-fluid">

    <div class="container-fluid mt-20">
        <div class="row align-items-center justify-content-center">
            <!-- START Listed Topics here -->
            <div class="col-lg-10 ">
            @if ($topics -> count())
                @foreach($topics as $topic)
                <a href=" {{ route('users.topics.manage', [auth()->user()->name, $topic->id]) }} " class="border d-flex gap-3 my-4 bg-white" aria-current="true">
                    <div class="d-block justify-content-center">
                        @if ($topic -> image)
                            <img src="{{ '/storage/images/topic/'.$topic->topic.'/'.$topic->image }}" alt="twbs" width="120" height="100" class="rounded flex-shrink-0">
                        @else
                            <img src="/images/icon-alliance/message.png" alt="twbs" width="120" height="70" class="rounded flex-shrink-0 border">
                        @endif
                    </div>
                    <div class="d-flex gap-2 justify-content-between pt-2">
                        <div>
                            <h6 class="mb-0">{{ $topic-> topic}}</h6>
                            <nav class="text-muted">{{ substr($topic->description, 0, 20) }}  </nav>
                            <small class="opacity-50 text-muted">{{ $topic-> created_at->diffForHumans() }}</small>
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="px-0 pr-3"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                                    <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $topic-> likes ->count() }}</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4">  </span> 
                                </div>
                               
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
            <!-- END Topics Notification here -->
        </div>
        <!-- END CONTENTS HERE -->
    </div>

    
</div> 

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
