@extends('layouts.app')

@section('content')


<div class="container py-3">
    @if ($hackerthon -> count())
        @foreach($hackerthon as $hackerthons)
        <div class="p-4 mb-2 rounded-3 d-flex align-items-center" style="height: 35vh;  background-image: url('/images/icon/back-col7.png');">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <h3 class="display-6 fw-bold text-white">{{ $hackerthons-> titre}}</h3>
            </a>
        </div>
        @endforeach
    @endif

    <div class="d-flex gap-2 w-100 justify-content-between align-items-center mb-2">
        <div class="col">
            <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                <small class="opacity-80 text-nowrap">      
                    <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                        <img width="35" height="35" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="\images\Mamady_Kante.jpg" title="Ajith Pushparaj" alt="j"></div>
                </small>    
                &nbsp;  </span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-2"> &nbsp; 
                <p class="align-middle text-secondary" style="font-size:13px">
                    <a href="{{ route('hackathons.participants',  $hackerthons->id) }}">{{$hackerthon[0]->competitors -> count()}} joined</a>,
                    {{ $hackerthon[0]-> created_at->diffForHumans() }}
                </p>
                </span> </div>
            </div>
        </div>
        <div class=" d-flex flex-wrap align-items-center px-0 py-3 ">
            @auth
                @if (!$hackerthons->isCompeting(auth()->user()))
                    <form nonvalidate action="{{ route('hackathons.details',  $hackerthons->id) }}" method="post" class="mr-1">
                    @csrf
                        <button type="submit" class="btn btn-muted text-info btn-sm">Join Hackathon</button>
                    </form>
                @endif
            @endauth
            <div class="">
                <a href="{{ route('hackathons.details',  $hackerthons->id) }}">
                    <button class="btn btn-primary border ">Back</button>
                </a>
            </div>
        </div>
    </div>

    

    <div class="row g-5 py-2">
      
      <div class="col-md-12 col-lg-12">
        <div>
            <div class="">
                @if($hackerthon)
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="overview-description">
                                <div class="singel-description pt-30 pb-10">
                                    <h3 class="fw-bold text-info mt-1 py-2">Participants</h3>
                                    <nav class="text-muted">list of competitors participating to this Hackerthon</nav>
                                </div>
                                <div class="list-group pt-3">
                                    @if ($hackerthon[0]->competitors -> count())
                                        @foreach($hackerthon[0]->competitors as $competitor)
                                        <a href="#" class=" list-group-item-action d-flex gap-3 px-1 py-3 border-bottom" aria-current="true">
                                            
                                            @if ($competitor->user->image )
                                                <img src="{{ '/storage/images/'.$competitor->user_id.'/'.$competitor->user->image }}" alt="twbs" width="70" height="70" class="rounded-circle border border flex-shrink-0">
                                            @else
                                                <img src="/images/icon-alliance/hacker.png" alt="twbs" width="70" height="70" class="rounded-circle border border-info p-1 flex-shrink-0">
                                            @endif
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <nav class="mb-0 fw-bold text-dark"> {{ $competitor->user->name}} </nav>
                                                    <small class="text-muted" >From {{ $competitor->user->city}}, {{ $competitor->user->country}}</small>
                                                    <br><strong class="text-muted">{{ $competitor->user->profession}}</strong>
                                                </div>
                                                <small class="opacity-70 text-nowrap">{{ $hackerthons-> created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                        @endforeach

                                    @else
                                        <div class="d-flex justify-content-center">
                                            <i class="fa fa-hourglass-half pt-5 pb-2 fa-3x"></i> <br>
                                        </div>
                                        <div class="text-muted text-center col-12">
                                            <a href="">join </a>
                                              the hackerthon;
                                        </div>
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