

@extends('layouts.app')

@section('content')


@auth
    <x-menu />
@endauth

<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <!-- HEADER SLIDE START HERE -->
        <div class="px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-dark">Discussions</h1>
            </div>
            
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between border-bottom py-1">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">2</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.creatediscussion',  auth()->user()) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Host discussion</button>
                        </form>
                        <form action="{{ route('users.discussion',  auth()->user()) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-braille"></i> Discussions</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>


<div class="album py-3 bg-white">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @if ($discussions -> count())
        @foreach($discussions as $discussion)
        <div class="col-lg-3">
          <div class="card shadow-sm bg-light">
            <div class=" justify-content-center text--center align-items-center">
                @if ($discussion->category === '1' )
                    <img src="/icons/background_futurtech.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                @elseif ($discussion->category === '2' )
                    <img src="/icons/background_fm.png" alt="twbs" width="" height="" class="rounded flex-shrink-0">
                @else
                    <img src="/icons/background_education.png
                    " alt="twbs" width="" height="" class="rounded flex-shrink-0">
                @endif
            </div>
            <div class="card-body">
              <h5 class="fw-bold pb-2" style="font-size:16px">{{ $discussion-> discussion}}</h5>
              <p class="card-text pb-1" style="font-size:14px">{{ Str :: limit($discussion-> description, 45) }}</p>
              <small class="text-info">{{ $discussion-> created_at->diffForHumans() }}</small>
              <div class="d-flex align-items-center">
                <div class="btn-discussion">
                    <form novalidate action="{{ route('users.discussion.manage', [$discussion->user, $discussion->id]) }}">
                        <button class="btn btn-muted btn-sm border" type="submit"><i class="fa fa-wrench"></i> Manage</button>
                    </form>
                </div>
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
                
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @else
            <p>no discussion have been posted</p>
        @endif
        
      </div>
    </div>
</div>
        
@endsection
