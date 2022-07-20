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
                        <form action="{{ route('users.createlessons', [$lesson->course->user, $lesson->course->id]) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Add lesson</button>
                        </form>
                        <form action="{{ route('users.updatecourses',  [auth()->user()->name, $lesson->course->id] ) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-edit"></i> Update</button>
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
        @if ($lesson->course)
            <div class="mb-4">
                <div class="container-fluid">
                    <h5 class="display-7 py-1 fw-bold">{{ $lesson->course-> name}}</h5>
                    <p style="font-size: 14px">{{ $lesson->course-> description}}</p>
                </div>
            </div>
        @endif

        <div class="container d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
            <form action="{{ route('learning.course', [$lesson->course->id]) }}" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>

    </div>
    
    
    

    <div class="col-lg-8 py-1">
    <form class="needs-validation" novalidate action="{{ route('users.updatelessons',  $lesson) }}" method="post">
      <div class="row g-3">
        @csrf

        <div class="col-md-12">
            <label for="title" class="form-label"> Title</label>
            <input type="text" name="title" id="title" placeholder="Your title" 
            class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ $lesson->title}}">
            
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="col-md-12">
            <label for="content" class="form-label"> Content</label>
            <br>
            <label class="text-info pt-1" for="">{{$lesson->content}}</label>
            <textarea name="content" id="content" placeholder="content" cols="30" rows="6"
            class="form-control py-2  rounded-lg @error('content') border border-danger @enderror" value="{{ $lesson->content}}"></textarea>

            @error('content')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <br>
            <label class="text-info pt-1" for="">{{$lesson->description}}</label>
            <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="5" value="{{ $lesson->description }}"></textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <p class="text-info py-3"><i class="fa fa-edit"></i> Section 1m</p>

        <div class="col-md-12">
            <label for="subtitle1" class="form-label">subtitle1</label>
            <input type="text" name="subtitle1" id="subtitle1" placeholder="Your subtitle1" 
            class="form-control py-2  rounded-lg @error('subtitle1') border border-danger @enderror" value="{{ $lesson->subtitle1}}">
            
            @error('subtitle1')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="description1" class="form-label">Description1</label>
            <br>
            <label class="text-info pt-1" for="">{{$lesson->description1}}</label>
            <textarea class="form-control py-2  rounded-lg @error('description1') border border-danger @enderror" name="description1" id="description1" cols="20" rows="4" value="{{ $lesson->description1 }}"></textarea>

            @error('description1')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="code1" class="form-label">Code1</label>
            <br>
            <label class="text-info pt-1" for="">{{$lesson->code1}}</label>
            <textarea class="form-control py-2  rounded-lg @error('code1') border border-danger @enderror" name="code1" id="code1" cols="20" rows="4" value="{{ $lesson->code1 }}"></textarea>

            @error('code1')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="col-md-12">
            <label for="link1" class="form-label">link1</label>
            <input type="text" name="link1" id="link1" placeholder="Your link1" 
            class="form-control py-2  rounded-lg @error('link1') border border-danger @enderror" value="{{ $lesson->link1}}">
            
            @error('link1')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <p class="text-info py-3"><i class="fa fa-edit"></i> Section 3</p>

        <div class="col-md-12">
            <label for="subtitle2" class="form-label">subtitle2</label>
            <input type="text" name="subtitle2" id="subtitle2" placeholder="Your subtitle2" 
            class="form-control py-2  rounded-lg @error('subtitle2') border border-danger @enderror" value="{{ $lesson->subtitle2}}">
            
            @error('subtitle2')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="description2" class="form-label">Description2</label>
            <br>
            <label class="text-info pt-1" for="">{{$lesson->description2}}</label>
            <textarea class="form-control py-2  rounded-lg @error('description2') border border-danger @enderror" name="description2" id="description2" cols="20" rows="4" value="{{ $lesson->description2 }}"></textarea>

            @error('description2')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="code2" class="form-label">Code2</label>
            <br>
            <label class="text-info pt-1" for="">{{$lesson->code2}}</label>
            <textarea class="form-control py-2  rounded-lg @error('code2') border border-danger @enderror" name="code2" id="code2" cols="20" rows="4" value="{{ $lesson->code2 }}"></textarea>
            @error('code2')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="link2" class="form-label">link2</label>
            <input type="text" name="link2" id="link2" placeholder="Your link2" 
            class="form-control py-2  rounded-lg @error('link2') border border-danger @enderror" value="{{ $lesson->link2}}">
            
            @error('link2')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <p class="text-info py-3"><i class="fa fa-edit"></i> Section 4</p>

        <div class="col-md-12">
            <label for="subtitle3" class="form-label">subtitle3</label>
            <input type="text" name="subtitle3" id="subtitle3" placeholder="Your subtitle3" 
            class="form-control py-2  rounded-lg @error('subtitle3') border border-danger @enderror" value="{{ $lesson->subtitle3}}">
            
            @error('subtitle3')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="description3" class="form-label">Description3</label>
            <br>
            <label class="text-info pt-1" for="">{{$lesson->description3}}</label>
            <textarea class="form-control py-2  rounded-lg @error('description3') border border-danger @enderror" name="description3" id="description3" cols="20" rows="4" value="{{ $lesson-> description3 }}"></textarea>
            @error('description3')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="code3" class="form-label">Code3</label>
            <br>
            <label class="text-info pt-1" for="">{{$lesson->code3}}</label>
            <textarea class="form-control py-2  rounded-lg @error('code3') border border-danger @enderror" name="code3" id="code3" cols="20" rows="4" value="{{ $lesson->code3 }}"></textarea>

            @error('code3')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="link3" class="form-label">link3</label>
            <input type="text" name="link3" id="link3" placeholder="Your link3" 
            class="form-control py-2  rounded-lg @error('link3') border border-danger @enderror" value="{{ $lesson->link3}}">
            
            @error('link3')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
      
      </div>
      <hr>
          <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Register</button>
              <a class="btn btn-danger" href="{{ route('users.course.manage', [$lesson->user, $lesson->course->id])}}">Cancel</a>
          </div>
        </form>
    </div>
        
</div>
    


    
@endsection