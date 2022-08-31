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
                        <form action="{{ route('users.createlessons', [$course->user, $course->id]) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Add lesson</button>
                        </form>
                        <form action="{{ route('users.updatecourses',  [auth()->user(), $course->id] ) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-edit"></i> Update</button>
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
    <div class="col-lg-3">
        @if ($course)
            <div class="mb-4">
                <div class="container-fluid">
                    <h5 class="display-7 py-1 fw-bold">{{ $course-> name}}</h5>
                    <p style="font-size: 14px">{{ $course-> description}}</p>
                </div>
            </div>
        @endif

        <div class="container d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
            <form action="{{ route('learning.course', [$course->id]) }}" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>

    </div>
    
    
    

    <div class="col-lg-8 py-1">
    <form class="needs-validation" novalidate action="{{ route('users.updatecourses',  [auth()->user(), $course] ) }}" method="post">
          <div class="row g-3">
            @csrf

            <div class="col-md-6">
                <label for="category" class="form-label">Category Theme</label>
                    <select name="category" id="category"
                        class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                        <option value="">Choose Category</option>
                        <option value="0">Future Tech</option>
                        <option value="1">Workplace Skills</option>
                        <option value="2">Ethics & History</option>
                    </select>

                @error('category')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" placeholder="Your name" 
                class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="{{ $course->name }}">
                
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-md-12">
              <label for="description" class="form-label">Description</label>
              <br>
              <label class="text-info" for="">{{$course->description}}</label>
              <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="4" value="{{ $course->description}}"></textarea>

              @error('description')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <!-- <div class="mb-3">
                <label for="image" class="form-label">Upload Cover</label>
                <input class="form-control @error('image') border border-danger @enderror" name="image" type="file" id="image" value="{{ old('image')}}" onchange="loadFile(event)">

                @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div> -->
            <!-- <div class="col-md-12 py-1 bg-light">
                <img id="output" class="my-3 img-circle" style="rounded" width="150" height="" alt="#" src="#" />
            </div>
            <script>
                var loadFile = function(event){
                    var output= document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                }
            </script> -->
            
          </div>
          <hr>
          <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Register</button>
              <a class="btn btn-danger" href="{{ route('users.course.manage', [$course->user, $course->id])}}">Cancel</a>
          </div>
        </form>
    </div>
        
</div>
    



    
@endsection
