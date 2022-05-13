@extends('layouts.app')

@section('content')


<div class="container-fluid mb-5">
    @if ($group -> count())
      @foreach($group as $groups)
      <!-- Circle Information START HERE -->
      <div class="my-3 rounded-3">
          <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                @if ($groups-> image )
                    <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" alt="twbs" width="80" height="80" class="rounded-circle flex-shrink-0 border border-info  p-2 shadow-sm">
                @else
                    <img src="/images/icon-alliance/discussion.png" alt="twbs" width="80" height="80" class="rounded-circle flex-shrink-0 border border-warning  p-2 shadow-sm">
                @endif
                <h3 class="display-6 fw-bold px-2">{{ $groups-> name}}</h3>
          </a>
          <div class="container-fluid py-2">
              <div class="h-100 p-3">
                  <h4>{{ $groups-> titre}}</h4>
                  <p> <small>{{ $groups-> description}}</small> </p>
              </div>
          </div>
      </div>
      <!-- Circle Information END HERE -->
      <!-- NAVBAR START HERE -->
      <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
          <nav><h4>Discussion</h4></nav>
          <div class="d-flex align-items-center my-1">
              @auth
                    <form action="" >
                        <select class="p-2" name="" id="">
                                <option value="Ethics and History">Ethics and History</option>
                                <option value="Future Tech">Future Tech</option>
                                <option value="Workplace Skills">Workplace Skills</option>
                        </select>
                    </form>
                    
                    <form action="{{ route('topiccircle.createcirclediscussion',  $groups->id) }}">
                        @csrf
                        <button type="submit" class="btn btn-primary my-1 mx-1">Discussion</button>
                    </form>
              @endauth
              @guest
                  <a class="btn btn-primary" href="{{ route('login') }}" >Signin</a>
              @endguest
          </div>
      </div>
      <!-- NAVBAR END HERE -->
      <hr class="my-2">
      @endforeach
    @else
        <p>No Groups Available or posted</p>
    @endif  
    <!-- HEADER END HERE -->
    <!-- ROW START HERE -->
    <div class="row bg-light py-2">
        <div class="col-md-8">
            <!-- SEARCH BAR START HERE ###### -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item">Search</li>
                        </ul> <!-- nav -->
                        
                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- SEARCH BAR END HERE ###### -->
            
            <div class="my-1 p-3 bg-body rounded shadow-sm">
              <!-- <h6 class="pb-2 mb-0">Recent Udates</h6> -->
              <!-- DISCUSSION TOPIC START HERE #################33 -->
              <div class="col-lg-12 list-group">
                @if ($discussions -> count())
                    <!-- USER POST DISPLAYED START HERE -->
                    <a href="" class="list-group-item-action d-flex gap-3 py-3 my-2" aria-current="true">
                        @if ($discussions->user->image )
                            <img src="{{ '/storage/images/'.$discussions->user->id.'/'.$discussions->user->image }}" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 border border-info  p-1 shadow-sm">
                        @else
                            <img src="/images/user.png" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0 border border-warning  p-1 shadow-sm">
                        @endif
                        <!-- DETAILS ABOUT POST START HERE -->
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <h6 class="mb-0">{{ $discussions-> title}}</h6>
                                <p class="mb-0 opacity-75">{{ $discussions-> description}}</p>
                                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                                    <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">12</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div>
                                    <span class="text-muted d-inline-flex align-items-center align-middle ml-2">
                                    @auth
                                        @if (!$discussions->user)
                                            <form action="{{ route('discussion.topic.messages.likescomment', $discussions ) }}" method="post" class="mr-1">
                                            @csrf
                                                <button type="submit"class="btn btn-light">Like</button>
                                            </form>
                                        @else
                                            <form action="{{ route('discussion.topic.messages.likescomment', $discussions ) }}" method="post" class="mr-1">
                                            @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light">UnLike</button>
                                            </form>
                                        @endif
                                    @endauth
                                    </span>
                                    @guest
                                        <a class="" href="{{ route('login') }}" >Reply</a>
                                    @endguest
                                </div>
                            </div>
                            <small class="opacity-50 text-nowrap">{{ $discussions-> created_at->diffForHumans() }}</small>
                        </div>
                        <!-- DETAILS ABOUT POST END HERE -->
                    </a>
                    <!-- USER POST DISPLAYED END HERE -->
                @else
                    <p>No Discussion Available or posted</p>
                @endif
            </div>
            <!-- DISCUSSION TOPIC START HERE #################33 -->
            <!-- COMMENT FORM START HERE ############3 -->
            @if ($discussions -> count())
                <div class="list-group bg-light px-2">
                    <p class="fw-light">Replying</p>
                    <form class="needs-validation" novalidate action="{{ route('groups.members.topics', [$discussions->id]) }}" method="post">
                        <div class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <textarea type="text" name="message" id="message" placeholder="Your message" cols="5" rows="1"
                                class="form-control py-2  rounded-lg @error('message') border border-danger @enderror" value="cool"> </textarea>
                                
                                @error('message')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-secondary small">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
                <!-- COMMENT FORM END HERE ############3 -->
                <small class="d-block text-end mt-3">
                    <a href="#">Topic</a>
                </small>
            </div>
            <div class="my-1 p-3 bg-body rounded shadow-sm">
            <!-- COMMENTS START HERE ~#############  -->
                <div class="col-lg-12 list-group">
                    @if ($messages -> count())
                        @foreach($messages as $message)
                        <a href="" class="list-group-item list-group-item-action d-flex gap-3 py-2 my-2 border border-gray bg-white shadow" aria-current="true">
                            @if ($message ->user->image)
                                <img alt="twbs" width="50" height="50" class="rounded-circle flex-shrink-0 border p-1 shadow-sm" src="{{ '/storage/images/'.$message->user_id.'/'.$message -> user ->image}}" alt="12">
                            @else
                                <img alt="twbs" width="50" height="50" class="rounded-circle flex-shrink-0 border p-1 shadow-sm" src="/images/icon-alliance/man.png" alt="default">
                            @endif
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div class="col">
                                    <h6 class="mb-0">{{ $message-> user -> name}}</h6>
                                    <div class="mb-0 opacity-75">{{ $message -> message}}</div>
                                    <!-- INSERT LIKE BUTTONS  -->
                                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                                        <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">12</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div>
                                        <span class="text-muted d-inline-flex align-items-center align-middle ml-2">
                                        @auth
                                            @if (!$message->user)
                                                <form action="{{ route('discussion.topic.messages.likescomment', $message ) }}" method="post" class="mr-1">
                                                @csrf
                                                    <button type="submit"class="btn btn-light">Like</button>
                                                </form>
                                            @else
                                                <form action="{{ route('discussion.topic.messages.likescomment', $message ) }}" method="post" class="mr-1">
                                                @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light">UnLike</button>
                                                </form>
                                            @endif
                                        @endauth
                                        </span>
                                    </div>
                                </div>
                                <small class="opacity-50 text-nowrap">{{ $message-> created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                        @endforeach
                    @endif
                </div>
            <!-- COMMENTS END HERE ~#############  -->
                <small class="d-block text-end mt-3">
                    <a href="#">All updates</a>
                </small>
            </div>

                      
            <!-- NARROW START HERE ###### -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            <li class="page-item"><a href="#">3</a></li>
                            <li class="page-item">
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div>

        <div class="col-md-4">
            <h6 class="border-bottom pb-2 mb-0">Recent Notifications</h6>
            <!-- LIST NOTIFICATION START HERE -->
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
            <!-- LIST NOTIFICATION END HERE -->
            <!-- LIST MEMBERS OF CIRCLE START HERE -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
              <h6 class="border-bottom pb-2 mb-0">Future Makers</h6>
              @if ($group_members -> count())
                  @foreach($group_members as $group_member)
                    <x-members :group_members="$group_member" />
                  @endforeach
              @else
                  <p></p>
              @endif
              <small class="d-block text-end mt-3">
                <a href="#">All updates</a>
              </small>
            </div>
            <!-- LIST MEMBERS OF CIRCLE END HERE -->
            <!-- CALENDER START HERE -->
            <div>
                @auth
                    <x-calender />
                @endauth
            </div>
            <!-- CALENDER END HERE -->
        </div>
    </div>

</div>



@endsection