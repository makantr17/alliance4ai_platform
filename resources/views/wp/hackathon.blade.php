@extends('layouts.app')

@section('content')


<div class="px-4 py-5 my-0 text-center" style=" background-image: url('/images/icon/back-col8.png');">
    <img class="d-block mx-auto mb-4" src="" alt="" width="72" height="57">
    <h1 class="display-5 fw-bold text-white">Centered hero</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Participate to the hackerthons hosted by Future Maker.</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Hackerthon</button>
        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Join</button>
      </div>
    </div>
</div>

<div class="container px-4 pt-3" id="custom-cards">
    <!-- <div class="p-4 mb-2 rounded-3 d-flex align-items-center" style="height: 35vh;  background-image: url('/images/icon/back-col8.png');">
        <a href="/" class=" align-items-center text-dark text-decoration-none">
            <h3 class="display-6 fw-bold text-white">Hackathon</h3>
            <p class="text-white py-2">Participate to the hackerthons hosted by Future Maker</p>
            <form action="" method="" class="mr-1">
            @csrf
                <button type="submit" class="btn btn-danger btn">New Hackathon</button>
            </form>
        </a>
    </div> -->


    <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
        <div class="col">
            <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-sliders text-muted fsize-3"></i>&nbsp;  25 </span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div>
            </div>
        </div>
        <div class=" d-flex flex-wrap align-items-center px-0 py-3 ">
            <form class="needs-validation pr-2" novalidate action="{{ route('topics') }}" method="get">
                @csrf  
                <div class="d-flex align-items-center">
                    <i class="fa fa-sort pr-2" style="font-size:20px"></i>
                    <select name="category" id="category"
                        class="form-control rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                        <option value="">Select all</option>
                        <option value="1">Futur Tech</option>
                        <option value="2">History & Ethics</option>
                        <option value="3">Workplace Skills</option>
                    </select>
                    @error('category')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <button class="btn btn-info btn-sm ml-2" type="submit">Filter</button>
                </div>
            </form>
            @auth
                <form action="{{ route('users.create_hackerthon',  auth()->user()->name) }}" method="" class="mr-1">
                @csrf
                    <button type="submit" class="btn btn-info btn-sm">New Hackathon</button>
                </form>
            @endauth
            </span>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-1">
    @if ($hackerthons -> count())
        @foreach($hackerthons as $hackerthon)
            <div class="col-md-3 py-4">
                <div class="card card-cover h-100 overflow-hidden text-white rounded-5 shadow-sm" 
                style="background-image: url('/images/icon/back-slim3.png');background-repeat: no-repeat; background-size: 100% 110px; background-position: bottom;">
                    <div class="d-flex flex-column h-100 p-3 pb-2 text-shadow-1">
                        <h5 class="pt-2 mt-2 mb-0 display-7 lh-1 fw-bold"> {{$hackerthon-> category}} </h5>
                        <p style="font-size: 14px; line-height:22px; font-weight:300" class="py-2">{{ Str :: limit($hackerthon-> description, 60) }}</p>

                        <!-- images -->
                        <small class="opacity-80 text-nowrap">      
                            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                                <img width="25" height="25" class="rounded-circle flex-shrink-0 border" class="sc-jtmhnJ jpjECk" src="\images\icon-alliance\avatar.png" title="Abhishek Kumar" alt="r">
                                <img width="25" height="25" class="rounded-circle flex-shrink-0 border" class="sc-jtmhnJ jpjECk" src="\images\Mamady_Kante.jpg" title="Ajith Pushparaj" alt="j"></div>
                        </small>
                        <!-- End images -->
                        @if ($hackerthon->category === 'Machine Learning' )
                            <img src="/images/icon/plan2.png" alt="twbs"  width="90" height="90" class="rounded-circle m-2">
                        @elseif ($hackerthon->category === 'Bensfield connect' )
                            <img src="/images/icon/plan4.png" alt="twbs" width="90" height="90" class="rounded-circle m-2">
                        @else
                            <img src="/images/icon/plan7.png" alt="twbs" width="90" height="90" class="rounded-circle m-2">
                        @endif
                        <ul class="d-flex list-unstyled mt-auto">
                            <a href="{{ route('hackathons.details',  $hackerthon->id) }}" class="mr-2 btn btn-light btn">view</a>
                            <li class="d-flex align-items-center">
                                <i class="fa fa-calendar m-1 text-light"></i>
                                <small class="text-black">1 days ago</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    </div>
  </div>



</div>


@endsection