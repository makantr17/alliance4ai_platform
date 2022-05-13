@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

<div class="container-fluid">
    @if ($discussion -> id)
      <div class="my-3 rounded-3">
          <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                @if ($discussion-> files )
                    <img src="{{ '/storage/images/discussion/'.$discussion->id.'/'.$discussion->files }}" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 shadow-sm p-1 mr-3 my-3 border border-primary">
                @else
                    <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-primary mr-3 my-3">
                @endif
                <h3 class="display-6 fw-bold">{{$discussion-> title}} </h3>
          </a>
          <div class="my-1 rounded-3 shadow">
            <div class="col-md-12 my-3">
                <div class="h-100 p-2">
                    <h5 class="fw-bold">Description </h5>
                    <p> <small>{{ $discussion-> description}} This course intend to to initiate you from basic nowledge of algorithms data scienceThis course intend to to initiate you from basic nowledge of algorithms data science</small> </p>
                </div>
            </div>
         </div>
      </div>
    @else
        <p>No Groups Available or posted</p>
    @endif  



    <div class="container-fluid mt-20">
        <div class="row">
            <!-- START Listed Topics here -->
            <div class="col-lg-6 ">
            @if ($topics -> count())
                @foreach($topics as $topic)
                <a href=" {{ route('discussion.topic.messages', [$topic->id]) }} " class="list-group-item list-group-item-action border d-flex gap-3 py-2 m-2 bg-white shadow-sm" aria-current="true">
                    <div class="d-block justify-content-center">
                        @if ($topic-> user -> image)
                            <img src="{{ '/storage/images/'.$topic->user->id.'/'.$topic->user->image }}" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-info">
                        @else
                            <img src="/images/icon-alliance/message.png" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-info">
                        @endif
                        <small class="opacity-50 text-nowrap">{{ $topic->user->name }}</small>
                    </div>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $topic-> topic}}</h6>
                            <nav>{{ $topic-> question_1}}</nav>
                            <small class="opacity-50 text-nowrap">{{ $topic-> created_at->diffForHumans() }}</small>
                            <nav>
                                @if ($topic-> content ->count() )
                                    <img class="my-3 img-circle" style="border-radius: 10px;" alt="twbs" width="100%" height="200px"
                                    src="{{ '/storage/images/content/'.$topic->content[0]->topic_id.'/'.$topic->content[0]->file }}" alt="ll">
                                @endif
                                <!-- <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100%" height="" class="flex-shrink-0 m-2"> -->
                            </nav>
                            <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                                    <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $topic-> likes ->count() }}</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">{{ $topic-> message ->count() }}</span> </span> 
                                </div>
                                @auth
                                    @if (!$topic->likedBy(auth()->user()))
                                        <form action="{{ route('discussion.topic.messages.likes', $topic) }}" method="post" class="mx-2">
                                        @csrf
                                            <button type="submit" class="btn btn-light">Like</button>
                                        </form>
                                    @else
                                        <form action="{{ route('discussion.topic.messages.likes', $topic) }}" method="post" class="mx-2">
                                        @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light">UnLike</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
                <nav>
                    <ul class="pagination mb-5">
                        <li class="page-item disabled"><a class="page-link" href="javascript:void(0)" data-abc="true">«</a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0)" data-abc="true">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-abc="true">»</a></li>
                    </ul>
                </nav>
            @else
            <div class="col-lg-12 text-center"> 
                <div class="d-flex justify-content-center align-items-center">
                    <img src="/images/icon-alliance/chat1.png" class="border-3" alt="twbs" width="" height="200" class="flex-shrink-0 ">
                </div>
                No topic posted
            </div>
        @endif
        </div>
            <!-- END Listed Topics here -->
            <!-- START Notifications here -->
            <div class="col-md-4">
                <h6 class="border-bottom pb-2 mb-0">Notifications</h6>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                        <h6 class="my-0">Timeline</h6>
                        <small class="text-muted">start_at -end_at</small>
                        </div>
                        <span class="text-muted">1week</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                        <h6 class="my-0">Remplir les info</h6>
                        <small class="text-muted">Corectement remplir les info</small>
                        </div>
                        <span class="text-muted">100</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                        <h6 class="my-0">Athentification</h6>
                        <small class="text-muted">Informations correctes</small>
                        </div>
                        <span class="text-muted">100</span>
                    </li>
                </ul>
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <h6 class="border-bottom pb-2 mb-0">Future Makers</h6>
                    <small class="d-block text-end mt-3">
                        <a href="#">All updates</a>
                    </small>
                </div>
            </div>
            <!-- END Topics Notification here -->
        </div>
        <!-- END CONTENTS HERE -->
    </div>

    
</div> 

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
