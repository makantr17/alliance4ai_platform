@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->


<div class="container-fluid">

    <div class="container-fluid mt-20">
        <div class="row">
            <!-- START Listed Topics here -->
            <div class="col-lg-12 shadow-sm">
            @if ($topics -> count())
                @foreach($topics as $topic)
                <a href=" {{ route('users.topics.manage', [auth()->user()->name, $topic->id]) }} " class="list-group-item-action d-block gap-3 py-2 m-2 bg-white" aria-current="true">
                    <!-- COVER DISCUSSION START HERE ########### -->
                    <div class="d-block justify-content-center mb-4 overflow-hidden" style="max-height: 30vh;">
                        @if ($topic -> image)
                            <img src="{{ '/storage/images/topic/'.$topic->topic.'/'.$topic->image }}" alt="twbs" width="100%" class="rounded flex-shrink-0">
                        @else
                            <img src="/images/icon-alliance/message.png" alt="twbs" width="100%" class="rounded flex-shrink-0">
                        @endif
                        <small class="opacity-50 text-nowrap">By {{ $topic->user->name }}</small>
                    </div>
                    <!-- Create new Discussion START HERE ########### -->
                    <div class="d-flex gap-2 w-100 justify-content-between">
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
                                        <button type="submit" class="btn btn-info btn-sm">New topic</button>
                                    </form>

                                @endauth
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Modify Content START HERE ############### -->
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h4 class="mb-2">{{ $topic-> topic}}</h4>
                            <nav>{{ $topic-> description}}</nav>
                            <small class="opacity-50 text-nowrap">{{ $topic-> created_at->diffForHumans() }}</small>
                            
                            <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                                @auth
                                
                                    <form action="{{ route('users.addcontent',  $topic) }}" method="get" class="mr-2">
                                    @csrf
                                        <button type="submit"class="btn btn-dark btn-sm btn-info"><i class="fa fa-image"></i> Add content</button>
                                    </form>
                                    <form action="{{ route('users.addexercise',  $topic) }}" method="get" class="mr-1 m-2">
                                    @csrf
                                        <button type="submit"class="btn btn-dark btn-sm btn-info"><i class="fa fa-question"></i> Add Exercise</button>
                                    </form>
                                    <form action="{{ route('users.addprompt',  $topic) }}" method="get" class="mr-1 m-2">
                                    @csrf
                                        <button type="submit"class="btn btn-dark btn-sm btn-info"><i class="fa fa-question"></i> Add prompt</button>
                                    </form>
                                    <!-- START DELETE TOPICS -->
                                    <form action="{{ route('users.updatetopics',  $topic-> topic) }}" method="get" class="mr-1">
                                    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark btn-sm btn-info"><i class="fa fa-edit"></i> Update</button>
                                    </form>
                                    <!-- END DELETE TOPICS -->
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
        <!-- END Listed Topics here  #################################################-->
        <!-- START CONTENT Topics here  #################################################-->
        <div class="col-lg-6 shadow-sm">
            <h3 class="p-2 fw-light my-3 border-bottom">List of Contents</h3>
            @if ($topics[0]->content-> count())
                @foreach($topics[0]->content as $content)
                <a href="" class="list-group-item list-group-item-action border d-flex gap-3 py-2 my-2 bg-white shadow-sm" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="fw-bold">{{ $content-> title}} /<small>Type -{{ $content-> type}}</small></h6>
                            <small class="opacity-50 text-nowrap">{{ $content-> created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class=" px-0 pt-0">
                        @auth
                            <form action="" method="post" class="mr-1">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash text-danger text-light"></i> Delete</button>
                            </form>
                        @endauth
                    </div>
                </a>
                @endforeach
            @else
            <div class="col-lg-12 text-center"> 
                <div class="d-flex justify-content-center align-items-center">
                    <img src="/images/icon-alliance/chat1.png" class="border-3" alt="twbs" width="" height="200" class="flex-shrink-0 ">
                </div>
                No content added
            </div>
            @endif

            <h3 class="p-2 fw-light my-3 border-bottom">List of Prompts Questions</h3>
            <!-- START Prompts here #######################" -->
            @if ($topics[0]->prompts-> count())
                @foreach($topics[0]->prompts as $prompts)
                <a href="" class="list-group-item list-group-item-action border d-flex gap-3 py-2 mb-2 bg-white shadow-sm" aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <nav>{{ $prompts-> question}}</nav>
                            <small class="opacity-50 text-nowrap">{{ $prompts-> created_at->diffForHumans() }}</small>
                            
                        </div>
                        <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                            @auth
                                <form action="" method="post" class="mr-1">
                                @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash text-danger text-light"></i> Delete</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </a>
                @endforeach
            @else
            <div class="col-lg-12 text-center">
            </div>
            @endif
        </div>
        <!-- END CONTENT Topics here  #################################################-->


        <!-- START Notifications here -->
        <div class="col-md-6 shadow-sm">
            <h3 class="p-2 fw-light my-3 border-bottom">Questions</h3>
             <!-- --------------------- START NEW TABLE --------------------->
            @if($topics[0]->exercise->isEmpty())
                <div class="px-4 py-5 my-3 sm:px-6"></div>
            @else
            
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                    @foreach($topics[0]->exercise as $question)
                    <a href="{{ route('detailQuestion', $question->id) }}" class="list-group-item list-group-item-action border d-flex gap-3 py-2 m-2 bg-white shadow-sm" aria-current="true">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <nav>{{ $question->question}}</nav>
                                <div class="text-sm text-gray-900">Is_active- {{ $question->is_active === '1'  ? 'Yes' : 'No' }}</div>
                                <small class="opacity-50 text-nowrap">{{ $question-> created_at->diffForHumans() }}</small>
                                <div class="d-flex flex-wrap align-items-center px-0 pt-1">
                                    @auth
                                        <form action="{{route('deleteQuestion',$question->id)}}" method="post" class="mr-1">
                                        @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <form action="{{ route('createQuestion', $topic->id )}}" class="mr-1">
                                            @csrf
                                            <button class="btn btn-info btn-sm">Create</button>
                                        </form>
                                        <i class="fa-solid fa fa-toggle-off fa-2x text-info"></i>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    <!-- ---------------- END NEW TABLE --------------------- -->
                </div>
            </div>
            @endif
                <!-- ---------------- END NEW TABLE --------------------- -->






        </div>
        <!-- END Topics Notification here -->









        </div>
        <!-- END CONTENTS HERE -->
    </div>

    
</div> 

    
    <!--====== COURSES SINGEl PART ENDS ======-->
    
@endsection
