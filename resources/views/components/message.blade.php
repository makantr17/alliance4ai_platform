@props(['messages'=> $message])

<div class="row no-gutters align-items-center border my-3 p-3 rounded-2 bg-white shadow-sm">
    <div class="d-none d-md-block col-2">
        <div class="row no-gutters align-items-center">
            <div class="align-items-center"> 
                @if ($messages ->user->image)
                    <img class="d-block rounded-circle p-1 border border-info" width="60" height="60" src="{{ '/storage/images/'.$messages->user_id.'/'.$messages -> user ->image}}" alt="12">
                @else
                    <img class="d-block p-2 rounded-circle" width="60" height="60" src="/images/icon-alliance/man.png" alt="default">
                @endif
                <div class="media-body flex-truncate">
                    <a href="{{ route('discussion.user.messages.posts', $messages->user ) }}" class="text-muted small text-truncate" data-abc="true">by {{ $messages->user->name }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col"> 
        <a href="javascript:void(0)" class="text-big text-body py-1" data-abc="true">{{ $messages-> message}}</a> 
        <div class="text-muted small mt-1">Posted {{ $messages-> created_at->diffForHumans()}} &nbsp;·&nbsp; </div>
        <div class=" d-flex flex-wrap justify-content-between align-items-center px-0 pt-0">
            <div class="px-3 pt-1"> 
                <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true">
                    <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">{{ $messages->likescomment->count() }} </span> 
                </a> 
                <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle ml-2" data-abc="true">
                    <i class="fa fa-eye"></i>&nbsp; <span class="align-middle">{{ $messages->likescomment->count() }}</span> 
                </a>  
                
                <!-- like button -->
                <span class="text-muted d-inline-flex align-items-center align-middle ml-2">
                @auth
                    @if (!$messages->commentlikedBy(auth()->user()))
                        <form action="{{ route('discussion.topic.messages.likescomment', $messages ) }}" method="post" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-light">Like</button>
                        </form>
                    @else
                        <form action="{{ route('discussion.topic.messages.likescomment', $messages ) }}" method="post" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light">UnLike</button>
                        </form>
                    @endif
                @endauth
                </span>

                <!-- delete button -->
                <span class="text-muted d-inline-flex align-items-center align-middle ml-2">
                    @can('delete', $messages)
                    <form action="{{ route('discussion.topic.messages', $messages ) }}" method="post" class="mr-1">
                        @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light"> <span class="align-middle">Delete</span></button>
                        </form>
                    @endcan
                </span>

            </div>
            <!-- DELETING COMMENT POST START HERE -->
            
            <!-- CHECK LIKES AND UNLIKES - END HERE -->
        </div>
    </div>
</div>