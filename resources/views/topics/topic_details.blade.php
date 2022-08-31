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
                <a href="#" class="m-2 list-group-item-action d-block gap-3 bg-light" aria-current="true">
                    @if ($topic->category === '1' )
                    <div class="col justify-content-center p-4 rounded"  style="height: 35vh;  background-image: url('/images/icon/back-col5.png');">
                        @if ($topic->user->image)
                            <img src="{{ '/storage/images/'.$topic->user->id.'/'.$topic->user->image }}" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                        @else
                            <img src="/images/cxc.jpg" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                        @endif
                    </div>
                    @elseif ($topic->category === '2' )
                    <div class="col justify-content-center p-4 rounded"  style="height: 35vh;  background-image: url('/images/icon/back-col6.png');">
                        @if ($topic->user->image)
                            <img src="{{ '/storage/images/'.$topic->user->id.'/'.$topic->user->image }}" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                        @else
                            <img src="/images/cxc.jpg" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                        @endif
                    </div>
                    @else
                        <div class="col justify-content-center p-4 rounded"  style="height: 35vh;  background-image: url('/images/icon/back-col8.png');">
                            @if ($topic->user->image)
                                <img src="{{ '/storage/images/'.$topic->user->id.'/'.$topic->user->image }}" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                            @else
                                <img src="/images/cxc.jpg" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                            @endif
                        </div>
                    @endif
                    
                    <div class="p-3  gap-2 w-100 border">
                        <h4 class="mb-0 py-2 text-black">{{ $topic-> topic}}</h4>
                        <div class="d-flex gap-2 w-100 align-items-center pt-2">
                            <nav class="opacity-100 display-7" style="font-size:14px">By {{ $topic-> user->name }}, </nav>
                            <nav class="opacity-100 text-info" style="font-size:14px">{{ $topic-> created_at->diffForHumans() }}</nav>
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

            <div class="container d-flex flex-row-reverse">
                <a href="{{ route('topics')}}">
                    <button class="btn btn-sm btn-primary border "> Back</button>
                </a>
            </div>
            <!-- END Topic here  #################################################-->
            <!-- START CONTENT Topics here  #################################################-->
            <div class="my-2">
                
                <div class="py-3"></div>
                <!-- START VIDEO here  #################################################-->
                <h5 class=" py-3 fw-bold text-dark"> Discussion Prompt Questions</h5>
                <!-- START Prompts here #######################" -->
                @if ($topics[0]->prompts-> count())
                    @foreach($topics[0]->prompts as $prompts)
                    <!--{{ route('topics.prompts', $prompts) }} -->
                    <a href="#" style="background:#F2F2F2" class="list-group-item list-group-item-action border d-flex bg-light gap-3 py-2 m-2" aria-current="true">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div class="d-flex gap-2 w-100 justify-content-arround">
                                <nav><i class="p-1 fa fa-question-circle-o" style="font-size:30px;" aria-hidden="true"></i></nav>
                                <div>
                                    <p class="text-dark fw-bold text-wrap" style="font-size:14px" >{{ $prompts-> question}} ?</p>
                                    <small class="opacity-50 text-nowrap">{{ $prompts-> created_at->diffForHumans() }}</small>
                                </div>
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




                <h5 class="py-2 fw-bold text-dark">Resources</h5>
                <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-1">
                @if ($topics[0]->content-> count())
                    @foreach($topics[0]->content as $content)
                        <div class="col-md-4 p-2" style="height:300px">
                            <div class="card card-cover h-100 overflow-hidden text-white rounded-5 text-center" 
                            style=
                            "background-image: url('{{$content->file !== 'undefined' ?  '/storage/images/content/'.$content->title.'/'.$content->file : '/images/icon/back-slim3.png'}}');background-repeat: no-repeat; background-size: 100% 230px; background-position: top;">
                                <div class="d-flex flex-column h-100 p-3 pb-2 text-shadow-1">
                                    <ul class="d-flex col-lg-12 align-items-center justify-content-center list-unstyled mt-auto">
                                        <a href="{{ $content-> link}}" target="_blank" class="mr-2 btn btn-light btn"> <i class="fa fa-play-circle fa-3x"></i></a>
                                    </ul>
                                </div>
                                <h5 class="p-2 mt-2 mb-0 display-7 lh-1 fw-bold text-dark">{{ Str :: limit($content-> title, 20) }} </h5>
                            </div>
                        </div>
                    @endforeach
                @endif

                </div>










                <!-- <div class="py-4"></div> -->
                <!-- START FILE here  #################################################-->
                <!-- <h6 class="px-2 p-1 fw-bold text-dark"><i class="p-1 fa fa-file" style="font-size:25px; color:#05B37E" aria-hidden="true"></i> Resources</h6>
                @if ($topics[0]->content-> count())
                    @foreach($topics[0]->content as $content)
                        @if ($content->type)
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
                        @else
                            <nav href="#" style="background:#F2F2F2" class="list-group-item list-group-item-action border d-flex bg-light gap-3 py-2 m-2" aria-current="true">
                                <div class=" gap-2 w-100">
                                    <div>
                                        @if ($content->link !== "undefined" && $content->link !== '')
                                            <a href="{{ $content->link}}" target="_blank">{{ $content->title}}</a>
                                        @elseif($content->description !== "undefined" && $content->description !== '')
                                            <h6 class="text-wrap py-2 text-info" style="font-size:14px; ">{{ $content->title}}</h6>
                                            <p class="opacity-50 text-wrap" style="font-size:14px;">{{ $content->description }}</p>
                                        @endif
                                        
                                    </div>
                                </div>
    	                    </nav>
                        @endif
                    @endforeach
                @else
                <div class="px-2 py-2 text-muted my-1 bg-light ">
                    <nav>No Resources</nav>
                </div>
                @endif -->



                <div class="py-4"></div>
                <!-- START Exercise here  #################################################-->
                <h5 class="p-2 fw-bold text-dark">Exercises</h5>
                @if($topics[0]->exercise->isEmpty())
                    <div class="px-2 py-2 text-muted my-1 bg-light ">
                        <nav>No exercice</nav>
                    </div>
                @else
                    @foreach($topics[0]->exercise as $exercise)
                        @auth
                            @if ($exercise)
                                <a href="{{ route('topics.takequiz', $exercise) }}" class="list-group-item list-group-item-action border d-flex gap-3 py-2 my-2 bg-light" aria-current="true">
                                    <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
                                        <div class="d-flex gap-2 w-100 justify-content-arround">
                                            <nav><i class="p-1 fa fa-wpforms" style="font-size:30px;" aria-hidden="true"></i></nav>
                                            <div>
                                                <p class="text-dark fw-bold text-wrap" style="font-size:14px" >{{ $exercise->question}}</p>
                                                <small class="opacity-50 text-nowrap">{{ $prompts-> created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
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
            <div class="py-4"></div>
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
