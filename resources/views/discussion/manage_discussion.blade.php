@extends('layouts.app')

@section('content')

@auth
    <x-menu />
@endauth


<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="bg-light p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <div class="bg-dark text-secondary px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-white">Discussion</h1>
            </div>
            <div class="overflow-hidden" style="max-height: 15vh;">
                <div class="container px-3">
                    <img src="/icons/abstract_background.jpg" class="img-fluid rounded-3 shadow-lg mb-4" alt="Example image" width="90%" height="500" loading="lazy">
                </div>
            </div>
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $discussion-> count() }}</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div>
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-light">Add discussion</button>
                        </form>

                        <form action="{{ route('users.createtopics',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">New topic</button>
                        </form>

                        <form action="" method="post" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">Collaborators</button>
                        </form>
                    @endauth
                    </span>
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>




<div class="row">
    <!-- START list of Discussions -->
    <div class="col-md-4">
        <div class="list-group bg-light">
            <h6 class="p-2">Created</h6>
            @if ($discussion -> count())
                @foreach($discussion as $discussions)
                <a href="" class="list-group-item list-group-item-action border d-block gap-3 py-2 m-2 bg-white" aria-current="true">
                    <div class="d-flex justify-content-between mb-2">
                        @if ($discussions-> files )
                            <img src="{{ '/storage/images/discussion/'.$discussions->id.'/'.$discussions->files }}" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm border border-info p-1">
                        @else
                            <img src="/images/icon-alliance/discussion.png" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-1 border border-warning p-1">
                        @endif
                        <small class="opacity-50 text-nowrap">{{ $discussions-> created_at->diffForHumans() }}</small>
                    </div>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $discussions-> title}}</h6>
                            <nav>{{ $discussions-> description}}</nav>
                            <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $topics-> count() }}</span> </div> </div>
                            </div>
                        </div>
                        
                    </div>
                </a>
                @endforeach
            @else
                <span>No discussion</span>
            @endif
        </div>
    </div>
    <!-- END LIST OF DISCUSSION -->
    <!-- Participated POSTED MESSAGE  -->
    <div class="col-md-5">
        <div class="list-group bg-light">
            <h6 class="p-2 mb-0">Topics</h6>
            @if ($topics -> count())
                @foreach($topics as $topic)
                <a href="" class="list-group-item list-group-item-action border d-flex gap-3 py-2 m-2 bg-white" aria-current="true">
                    <img src="/images/icon-alliance/message.png" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 shadow-sm p-2">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $topic-> topic}}</h6>
                            <nav>{{ $topic-> question_1}}</nav>
                            <nav>
                                @if ($topic-> content ->count() )
                                    <img class="my-3 img-circle " style="border-radius: 10px;" alt="twbs" width="100%" height=""
                                    src="{{ '/storage/images/content/'.$topic->content[0]->topic_id.'/'.$topic->content[0]->file }}" alt="ll">
                                @endif
                                <!-- <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100%" height="" class="flex-shrink-0 m-2"> -->
                            </nav>
                            <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                                    <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $topic-> likes ->count() }}</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">{{ $topic-> message ->count() }}</span> </span> 
                                </div>
                                @auth
                                    <!-- START CHECK IF USER HAS FILE OF CONTENT -->
                                    @if ($topic->content->count() && $topic->content[0]->file)
                                        <form action="" method="get" class="mr-1 m-2">
                                        @csrf
                                            <button type="submit"class="btn btn-light">Delete image</button>
                                        </form>
                                    @else
                                        <form action="{{ route('users.addcontent',  $topic) }}" method="get" class="mr-1 m-2">
                                        @csrf
                                            <button type="submit"class="btn btn-light">Add content</button>
                                        </form>
                                    @endif
                                    <!-- END CHECK IF USER HAS FILE -->
                                    <!-- START DELETE TOPICS -->
                                    <form action="{{ route('users.updatetopics',  $topic-> topic) }}" method="get" class="mr-1">
                                    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light">update</button>
                                    </form>
                                    <!-- END DELETE TOPICS -->
                                    <form action="" method="post" class="mr-1">
                                    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light">Delete</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                        <small class="opacity-50 text-nowrap">{{ $topic-> created_at->diffForHumans() }}</small>
                    </div>
                </a>
                @endforeach
            @else
                <div class="col-lg-12 d-block justify-content-center align-items-center text-center mb-2">
                    <img src="/images/icon-alliance/chat1.png" alt="twbs" width="220" height="" class="flex-shrink-0 p-1">
                    @auth
                        <form action="{{ route('users.createtopics',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-info">Add Topic</button>
                        </form>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <!-- END POSTED MESSAGE -->

    <!-- START LIST NOTIFICATION START HERE -->
    <div class="col-md-3">
        <h6 class="border-bottom pb-2 mb-0">Recent Notifications</h6>
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
    </div>
    <!-- END LIST NOTIFICATION START HERE -->
</div>


@endsection