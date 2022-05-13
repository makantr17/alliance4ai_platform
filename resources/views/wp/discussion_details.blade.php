@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

<div class="container-fluid">

</div>

@if ($discussion -> count())
    @foreach($discussion as $discussions)
      <div class="my-3 rounded-3">
          <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
              <!-- <img class="mr-3 my-3"  width="80" height="80" src="/images/icon-alliance/group-users.png" alt="enterprise"> -->
                @if ($discussions-> files )
                    <img src="{{ '/storage/images/discussion/'.$discussions->id.'/'.$discussions->files }}" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 shadow-sm p-1 mr-3 my-3">
                @else
                    <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 shadow-sm p-1 mr-3 my-3">
                @endif
              <h3 class="display-6 fw-bold">{{$discussions-> title}} </h3>
          </a>
          <div class="col-md-8">
              <div class="h-100 p-3 bg-light">
                <h3 class="fw-light">Description </h3>
                  <p> <small>{{ $discussions-> description}} This course intend to to initiate you from basic nowledge of algorithms data scienceThis course intend to to initiate you from basic nowledge of algorithms data science</small> </p>
              </div>
          </div>
      </div>
      @endforeach
    @else
        <p>No Groups Available or posted</p>
    @endif  

            
    <div class="container-fluid mt-70">
        <div class="d-flex flex-wrap justify-content-between">
            <div> 
                @auth
                    <form class="mx-1"novalidate  action="" method="post">
                        @csrf
                        @if ($discussion -> count())
                            @foreach($discussion as $discussions)
                                @if (($discussions -> user_id) != auth()->user()->id)
                                <button type="submit" class="btn btn-primary my-3">New topic</button>
                                @endif
                            @endforeach
                        @endif
                    </form>
                @endauth
                @guest
                    <button type="button" class="btn btn-shadow btn-wide btn-primary"> <span class="btn-icon-wrapper pr-2 opacity-7"> <i class="fa fa-plus fa-w-20"></i> </span> Login </button>
                @endguest
                
            </div>
            <div class="col-12 col-md-3 p-0 mb-3"> <input type="text" class="form-control" placeholder="Search..."> </div>
        </div>
        <div class="card mb-3">
            <div class="card-header pl-0 pr-0">
                <div class="row no-gutters w-100 align-items-center">
                    <div class="col ml-3">Topics</div>
                    <div class="col-4 text-muted">
                        <div class="row no-gutters align-items-center">
                        <div class="col-4">Replies</div>
                        <div class="col-8">Last update</div>
                    </div>
                </div>
            </div>
        </div>
        @if ($topic -> count())
            @foreach($topic as $topics)
            <div class="card-body py-3">
                <div class="row no-gutters align-items-center">
                    @if ($topics ->user->image)
                        <img class="bd-placeholder-img flex-shrink-0 me-2 rounded border" width="42" height="42" src="{{ '/storage/images/'.$topics->user_id.'/'.$topics -> user ->image}}" alt="12">
                    @else
                        <img class="bd-placeholder-img flex-shrink-0 me-2 rounded border" width="42" height="42" src="/images/icon-alliance/man.png" alt="default">
                    @endif
                    <div class="col"> <a href="{{ route('discussion.topic.messages', [$topics->id]) }}" class="text-big" data-abc="true">{{ $topics-> question_1}} ?</a>
                        <div class="text-muted small mt-1">Started {{ $topics-> created_at->diffForHumans()}} &nbsp;·&nbsp; <a href="javascript:void(0)" class="text-muted" data-abc="true">{{ $topics ->user->name }}</a></div>
                    </div>
                    <div class="d-none d-md-block col-4">
                        <div class="row no-gutters align-items-center">
                            <div class="col-4">12</div>
                            <div class="media col-8 align-items-center"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583246/AAA/2.jpg" alt="" class="d-block ui-w-30 rounded-circle">
                                <div class="media-body flex-truncate ml-2">
                                    <div class="line-height-1 text-truncate">1 day ago</div> <a href="javascript:void(0)" class="text-muted small text-truncate" data-abc="true">by Tim cook</a></div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <hr class="m-0">
            @endforeach
        @else
            <p></p>
        @endif

            
        </div>

        
    </div> 

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
