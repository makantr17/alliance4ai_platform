@extends('layouts.app')

@section('content')


<div class="container-fluid mb-5">
    
    @if ($group -> count())
      @foreach($group as $groups)
      <div class="my-1 rounded-3">
          <a href="#" class="d-block align-items-center text-dark text-decoration-none">
            <div class="bg-light text-secondary mb-2 text-center">
                <div class="overflow-hidden" style="max-height: 25vh;">
                    <div class="">
                        @if ($groups-> image )
                            <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" alt="twbs" width="80%" height="500" loading="lazy" class="img-fluid rounded shadow-lg mb-4 rounded">
                        @else
                            <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100%" height="500" loading="lazy" class="img-fluid rounded shadow-lg mb-4 rounded">
                        @endif
                        <!-- <img src="/icons/abstract_background.jpg" class="img-fluid rounded shadow-lg mb-4 rounded" alt="Example image" width="100%" height="500" loading="lazy"> -->
                    </div>
                </div>
            </div>
            
          </a>
          
      </div>
      <div class="d-flex gap-2 w-100 justify-content-between align-items-center my-4">
          <nav>
                <div class="pt-1">
                    <h1 class="display-6 fw-bold text-black">{{ $groups-> name}}</h1>
                </div>
                <p> <i class="fa fa-map-marker text-danger" aria-hidden="true"></i> <small>{{ $groups-> location}}</small> </p>
          </nav>
          <div class="d-flex align-items-center my-1">
              @auth
                    <form action="" method="get" class="mr-1 m-1">
                    @csrf
                        <button type="submit"class="btn btn-secondary btn-sm border">Discussions</button>
                    </form>
                    <form action="" method="get" class="mr-1 m-1">
                    @csrf
                        <button type="submit"class="btn btn-secondary btn-sm border">Members</button>
                    </form>
                    
              @endauth
              @guest
                  <a class="btn btn-secondary" href="{{ route('login') }}" >Signin</a>
              @endguest
          </div>
      </div>
      <!-- <hr class="my-1"> -->
      @endforeach
    @else
        <p>No Groups Available or posted</p>
    @endif  
    <!-- <div>
        <h1 class='h1 py-2 pt-5'>Circles</h1>
    </div> -->
    <div class="row bg-light py-2">
        <div class="col-md-8">
            <div class="my-1 p-3 bg-body rounded shadow-sm">
              <!-- Highlight Futur Discussion -->
              <h6 class=" pb-2 my-3 fw-bold text-dark ">Recent Discussion Tagged</h6>
              <div class="col-lg-12 list-group">
                @if ($discussions -> count())
                    @foreach($discussions as $discussion)
                        @if (str_contains($discussion->groups, $groups->id)) 
                        <!-- USER TOPIC START HERE -->
                        <a href="{{ route('discussion.details', [$discussion->id]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-1 my-2 bg-light border" aria-current="true">
                            <div>    
                                @if ($discussion->files )
                                    <img src="{{ '/storage/images/discussion/'.$discussion->id.'/'.$discussion->files }}" alt="lkd" width="80" height="80" class="rounded-circle flex-shrink-0 p-1">
                                @else
                                    <img src="/images/icon-alliance/user.png" alt="twbs" width="80" height="80" class="rounded-circle flex-shrink-0 p-1">
                                @endif
                            </div>
                            <div class="d-flex gap-2 w-100 justify-content-between align-items-start">
                                <div>
                                    <h6 class="mb-2">{{ $discussion-> title}}</h6>
                                    <nav class="mb-0 opacity-75"><strong>Meeting date</strong> {{ $discussion-> date}}</nav>
                                    <nav class="mb-0 opacity-75"><strong>Start_at</strong> {{ $discussion-> start_time}}</nav>
                                    <div>
                                        @if ($discussion->user->image )
                                            <img src="{{ '/storage/images/'.$discussion->user_id.'/'.$discussion->user->image }}" alt="lkd" width="40" height="40" class="rounded-circle border flex-shrink-0 my-2">
                                        @else
                                            <img src="/images/icon-alliance/user.png" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0  p-1 ">
                                        @endif
                                        <small class="opacity-50 text-success"> hosted by: {{ $discussion-> user->name }}</small>
                                        <small class="opacity-50 text-nowrap">{{ $discussion-> created_at->diffForHumans() }}</small>
                                    </div>
                                    
                                </div>
                                <div class="d-flex align-items-center">
                                    @auth
                                        <!-- START CHECK IF USER HAS FILE OF CONTENT -->
                                        <form action="{{ route('discussion.details', [$discussion->id]) }}" method="get" class="mr-1 m-2">
                                        @csrf
                                            <button type="submit"class="btn btn-secondary btn-sm">Join</button>
                                        </form>
                                        <!-- END CHECK IF USER HAS FILE -->
                                        <form action="" method="get" class="mr-1">
                                        @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Decline</button>
                                        </form>
                                    @endauth
                                </div>
                                
                                
                            </div>
                        </a>
                        <!-- USER TOPIC END HERE -->
                        @endif
                    @endforeach
                @else
                    <p class="text-muted"></p>
                @endif
                </div>

              <small class="d-block text-end mt-3">
                <a href="#">All updates</a>
              </small>
            </div>


            <!-- Past Discussion -->
            <div class="my-1 p-3 bg-body rounded shadow-sm">
                <h6 class=" pb-2 my-3 fw-light text-dark ">Past Discussion Tagged</h6>
            </div>



        </div>

        <div class="col-md-4">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
              <h6 class=" pb-2 mb-0">Future Makers</h6>
              @if ($group_members -> count())
                  @foreach($group_members as $group_member)
                    <!-- MEMBERS LISTED HERE -->
                    <x-members :group_members="$group_member" />
                    <!-- MEMBERS LISTED STOP HERE -->
                  @endforeach
              @else
                  <p></p>
              @endif
            </div>
        </div>
    </div>

</div>



@endsection