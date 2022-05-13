@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->


<div class="container-fluid col-xxl-8 px-0 py-2">
    <!-- Start of Topic here  #################################################-->
    @if ($contents->count())
        @foreach($contents as $content)
        <a href="#" class="list-group-item list-group-item-action border d-block gap-3 py-2 m-2 bg-white " aria-current="true">
            <div class="d-block justify-content-center overflow-hidden mb-2" style="max-height: 25vh;">
                @if ($content ->topic -> image)
                    <img src="{{ '/storage/images/topic/'.$content->topic->topic.'/'.$content->topic->image }}" alt="twbs" width="" height="" class="rounded flex-shrink-0 ">
                @else
                    <img src="/images/icon-alliance/message.png" alt="twbs" width="150" height="150" class="rounded flex-shrink-0 shadow-sm p-1">
                @endif
            </div>
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    @if ($content->user->image)
                        <img src="{{ '/storage/images/'.$content->user->id.'/'.$content->user->image }}" alt="twbs" width="45" height="45" class="rounded-circle flex-shrink-0 p-1 border border-info">
                    @else
                        <img src="/images/icon-alliance/message.png" alt="twbs" width="45" height="45" class="rounded-circle flex-shrink-0 shadow-sm p-1">
                    @endif
                    <small class="opacity-50 text-nowrap">{{ $content-> user->name }}</small>
                    <nav class="mb-0 py-2">{{ $content-> description}}</nav>
                    <small class="opacity-50 text-nowrap">{{ $content-> created_at->diffForHumans() }}</small>
                    <div class="d-flex flex-wrap align-items-center px-0 pt-0"></div>
                </div>
            </div>
            <!-- Add comment section here -->
            
            <!-- end comment section -->
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


<div class="">

    <div class=" mt-10">
        <div class="row">
            <!-- START Listed Topics here -->
            <div class="col-lg-8">
                <!-- Start of Topic here  #################################################-->
                @if ($content -> count())
                <a href="#" class="list-group-item list-group-item-action border d-block gap-3 py-2 m-2 bg-white shadow-sm" aria-current="true">
                    <!-- START Header content display ######### -->
                    <div class="d-flex gap-2 w-100 justify-content-between py-3">
                        <div class="row col-12">
                            <div class="d-flex justify-content-between">
                                <small class="opacity-50 text-nowrap">{{ $content-> created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                    <!-- END Header content display here ############ -->
                    <!-- START Content display here ############ -->
                    <div class="col-sm-12">
                        <!-- If Image ### -->
                        @if ($content ->type === "image/png" || $content ->type === "image/jpg" || $content ->type === "image/jpeg")
                        <div>
                            <h5>Working abroad: How important are company values for expats?</h5>
                            <img src="{{ '/storage/images/content/'.$content->topic_id.'/'.$content->file }}" alt="twbs" width="100%" height="250" class="rounded flex-shrink-0 my-3">
                            <br>
                            <p> economy's dependence on oil.</p>
                        </div>
                        <!-- If video ### -->
                        @elseif ($content->type === "application/pdf")
                        <div class="row justify-content-center">
                            <div id="detail_div_a4">                      
                                <embed src="{{ '/storage/images/content/'.$content->topic_id.'/'.$content->file }}" type="application/pdf" width="100%" height="600px">
                            </div>
                        </div>
                        <!-- If pdf ### -->
                        @elseif ($content->type === "video/mp4")
                        <video width="100%" height="340" controls>
                            <source src="{{URL::asset('/storage/images/content/'.$content->topic_id.'/'.$content->file )}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                    </div>
                    <!-- END Content display here ############ -->
                    <!-- START Comment display here ############ -->
                    @auth
                        <!-- NEW REPLY START HERE -->
                        <div class="light-bg col-lg-12 mb-10 p-2">
                            <h5 class="fw-light pt-3">Comment File</h5>
                            <form class="needs-validation" novalidate action="{{ route('topics.content.details',  $content-> id) }}" method="post">
                                <div class="row g-3">
                                    @csrf
                                    <div class="col-md-4">
                                        <input type="text" name="user_id" id="user_id" placeholder="user_id"  hidden readonly
                                        class="form-control py-2  rounded-lg @error('user_id') border border-danger @enderror" value="{{ auth()->user()->id }}">
                                        @error('user_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="content_id" id="content_id" placeholder="content_id"  hidden readonly
                                        class="form-control py-2  rounded-lg @error('content_id') border border-danger @enderror" value="{{ $content-> id}}">
                                        @error('content_id')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <textarea type="text" name="message" id="message" placeholder="Your message" cols="5" rows="2"
                                        class="form-control py-2  rounded-lg @error('message') border border-danger @enderror" value=""> </textarea>
                                        
                                        @error('message')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-secondary small">Reply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endauth
                    <!-- End display here ######### -->
                </a>
                @endif
            </div>
            <!-- END Topics Notification here -->
            <div class="col-lg-4 list-group-item list-group-item-action border d-block gap-3 py-3 my-2 bg-white shadow-sm">
                <h6 class="border-bottom pb-2">Comments</h6>
                <div class="py-2">
                    @if ($contents[0] ->commentfiles-> count())
                        @foreach($contents[0]->commentfiles as $commentfile)
                            <x-commentfiles :commentfiles="$commentfile" />
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- END CONTENTS HERE -->
    </div>

    
</div> 
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
