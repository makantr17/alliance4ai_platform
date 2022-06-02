@props(['commentfiles' => $commentfiles])

<div class="row no-gutters align-items-center border my-2 p-1 rounded-2 bg-white ">
    <div class="d-none d-md-block col-3">
        <div class="row no-gutters align-items-center">
            <div class="align-items-center"> 
                @if ($commentfiles ->user->image)
                    <img class="d-block rounded-circle p-1 border border-info" width="40" height="40" src="{{ '/storage/images/'.$commentfiles->user_id.'/'.$commentfiles -> user ->image}}" alt="12">
                @else
                    <img class="d-block p-1 border border-info rounded-circle" width="40" height="40" src="/images/icon-alliance/man.png" alt="default">
                @endif
                <div class="media-body flex-truncate">
                    <a href="" class="small text-info" data-abc="true">{{ $commentfiles->user->name }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col"> 
        <a href="javascript:void(0)" class="text-big text-body py-1" data-abc="true">{{ $commentfiles-> message}}</a> 
        <div class="text-muted small mt-1">Posted {{ $commentfiles-> created_at->diffForHumans()}} &nbsp;·&nbsp; </div>
        <div class=" d-flex flex-wrap justify-content-between align-items-center px-0">
            <div class="px-0 pt-1"> 
                <!-- delete button -->
                <span class="text-muted d-inline-flex align-items-center align-middle ml-2">
                    @can('delete', $commentfiles)
                    <form action="" method="post" class="mr-1">
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