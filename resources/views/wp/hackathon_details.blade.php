@extends('layouts.app')

@section('content')


<div class="container py-3">
    @if ($hackerthon -> count())
        @foreach($hackerthon as $hackerthons)
        <div class="p-4 mb-2 rounded-3 d-flex align-items-center" style="height: 35vh;  background-image: url('/images/icon/back-col7.png');">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="mx-3 my-3"  width="80" height="80" src="/images/icon-alliance/diploma.png" alt="enterprise">
                <h3 class="display-6 fw-bold text-white">{{ $hackerthons-> titre}}</h3>
                <div class="col-md-2">
                    @auth
                        @if (!$hackerthons->isCompeting(auth()->user()))
                            <form nonvalidate action="{{ route('hackathons.details',  $hackerthons->id) }}" method="post" class="mr-1">
                            @csrf
                                <button type="submit" class="btn btn-danger btn-lg">Join Hackathon</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </a>
        </div>
        @endforeach
    @endif  

    <div class="d-flex gap-2 w-100 justify-content-between align-items-center mb-5">
        <div class="col">
            <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> 
                <small class="opacity-80 text-nowrap">      
                    <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                        <img width="25" height="25" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="\images\icon-alliance\avatar.png" title="Abhishek Kumar" alt="r">
                        <img width="25" height="25" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="\images\icon-alliance\teacher.png" title="Jason Sykes" alt="s">
                        <img width="25" height="25" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="\images\Mamady_Kante.jpg" title="Ajith Pushparaj" alt="j"></div>
                </small>    
                &nbsp;  </span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> &nbsp; <small class="align-middle text-info">{{$hackerthon[0]->competitors -> count()}} joined</small> </span> </div>
            </div>
        </div>
        <div class=" d-flex flex-wrap align-items-center px-0 py-3 ">
            @auth
                @if (!$hackerthons->isCompeting(auth()->user()))
                    <form nonvalidate action="{{ route('hackathons.details',  $hackerthons->id) }}" method="post" class="mr-1">
                    @csrf
                        <button type="submit" class="btn btn-primary btn">Join Hackathon</button>
                    </form>
                @endif
            @endauth
            <form action="{{ route('hackathons.participants',  $hackerthons->id) }}" method="" class="mr-1">
                @csrf
                    <button type="submit" class="btn btn-primary">Participants</button>
                </form>
            </span>
            <div class="">
                <a href="{{ route('hackathons')}}">
                    <button class="btn btn-primary border "> back</button>
                </a>
            </div>
        </div>
    </div>

    <div class="row g-5 py-2">
      
      <div class="col-md-9 col-lg-12">
        <div>
            <div class="">
                @if($hackerthon)
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="overview-description">
                                <h4 class="fw-bold text-info mt-5">{{ $hackerthon[0]-> titre}}</h4>
                                <div class="singel-description pt-30 pb-20">
                                    <h6>Description</h6>
                                    <nav class="text-muted">{{ $hackerthon[0]-> description }}</nav>
                                </div>
                                <div class="bg-light rounded p-5 my-2">
                                    <img src="/images/course/cu-1.jpg" width="100%" alt="Courses">
                                </div>
                                
                                <div class="singel-description pt-30">
                                    <h6>Instruction</h6>
                                    <nav class="text-muted">{{ $hackerthon[0]-> instructions }}</nav>
                                </div>
                                <!-- ########## Paragraph 2 -->
                                <div class="singel-description pt-30">
                                    <h6>Tasks</h6>
                                    <nav class="text-muted">{{ $hackerthon[0]-> description }}</nav>
                                    <a href="" class="text-info py-2">Follow this link</a>
                                </div>
                                <!--###########IF detaills CODE 2 -->
                                <div class="bg-light rounded p-4 my-2">
                                    <nav class="text-muted">{{ $hackerthon[0]-> tasks }}</nav>
                                </div>
                            </div> <!-- overview description -->
                        </div>
                    </div> 
                @else
                    <p></p>
                @endif
            </div>
        </div>

        
      </div>
    </div>
</div>




@endsection