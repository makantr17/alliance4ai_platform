
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
                <h1 class="display-6 fw-bold text-dark">Hackathon</h1>
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
                        <form action="{{ route('users.create_hackerthon',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Create new Hackathon</button>
                        </form>
                        <form action="{{ route('users.update_hackerthon',  $hackerthon-> title) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Edit hackathon</button>
                        </form>
                        <form action="" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-braille"></i> Courses</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>


<div class="col-lg-12 row y-1">
    <div class="col-lg-3 mx-2 bg-light py-2">
        @if ($hackerthon)
            <div class="mb-4">
                <div class="container-fluid">
                    <h4 class="display-7 py-1 fw-bold ">{{ $hackerthon-> title}}</h4>
                    <p style="font-size: 14px"><strong class="text-primary">Start at </strong> {{ $hackerthon-> start_date}}</p>
                    <p style="font-size: 14px"><strong class="text-primary">Deadline </strong> {{ $hackerthon-> deadline}}</p>
                    <p><small>hosted by</small> <small class="text-info">{{ $hackerthon-> user->name}}</small></p>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
            <form action="{{ route('hackathons.details', [$hackerthon->id]) }}" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>
    </div>
    

    <div class="col-lg-8 py-1">
      <div class="">
              @if($hackerthon)
                  <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                          <div class="overview-description1">
                              <div class="singel-description1 pt-30 pb-20">
                                  <h4 style="padding-bottom: 2px"   class="py-2">{{ $hackerthon-> subtitle1}}</h4 style="padding-bottom: 2px"  >
                                  <nav class="text-muted" style="line-height:30px">{{ $hackerthon-> description1 }}</nav>
                              </div>
                              @if( $hackerthon-> images)
                                  <div class="bg-light rounded  my-2">
                                      <img src="{{'.images/hackathon/'.$hackerthon->title.'/'.$hackerthon->images}} " width="100%" alt="Courses">
                                  </div>
                                  
                              @endif

                              @if( $hackerthon-> subtitle2 &&  $hackerthon-> description2)
                                  <div class="singel-description1 pt-30 pb-20">
                                      <h4 style="padding-bottom: 2px"   class="py-2">{{ $hackerthon-> subtitle2}}</h4 style="padding-bottom: 2px"  >
                                      <nav class="text-muted" style="line-height:30px">{{ $hackerthon-> description2 }}</nav>
                                  </div>
                              @endif
                              
                              <div class="singel-description1 pt-30">
                                  <h4 style="padding-bottom: 2px"  >Instruction</h4 style="padding-bottom: 2px"  >
                                  <nav class="text-muted" style="line-height:30px">{{ $hackerthon-> instructions }}</nav>

                                  @if( $hackerthon-> limit_group)
                                      <nav class="text-muted mt-4" style="line-height:30px">Number of allowed user by group <strong class="text-info"> {{ $hackerthon-> limit_group }} </strong></nav>
                                  @endif
                                  @if( $hackerthon-> first_prize)
                                      <h6 class="py-2 text-info">The competition will be awarded based on each group' performance:</h6>
                                      <ul>
                                          <li>First Prize:  ${{ $hackerthon-> first_prize }}</li>
                                          <li>Second Prize:  ${{ $hackerthon-> second_prize }}</li>
                                          <li>Third Prize:  ${{ $hackerthon-> third_prize }}</li>
                                      </ul>
                                  @endif
                              </div>
                              
                              @if( $hackerthon-> rules)
                                  <div class="singel-description1 pt-30">
                                      <h4 style="padding-bottom: 2px"  >Rules</h4 style="padding-bottom: 2px"  >
                                      <nav class="text-muted" style="line-height:30px">{{ $hackerthon-> rules }}</nav>
                                  </div>
                              @endif

                              <!-- ########## Paragraph 2 -->
                              @if( $hackerthon-> evaluation)
                                  <div class="singel-description1 pt-30">
                                      <h4 style="padding-bottom: 2px"  >Evaluation</h4 style="padding-bottom: 2px"  >
                                      <nav class="text-muted" style="line-height:30px">{{ $hackerthon-> evaluation }}</nav>
                                  </div>
                              @endif


                              <div class="singel-description1 pt-30">
                                  <h6 style="padding-bottom: 2px" >Ressources</h6>
                                  <nav class="text-muted">Learn more about this Hackathon by exploring the
                                      <a href="{{ $hackerthon-> link1 }}" class="text-info py-2">link</a>  
                                      @if( $hackerthon-> link2)
                                          and <a href="{{ $hackerthon-> link1 }}" class="text-info py-2">the link</a>
                                      @endif
                                  </nav>
                              </div>
                              <!--###########IF detaills CODE 2 -->
                              <div class="bg-light rounded pt-4 my-2">
                                  <nav class="text-muted">{{ $hackerthon-> link1 }}</nav>
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
    
@endsection






