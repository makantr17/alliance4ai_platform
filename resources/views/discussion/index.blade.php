@extends('layouts.app')

@section('content')

@auth
    <x-menu />
@endauth

<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="bg-light p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <div class="px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-dark">Discussion</h1>
            </div>
            
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $discussions-> count() }}</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-info">Add discussion</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>

<div class="row align-items-center justify-content-center">
    <!-- START list of Discussions -->
    <div class="col-md-9">
        <div class="list-group bg-white">
            @if ($discussions -> count())
                @foreach($discussions as $discussion)
                <a href="{{ route('discussion.topic', [ $discussion->id, $discussion->user]) }}" class="list-group-item list-group-item-action border d-flex gap-3 py-2 m-2 bg-white" aria-current="true">
                    @if ($discussion-> files )
                        <img src="{{ '/storage/images/discussion/'.$discussion->id.'/'.$discussion->files }}" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 border  p-0 shadow-sm">
                    @else
                        <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0 border p-0 shadow-sm">
                    @endif
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $discussion-> title}}</h6>
                            <nav>{{ $discussion-> description}}</nav>
                            <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                                
                                <!-- DELETE OR MODIFY THE DISCUSSION -->
                                @auth
                                    <!-- START CHECK IF USER HAS FILE OF CONTENT -->
                                    @if ($discussion->files)
                                        <form action="{{ route('users.discussion.add_cover', $discussion ) }}" method="get" class="mr-1 m-2">
                                        @csrf
                                            <button type="submit"class="btn border btn-light btn-sm">Modify cover</button>
                                        </form>
                                    @else
                                        <form action="{{ route('users.discussion.add_cover', $discussion ) }}" method="get" class="mr-1 m-2">
                                        @csrf
                                            <button type="submit"class="btn btn-danger border btn-sm">Add cover</button>
                                        </form>
                                    @endif
                                    <!-- END CHECK IF USER HAS FILE -->
                                    <!-- START DELETE TOPICS -->
                                    <form action="" method="get" class="mr-1">
                                    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light border btn-sm">Update content</button>
                                    </form>
                                    <!-- END DELETE TOPICS -->
                                    <form action="" method="post" class="mr-1">
                                    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                        <small class="opacity-50 text-nowrap">{{ $discussion-> created_at->diffForHumans() }}</small>
                    </div>
                </a>
                @endforeach
            @else
                <div class="col-lg-12 d-block justify-content-center align-items-center text-center mb-2">
                    <img src="/images/icon-alliance/chat1.png" alt="twbs" width="220" height="" class="flex-shrink-0 p-1">
                    @auth
                        <form action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-info">Add discussion</button>
                        </form>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <!-- END LIST OF DISCUSSION -->
    

    <!-- START LIST NOTIFICATION START HERE -->
    
    <!-- END LIST NOTIFICATION START HERE -->
    

</div>



@endsection