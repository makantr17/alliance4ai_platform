@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->


<div class="container-fluid">
    <div class="container-fluid mt-20">
        <div class="row align-items-center justify-content-center">
            <!-- START Listed Topics here -->
            <div class="col-lg-10">
            <!-- Start of Topic here  #################################################-->
            @if ($topics -> count())
                @foreach($topics as $topic)
                <a href="#" class="m-2 list-group-item-action d-block gap-3 pb-2 bg-light" aria-current="true">
                    <div class="col justify-content-center mb-2r bg-danger p-4" style="max-height: 35vh; ">
                        @if ($topic->user->image)
                            <img src="{{ '/storage/images/'.$topic->user->id.'/'.$topic->user->image }}" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 border shadow-sm">
                        @else
                            <img src="/images/icon-alliance/message.png" alt="twbs" width="80" height="80" class="rounded-circle flex-shrink-0 shadow-sm ">
                        @endif
                        <h5 class="opacity-50 text-white display-7 pt-3">{{ $topic-> user->name }}</h5>
                    </div>
                    <div class="p-2 d-flex gap-2 w-100 justify-content-between border">
                        <div>
                            <h3 class="mb-0 py-3 text-danger">{{ $topic-> topic}}</h3>
                            <!-- <nav>{{ $topic-> description}}</nav> -->
                            <small class="opacity-50 text-nowrap">{{ $topic-> created_at->diffForHumans() }}</small>
                            <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
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
            <!-- END Topic here  #################################################-->
            <!-- START CONTENT Topics here  #################################################-->
            <div class="my-2">
                

                <div class="py-4"></div>
                <!-- START VIDEO here  #################################################-->
                <h6 class="px-2 p-1 fw-bold text-dark"><i class="p-1 fa fa-question-circle" style="font-size:25px; color:#05B37E" aria-hidden="true"></i> Prompts Questions</h6>
                <!-- START Prompts here #######################" -->
                @if ($topics[0]->prompts-> count())
                    @foreach($topics[0]->prompts as $prompts)
                    <a href="{{ route('topics.prompts', $prompts) }}" style="background:#F2F2F2" class="list-group-item list-group-item-action border d-flex bg-light gap-3 py-2 m-2" aria-current="true">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <p class="text-dark" >{{ $prompts-> question}} ?</p>
                                <small class="opacity-50 text-nowrap">{{ $prompts-> created_at->diffForHumans() }}</small>
                                
                            </div>
                        </div>
                    </a>
                    @endforeach
                @else
                <div class="px-2 py-2 text-muted my-1 bg-light ">
                    <nav>No Prompts</nav>
                </div>
                @endif
                <br>


                <div class="py-4"></div>
                <!-- START FILE here  #################################################-->
                <h6 class="px-2 p-1 fw-bold text-dark"><i class="p-1 fa fa-file" style="font-size:25px; color:#05B37E" aria-hidden="true"></i> Ressources</h6>
                @if ($topics[0]->content-> count())
                    @foreach($topics[0]->content as $content)
                    <a href="{{ route('topics.content.details', $content) }}" class="d-flex justify-content-between list-group-item list-group-item-action bg-light d-flex gap-3 m-2 my-3 border" aria-current="true">
                        <div class="d-flex">
                            @if ($content->type === "application/pdf")
                            <div id="detail_div_a4">
                                <i class="fa fa-file-pdf-o pr-2 text-dark" style="font-size:15px" aria-hidden="true"></i>                     
                                <embed src="{{ '/storage/images/content/'.$content->topic_id.'/'.$content->file }}" type="application/pdf" width="160" height="40">
                            </div>
                            @elseif ($content->type === "video/mp4")
                                <p class=""> <i class="fa fa-video-camera pr-2 text-dark" style="font-size:15px" aria-hidden="true"></i> {{$content->title}} </p>
                            @elseif ($content->type === "image/jpeg" || $content->type === "image/jpg" || $content->type === "image/png")
                                <p class=""><i class="fa fa-file-image-o pr-2 text-dark" style="font-size:15px" aria-hidden="true"></i> {{$content->title}} </p>
                            @endif
                        </div>
                        <div>
                            <small class="opacity-50 text-nowrap">{{ $content-> created_at->diffForHumans() }}</small>
                        </div>
                    </a>
                    @endforeach
                @else
                <div class="px-2 py-2 text-muted my-1 bg-light ">
                    <nav>No Ressources</nav>
                </div>
                @endif



                <div class="py-4"></div>
                <!-- START Exercise here  #################################################-->
                <h6 class="px-2 p-1 fw-bold text-dark"><i class="fa fa-wpforms p-1" style="font-size:25px; color:#05B37E" aria-hidden="true"></i> Exercises</h6>
                @if($topics[0]->exercise->isEmpty())
                    <div class="px-2 py-2 text-muted my-1 bg-light ">
                        <nav>No exercice</nav>
                    </div>
                @else
                    @foreach($topics[0]->exercise as $exercise)
                        @auth
                            @if (!$exercise->submitted(auth()->user()))
                                <a href="{{ route('topics.takequiz', $exercise) }}" class="list-group-item list-group-item-action border d-flex gap-3 py-2 m-2 bg-light" aria-current="true">
                                    <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
                                        <div><nav> {{ $exercise->question}}</nav></div>
                                        <button class="btn btn-info btn-sm">Take</button>
                                    </div>
                                </a>
                            @else
                                <a href="#" class="list-group-item list-group-item-action border d-flex gap-3 py-2 m-2" aria-current="true">
                                    <div class="d-flex gap-2 w-100 align-items-center">
                                        <i class="fa fa-check-square text-success"></i>    
                                        <div><nav> {{ $exercise->question}}</nav></div>
                                    </div>
                                </a>
                            @endif
                        @endauth
                    @endforeach
                @endif
               
            </div>
        </div>
        <!-- END CONTENT Topics here  #################################################-->
        <!-- START Notifications here -->
        
            <!-- END Topics Notification here -->
        </div>
        <!-- END CONTENTS HERE -->
    </div>

    
</div> 

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
