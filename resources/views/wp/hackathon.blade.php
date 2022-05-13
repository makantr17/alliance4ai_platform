@extends('layouts.app')

@section('content')



<div class="container px-4 pt-3" id="custom-cards">
    <div class="col row d-flex row pb-4 pt-4 justify-content-between  align-items-center">
        <h1 class="py-2 mt-2 mb-2 display-5 lh-1 fw-bold">Hackathon</h1>
    </div>

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
            <div class="col-md-3">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('/icons/abstract_background.jpg');">
                    <div class="d-flex flex-column h-100 p-3 pb-2 text-shadow-1">
                        <h4 class="pt-2 mt-2 mb-2 display-7 lh-1 fw-bold"> {{$hackerthon-> titre}} </h4>
                        <p>{{ Str :: limit($hackerthon-> description, 70) }}</p>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="d-flex align-items-center me-3">
                                <i class="fa fa-map-marker m-1"></i>
                                <small>California</small>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="fa fa-calendar m-1"></i>
                                <small>5d</small>
                            </li>
                            <a href="{{ route('hackathons.details',  $hackerthon->id) }}" class="m-2 btn btn-danger btn-sm">view</a>
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