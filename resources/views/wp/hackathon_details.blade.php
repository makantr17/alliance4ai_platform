@extends('layouts.app')

@section('content')


<div class="container py-3">
    @if ($hackerthon -> count())
        @foreach($hackerthon as $hackerthons)
        <div class="p-4 mb-2 rounded-3 d-flex align-items-center" style="height: 35vh;  background-image: url('/images/icon/back-col7.png');">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <h3 class="display-6 fw-bold text-white">{{ $hackerthons-> title}}</h3>
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
                    <form nonvalidate action="{{ route('hackathons.details',  $hackerthons->id) }}" method="post" class="mx-1">
                    @csrf
                        <button type="submit" class="btn btn-muted text-info btn-sm">Join Hackathon</button>
                    </form>
                @endif
            @endauth
            @auth
                @if ($hackerthons->isCompeting(auth()->user()))
                    <a href="" class=" m-0 text-secondary"> joined</a>
                    <!-- Inplement unjoin button -->
                    <form class="mx-1"novalidate  action="{{ route('hackathons.members.unjoin', [$hackerthons->id]) }}" method="post">
                    @csrf
                        @method('DELETE')
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-muted text-danger border btn-sm my-0"> <i class="fa fa-sign-out"></i> Unjoin</button>
                            </div>
                        </div>
                    </form>
                @endif
            @endauth
            <div class="mx-1">
                <a href="{{ route('hackathons')}}">
                    <button class="btn btn-primary border ">Back</button>
                </a>
            </div>
        </div>
    </div>

    <div class="row g-5 py-2 d-flex justify-content-center">
      
      <div class="col-md-12 col-lg-10">
        <div>
            <div class="">
                @if($hackerthon)
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="overview-description1">
                                <!-- <h3 class="fw-bold text-black mt-1">{{ $hackerthon[0]-> title}}</h3> -->
                                
                                <div class="singel-description1 pt-30 pb-20">
                                    <h4 style="padding-bottom: 2px"   class="py-2">{{ $hackerthon[0]-> subtitle1}}</h4 style="padding-bottom: 2px"  >
                                    <nav class="text-muted" style="line-height:30px">{{ $hackerthon[0]-> description1 }}</nav>
                                </div>
                                @if( $hackerthon[0]-> images)
                                    <div class="bg-light rounded  my-2">
                                        <img src="{{'/storage/images/hackathon/'.$hackerthon[0]->title.'/'.$hackerthon[0]->images}} " width="100%" alt="Courses">
                                    </div>
                                    
                                @endif

                                @if( $hackerthon[0]-> subtitle2 &&  $hackerthon[0]-> description2)
                                    <div class="singel-description1 pt-30 pb-20">
                                        <h4 style="padding-bottom: 2px"   class="py-2">{{ $hackerthon[0]-> subtitle2}}</h4 style="padding-bottom: 2px"  >
                                        <nav class="text-muted" style="line-height:30px">{{ $hackerthon[0]-> description2 }}</nav>
                                    </div>
                                @endif
                                
                                <div class="singel-description1 pt-30">
                                    <h4 style="padding-bottom: 2px"  >Instruction</h4 style="padding-bottom: 2px"  >
                                    <nav class="text-muted" style="line-height:30px">{{ $hackerthon[0]-> instructions }}</nav>

                                    @if( $hackerthon[0]-> limit_group)
                                        <nav class="text-muted mt-4" style="line-height:30px">Number of allowed user by group <strong class="text-info"> {{ $hackerthon[0]-> limit_group }} </strong></nav>
                                    @endif
                                    @if( $hackerthon[0]-> first_prize)
                                        <h6 class="py-2 text-info">The competition will be awarded based on each group' performance:</h6>
                                        <ul>
                                            <li>First Prize:  ${{ $hackerthon[0]-> first_prize }}</li>
                                            <li>Second Prize:  ${{ $hackerthon[0]-> second_prize }}</li>
                                            <li>Third Prize:  ${{ $hackerthon[0]-> third_prize }}</li>
                                        </ul>
                                    @endif
                                </div>
                                
                                @if( $hackerthon[0]-> rules)
                                    <div class="singel-description1 pt-30">
                                        <h4 style="padding-bottom: 2px"  >Rules</h4 style="padding-bottom: 2px"  >
                                        <nav class="text-muted" style="line-height:30px">{{ $hackerthon[0]-> rules }}</nav>
                                    </div>
                                @endif

                                <!-- ########## Paragraph 2 -->
                                @if( $hackerthon[0]-> evaluation)
                                    <div class="singel-description1 pt-30">
                                        <h4 style="padding-bottom: 2px"  >Evaluation</h4 style="padding-bottom: 2px"  >
                                        <nav class="text-muted" style="line-height:30px">{{ $hackerthon[0]-> evaluation }}</nav>
                                    </div>
                                @endif


                                <div class="singel-description1 pt-30">
                                    <h6 style="padding-bottom: 2px" >Ressources</h6>
                                    <nav class="text-muted">Learn more about this Hackathon by exploring the
                                        <a href="{{ $hackerthon[0]-> link1 }}" class="text-info py-2">link</a>  
                                        @if( $hackerthon[0]-> link2)
                                            and <a href="{{ $hackerthon[0]-> link1 }}" class="text-info py-2">the link</a>
                                        @endif
                                    </nav>
                                </div>
                                <!--###########IF detaills CODE 2 -->
                                <div class="bg-light rounded pt-4 my-2">
                                    <nav class="text-muted">{{ $hackerthon[0]-> link1 }}</nav>
                                </div>
                            </div> <!-- overview description1 -->
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