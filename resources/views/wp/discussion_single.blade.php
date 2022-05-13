@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

<div class="container-fluid row justify-content-center align-items-center">
    @if ($discussion -> id)
    <div class="col-lg-9 list-group-item list-group-item-action border d-block gap-3 py-2 m-0 bg-light">
        <div class="d-block justify-content-center overflow-hidden mb-2" style="max-height: 55vh;">
            @if ($discussion-> files )
                <img src="{{ '/storage/images/discussion/'.$discussion->id.'/'.$discussion->files }}" alt="twbs" width="" class="flex-shrink-0 shadow-sm mr-3 my-1">
            @else
                <img src="/images/icon-alliance/discussion.png" alt="twbs" width=""  class="rounded flex-shrink-0 shadow-sm p-1">
            @endif
        </div>
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                @if ($discussion->user->image)
                    <img src="{{ '/storage/images/'.$discussion->user->id.'/'.$discussion->user->image }}" alt="twbs" width="45" height="45" class="rounded-circle flex-shrink-0 p-1 border border-info">
                @else
                    <img src="/images/icon-alliance/user.png" alt="twbs" width="45" height="45" class="rounded-circle flex-shrink-0 shadow-sm p-1">
                @endif
                <small class="opacity-50 text-nowrap">{{ $discussion-> user->name }}</small>
                <h4 class="mb-0 pt-4 pb-2">{{$discussion-> title}}</h4>
                <nav>{{ $discussion-> description}}</nav>
                <small class="opacity-50 text-nowrap">{{ $discussion-> created_at->diffForHumans() }}</small>
                <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                    <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                        <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">20 joined</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle"></span> </span> 
                    </div>
                </div>
                
                <div class="row col-lg-12 d-flex justify-content-between align-items-center px-0 pt-0">
                    <div class="col-sm-10">Join the meeting</div>
                    <div class="col-sm-2">
                        @auth
                            <form action="" method="get" class="mr-1 m-2">
                            @csrf
                                <button type="submit"class="btn btn-secondary">Join</button>
                            </form>
                        </a>
                        @endauth
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @endif  

    <div class="col-lg-9 my-1 mb-3 list-group-item list-group-item-action border d-block gap-3 py-2 m-2 bg-light">
        <div class="row mt-2">
            <div class="col">
                <div class="list-discussion">
                    <div>
                        <p>{{ $discussion-> topics}} </p>
                        <a href="https//a4ai_group.org/topic/andela">https//a4ai_group.org/topic/andela</a>
                    </div>
                    
                    @if ($discussion-> count())
                        <div href="" class="d-col gap-3" aria-current="true">
                            <nav class="opacity-50 text-nowrap py-1"><i class="fa fa-map-marker"></i> <strong>Location:</strong> {{ $discussion-> location}}</nav>
                            <nav class="opacity-50 text-nowrap py-1"><strong>Admin_1:</strong> <br> {{ $discussion-> admin_1}} </nav>
                            <nav class="opacity-50 text-nowrap py-1"><strong>Admin_2:</strong> <br> {{ $discussion-> admin_2}} </nav>
                            <nav class="opacity-50 text-nowrap py-1"><i class="fa fa-time"></i> <strong>Start at:</strong> {{ $discussion-> start_time}} <strong>- End at:</strong> {{ $discussion-> start_time}}</nav>
                        </div>
                    @endif
                </div>
                <div class="row my-1 py-2"></div> 
            </div>
            <!-- JOIN Button End heere -->
        
        </div>
    </div>

    
</div> 

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
