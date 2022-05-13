@props(['commentprompts' => $commentprompts])

<div class="row no-gutters align-items-center border my-3 p-2 rounded-2 bg-white ">
    <div class="d-none d-md-block col-2">
        <div class="row no-gutters align-items-center">
            <div class="align-items-center"> 
                @if ($commentprompts ->user->image)
                    <img class="d-block rounded-circle p-1 border border-info" width="45" height="45" src="{{ '/storage/images/'.$commentprompts->user_id.'/'.$commentprompts -> user ->image}}" alt="12">
                @else
                    <img class="d-block p-1 border border-info rounded-circle" width="45" height="45" src="/images/icon-alliance/man.png" alt="default">
                @endif
                <div class="media-body flex-truncate">
                    <a href="" class="text-muted small text-center" data-abc="true">{{ $commentprompts->user->name }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col"> 
        <a href="javascript:void(0)" class="text-big text-body py-1" data-abc="true">{{ $commentprompts-> message}}</a> 
        <div class="text-muted small mt-1">Posted {{ $commentprompts-> created_at->diffForHumans()}} &nbsp;·&nbsp; </div>
        <div class=" d-flex flex-wrap justify-content-between align-items-center px-0 pt-0">
            <div class="px-0 pt-1"> 
                <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true">
                    <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">1 </span> 
                </a> 
                <a href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle ml-2" data-abc="true">
                    <i class="fa fa-eye"></i>&nbsp; <span class="align-middle">2</span> 
                </a>  
                <!-- delete button -->
                <span class="text-muted d-inline-flex align-items-center align-middle ml-2">
                    @can('delete', $commentprompts)
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