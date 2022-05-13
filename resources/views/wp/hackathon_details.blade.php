@extends('layouts.app')

@section('content')


<div class="container py-3">
    @if ($hackerthon -> count())
        @foreach($hackerthon as $hackerthons)
        <div class="p-4 mb-2 bg-info rounded-3">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="mx-3 my-3"  width="80" height="80" src="/images/icon-alliance/diploma.png" alt="enterprise">
                <h3 class="display-6 fw-bold text-white">{{ $hackerthons-> titre}}</h3>
                <a href=""></a>
                <div class="col-md-12">
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

    <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
        <div class="col">
            <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-sliders text-muted fsize-3"></i>&nbsp;  25 </span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div>
            </div>
        </div>
        <div class=" d-flex flex-wrap align-items-center px-0 py-3 ">
           
            @auth
                @if (!$hackerthons->isCompeting(auth()->user()))
                    <form nonvalidate action="{{ route('hackathons.details',  $hackerthons->id) }}" method="post" class="mr-1">
                    @csrf
                        <button type="submit" class="btn btn-secondary btn-sm">Join Hackathon</button>
                    </form>
                @endif
            @endauth
            <form action="{{ route('hackathons.participants',  $hackerthons->id) }}" method="" class="mr-1">
                @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Participants</button>
                </form>
            </span>
        </div>
    </div>

    <div class="row g-5 py-2">
      
      <div class="col-md-9 col-lg-12">
        <div>
            <div class="corses-tab ">
                @if($hackerthon)
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="overview-description">
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