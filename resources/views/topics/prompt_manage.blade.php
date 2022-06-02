@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->


<div class="container-fluid">

    <div class="container-fluid mt-20">
        <div class="row align-items-center justify-content-center">
            <!-- START Listed Topics here -->
            <div class="col-lg-10">
            <!-- Start of Topic here  #################################################-->
            @if ($prompts->count())
                @foreach($prompts as $prompt)
                <a href="#" class="m-2 list-group-item-action d-block gap-3 pb-2 bg-light" aria-current="true">
                   
                    <div class="col justify-content-center mb-2r bg-danger p-4" style="max-height: 35vh; ">
                        @if ($prompt->user->image)
                            <img src="{{ '/storage/images/'.$prompt->user->id.'/'.$prompt->user->image }}" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 border shadow-sm">
                        @else
                            <img src="/images/icon-alliance/message.png" alt="twbs" width="80" height="80" class="rounded-circle flex-shrink-0 shadow-sm ">
                        @endif
                        <h5 class="opacity-50 text-white display-7 pt-3">{{ $prompt-> user->name }}</h5>
                    </div>
                    <div class="p-2 d-flex gap-2 w-100 justify-content-between border">
                        <div>
                            <h6 class="mb-0 py-2">{{ $prompt-> question}}</h6>
                            <small class="opacity-50 text-nowrap">{{ $prompt-> created_at->diffForHumans() }}</small>
                            <div class="d-flex flex-wrap align-items-center px-0 pt-0"></div>
                        </div>
                    </div>
                    <!-- Add comment section here -->
                    @auth
                        <!-- NEW REPLY START HERE -->
                        <div class="light-bg col-lg-12 mb-10 p-2 shadow-sm">
                            <form class="needs-validation" novalidate action="{{ route('topics.prompts',  $prompt-> id) }}" method="post">
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
                                        <input type="text" name="prompts_id" id="prompts_id" placeholder="prompts_id"  hidden readonly
                                        class="form-control py-2  rounded-lg @error('prompts_id') border border-danger @enderror" value="{{ $prompt-> id}}">
                                        @error('prompts_id')
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
            <!-- END Topic here  #################################################-->

            <!-- START CONTENT Topics here  #################################################-->
            <div class="my-3 d-flex gap-3 py-2 m-2">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <h6 class="px-2 fw-light text-secondary">All Comments</h6>
                    <nav>{{ $prompts[0] ->commentprompts-> count() }} comments</nav>
                </div>
            </div>

            <div class="bg-light border ml-2 mb-5">
                <!-- NEW REPLY END HERE -->
                <!-- START OF COMMENT OR MESSAGES HERE -->
                <div class="card-body py-2">
                    @if ($prompts[0] ->commentprompts-> count())
                        @foreach($prompts[0]->commentprompts as $commentprompt)
                            <x-commentprompts :commentprompts="$commentprompt" />
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