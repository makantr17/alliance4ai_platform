@extends('layouts.app')

@section('content')


<div class="container py-3">
    @if ($hackerthon -> count())
        @foreach($hackerthon as $hackerthons)
        <div class="p-4 mb-2 bg-info rounded-3">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="mx-3 my-3"  width="80" height="80" src="/images/icon-alliance/diploma.png" alt="enterprise">
                <h3 class="display-6 fw-bold text-white">{{ $hackerthons-> titre}}</h3>
            </a>
        </div>
        @endforeach
    @endif  

    <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
        <div class="col">
            <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-sliders text-muted fsize-3"></i>&nbsp;  25 </span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div>
            </div>
        </div>
        <div class=" d-flex flex-wrap align-items-center px-0 py-3 ">
            
            @auth
                <form action="{{ route('hackathons.details',  $hackerthons->id) }}" method="" class="mr-1">
                @csrf
                    <button type="submit" class="btn btn-secondary btn-sm">Join Hackathon</button>
                </form>
            @endauth
            <form action="{{ route('hackathons.participants',  $hackerthons->id) }}" method="" class="mr-1">
                @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Participants</button>
                </form>
            </span>
        </div>
    </div>

    <div class="row g-5 py-2">
      
      <div class="col-md-12 col-lg-12">
        <div>
            <div class="corses-tab ">
                @if($hackerthon)
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="overview-description">
                                <div class="singel-description pt-30 pb-30">
                                    <h6>Participants</h6>
                                    <nav class="text-muted">list of competitors participating to the Hackerthon</nav>
                                </div>

                                <div class="list-group">
                                    @if ($hackerthon[0]->competitors -> count())
                                        @foreach($hackerthon[0]->competitors as $competitor)
                                        <a href="#" class=" list-group-item-action d-flex gap-3 p-2 py-2 border-bottom" aria-current="true">
                                            
                                            @if ($competitor->user->image )
                                                <img src="{{ '/storage/images/'.$competitor->user_id.'/'.$competitor->user->image }}" alt="twbs" width="60" height="60" class="rounded-circle border border flex-shrink-0">
                                            @else
                                                <img src="/images/icon-alliance/hacker.png" alt="twbs" width="60" height="60" class="rounded-circle border border-info p-1 flex-shrink-0">
                                            @endif
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <nav class="mb-0 fw-bold text-dark"> {{ $competitor->user->name}} </nav>
                                                    <small class="text-muted" >{{ $competitor->user->city}}, {{ $competitor->user->country}}</small>
                                                    <br><strong class="text-muted">{{ $competitor->user->profession}}</strong>
                                                </div>
                                                <small class="opacity-70 text-nowrap">{{ $hackerthons-> created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                        @endforeach

                                    @else
                                        <nav class="text-danger">No Discussion Available or posted</nav>
                                    @endif
                                </div>


                                
                            </div> <!-- overview description -->
                        </div>
                    </div> 
                @else
                    <p></p>
                @endif
            </div>

            

        </div>

        <!-- #### List  -->
        
      </div>
    </div>
</div>




@endsection