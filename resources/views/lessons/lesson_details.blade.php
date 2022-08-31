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
                <h1 class="display-6 fw-bold text-dark">Courses</h1>
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
                        <form action="{{ route('users.createcourse',  auth()->user()) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Create new course</button>
                        </form>
                        <form action="" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Add lesson</button>
                        </form>
                        <form action="{{ route('users.course',  auth()->user()) }}" method="get" class="mr-1">
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
    <div class="col-lg-4">
        
            <div class="mb-4">
                <div class="container-fluid">
                    <h3 class="text-info">Lessons</h3>
                    <br>
                    <p class="display-7 py-1 fw-bold">{{ $lesson-> course->name}}</p>
                    <br>
                    <h5 class="display-7 py-1 fw-bold">{{ $lesson-> title}}</h5>
                    <p style="font-size: 14px">{{ $lesson-> description}}</p>
                </div>
            </div>
            
        <div class="d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
        </div>
    </div>
    

    <div class="col-lg-8 py-1">
        
        
        <div class="col-sm-12 col gap-2 w-100 justify-content-between align-items-start">
            <div>
                <h5 class="pt-2 mt-2 mb-2 lh-1 text-black fw-bold"> {{ $lesson-> subtitle1}} </h5>
                <nav class="p-3 bg-light opacity-100 my-4 text-secondary"> 
                    <p class="text-muted">{{ $lesson-> description1 }}</p>
                </nav>
                <nav class="p-3 bg-light opacity-100 my-4 text-secondary"> 
                    <code>{{ $lesson-> code1 }}</code>
                </nav>
                <nav class="mt-1 opacity-100 my-1 text-secondary"> 
                    <a class="text-muted">{{ $lesson-> link1 }}</a>
                </nav>
            </div>
            <div>
                <h5 class="pt-2 mt-2 mb-2 lh-1 text-black fw-bold"> {{ $lesson-> subtitle2}} </h5>
                <nav class="opacity-100 my-4 text-secondary"> 
                    <p class="text-muted">{{ $lesson-> description2 }}</p>
                </nav>
                <nav class="opacity-100 my-4 text-secondary"> 
                    <code>{{ $lesson-> code2 }}</code>
                </nav>
                <nav class="opacity-100 my-4 text-secondary"> 
                    <a class="text-muted">{{ $lesson-> link2 }}</a>
                </nav>
            </div>
            <div>
                <h5 class="pt-2 mt-2 mb-2 lh-1 text-black fw-bold"> {{ $lesson-> subtitle3}} </h5>
                <nav class="opacity-100 my-4 text-secondary"> 
                    <p class="text-muted">{{ $lesson-> description3 }}</p>
                </nav>
                <nav class="mt-1 opacity-100 my-1 text-secondary"> 
                    <p class="text-muted"></p>
                    <code>{{ $lesson-> code3 }}</code>
                </nav>
                <nav class="mt-1 opacity-100 my-1 text-secondary"> 
                    <a class="text-muted">{{ $lesson-> link3 }}</a>
                </nav>
            </div>
        </div>
    </div>
        
</div>
    



    
@endsection
