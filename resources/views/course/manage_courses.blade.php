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
                        <form action="{{ route('users.createcourse',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Create new course</button>
                        </form>
                        <form action="{{ route('users.createlessons', [$course[0]->user, $course[0]->id]) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Add lesson</button>
                        </form>
                        <form action="{{ route('users.course',  auth()->user()->name) }}" method="get" class="mr-1">
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
    <div class="col-lg-3">
        @if ($course -> count())
            @foreach($course as $courses)
            <div class="mb-4">
                <div class="container-fluid">
                    <h5 class="display-7 py-1 fw-bold">{{ $courses-> name}}</h5>
                    <p style="font-size: 14px">{{ $courses-> description}}</p>
                </div>
            </div>
            @endforeach
        @endif

        <div class="container d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
            <form action="{{ route('learning.course', [$course[0]->id]) }}" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>

        
        <div class="container bg-light py-1">
            <p class="mt-3 mb-2">Activate or Desactivate Course</p>
            <p class="text-info">At least 3 course activating the course</p>
            
            <form class="container d-flex justify-content-between align-items-center" novalidate action="{{ route('users.course.manage.saveCourseUser', [$courses->user, $courses->id]) }}" method="post">
                @csrf        
                <div class="form-check form-switch">
                    @if($courses->isvalidate)
                        <input name="checker" class="form-check-input" type="checkbox" checked id="flexSwitchCheckChecked" >
                    @else
                        <input name="checker" class="form-check-input" type="checkbox"  id="flexSwitchCheckChecked" >
                    @endif
                </div>
               
                @if ($lessons -> count() >= 2)
                    <button class="btn btn-muted btn-sm text-info border" type="submit">Save</button>
                @endif
            </form>
        </div>

        <div class="p-3 gray-bg my-2 rounded">
            <p class="text-secondary pb-2">Delete course</p>
            @auth
                <form action="{{ route('users.course.delete', [$course[0] ->user, $course[0]->id]) }}" method="post" class="mr-1">
                @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endauth
        </div>
    </div>
    
    
    

    <div class="col-lg-8 py-1">
        @if ($lessons -> count())
            @foreach($lessons as $lesson)
                <a href="{{ route('users.lesson.details', [$lesson->user, $lesson->id]) }}" class="list-group-item-action d-flex my-1 flex-wrap justify-content-between align-items-center gap-3 py-1 bg-light rounded border" aria-current="true">
                    <div class="col-sm-2 overflow-hidden" >
                        <img src="/images/icon/plan2.png" alt="twbs" width="60px" height="60px" class="rounded flex-shrink-0">
                    </div>
                    <div class="col-sm-9 d-flex gap-2 w-100 justify-content-between align-items-start">
                        <div class="">
                            <p class="pt-2 mt-2 mb-2 lh-1 text-black fw-bold"  > {{ $lesson-> title}} </p>
                            <nav class="mb-0 opacity-100 my-1 text-secondary"> 
                                <p class="text-info" style="font-size: 14px">{{ Str :: limit($lesson-> description, 105) }}</p>
                            </nav>
                            <p class="opacity-80 text-nowrap" style="font-size: 14px">{{ $lesson-> created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <!-- Delete Lessons -->
                    <form class="container d-flex justify-content-between align-items-center" novalidate action="{{ route('users.lessons.delete', [$lesson->user, $lesson->id]) }}" method="post">
                        @csrf      
                        @method('DELETE')
                        <nav></nav>
                        <button class="btn btn-muted btn-sm text-danger border" type="submit">Delete</button>
                    </form>
                </a>
            @endforeach
        @else
            <p class="text-center pt-5 fw-light">No lessons added</p>
        @endif
           
    </div>
        
</div>
    



    
@endsection
