@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->

<div class="container-fluid">
    @if ($discussion -> count())
      @foreach($discussion as $discussions)
      <div class="my-3 rounded-3">
          <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                @if ($discussions-> files )
                    <img src="{{ '/storage/images/discussion/'.$discussions->id.'/'.$discussions->files }}" alt="twbs" width="70" height="70" class="rounded-circle flex-shrink-0 shadow-sm p-1 mr-3 my-3 border border-primary">
                @else
                    <img src="/images/icon-alliance/discussion.png" alt="twbs" width="70" height="70" class="rounded-circle flex-shrink-0 shadow-sm p-1 mr-3 my-3">
                @endif
              <h4 class="display-10 fw-bold">{{$discussions-> title}} </h4>
          </a>
      </div>
      @endforeach
    @else
        <div class="my-3 rounded-3">
            <p>No Groups Available or posted</p>
        </div>
    @endif 




    <div class="container-fluid mt-20">
        <div class="row">
            <div class="col-md-8">
                @if ($topic -> count())
                    @foreach($topic as $topics)
                    <!-- TOPIC CONTAINER START HERE -->
                    <div class="card mb-4">
                        <!-- TOPIC INFO START HERE -->
                        <div class="list-group-item list-group-item-action bg-white shadow-sm d-flex gap-3 py-2 ">
                            <div class="d-block justify-content-center">
                                @if ($topics-> user -> image)
                                    <img src="{{ '/storage/images/'.$topics->user->id.'/'.$topics->user->image }}" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-success">
                                @else
                                    <img src="/images/icon-alliance/message.png" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-warning">
                                @endif
                                <small class="opacity-50 text-nowrap">{{ $topics->user->name }}</small>
                            </div>
                            <div class="card-body">
                                <h5 class="fw-bold">{{ $topics-> question_1}} </h5>
                                <nav>
                                    @if ($topics-> content ->count() )
                                        <img class="my-3 mr-3" style="border-radius: 10px;" alt="twbs" width="100%" height="250px"
                                        src="{{ '/storage/images/content/'.$topics->content[0]->topic_id.'/'.$topics->content[0]->file }}" alt="ll">
                                    @endif
                                    <!-- <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100%" height="" class="flex-shrink-0 m-2"> -->
                                </nav>
                                <p> For me, getting my business website made was a lot of tech wizardry things. Thankfully i get an ad on Facebook ragarding commence website. I get connected with BBB team. They made my stunning website live in just 3 days. With. </p>
                            
                                <div class="media flex-wrap w-100 align-items-center pb-2"> <img src="https://i.imgur.com/iNmBizf.jpg" class="d-block ui-w-40 rounded-circle" alt="">           
                                    <div class="text-muted small my-2">
                                        <div class="text-muted ">{{ $topics-> created_at->diffForHumans()}}</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between align-items-center ">
                                    <div class="px-0 pt-1"> 
                                        <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-heart text-danger"></i>&nbsp; <span class="align-middle">{{ $topics->likes->count() }}</span> </a> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">{{ $topics->message->count() }}</span> </span> </div>
                                        <div class="row">
                                        @auth
                                            @if (!$topics->likedBy(auth()->user()))
                                            <div class="flex items-center">
                                                <form action="{{ route('discussion.topic.messages.likes', $topics) }}" method="post" class="mr-1">
                                                @csrf
                                                    <button type="submit" class="btn btn-light">Like</button>
                                                </form>
                                            </div>
                                            @else
                                            <div class="flex items-center">
                                                <form action="{{ route('discussion.topic.messages.likes', $topics) }}" method="post" class="mr-1">
                                                @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light">UnLike</button>
                                                </form>
                                            </div>
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @auth
                        <!-- NEW REPLY START HERE -->
                        <div class="light-bg p-3 col-lg-12 mb-10 p-2 shadow-sm">
                            <form class="needs-validation" novalidate action="{{ route('discussion.topic.messages',  $topics-> id) }}" method="post">
                                <div class="row g-3">
                                    @csrf
                                    <div class="col-md-4">
                                        <input type="text" name="user_id" id="user_id" placeholder="topic_id"  hidden readonly
                                        class="form-control py-2  rounded-lg @error('user_id') border border-danger @enderror" value="{{ auth()->user()->id }}">
                                        @error('user_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="topic_id" id="topic_id" placeholder="topic_id"  hidden readonly
                                        class="form-control py-2  rounded-lg @error('topic_id') border border-danger @enderror" value="{{ $topics-> id}}">
                                        
                                        @error('topic_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="dv">Reply</label>
                                        <textarea type="text" name="message" id="message" placeholder="Your message" cols="5" rows="3"
                                        class="form-control py-2  rounded-lg @error('message') border border-danger @enderror" value=""> </textarea>
                                        
                                        @error('message')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-secondary small">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endauth
                @endforeach
                </div>
                @else
                <div class="card mb-4"> 
                    <p>No message posted</p>
                </div>
                @endif

                <div class="shadown-sm bg-light">
                    <!-- NEW REPLY END HERE -->
                    <!-- START OF COMMENT OR MESSAGES HERE -->
                    <div class="">
                        <div class="card-body py-2">
                            @if ($message -> count())
                                @foreach($message as $messages)
                                    <x-message :message="$messages" />
                                @endforeach
                            @else
                                <p></p>
                            @endif
                        </div>
                        <!-- END OF COMMENT OR MESSAGES HERE -->
                    </div>
                </div>

            </div>
            
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
</div>
   
        
    
    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
