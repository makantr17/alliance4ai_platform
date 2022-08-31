
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
                <h1 class="display-6 fw-bold text-dark">My Topics</h1>
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
                        <form action="{{ route('users.createtopics',  auth()->user()) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Create Topic</button>
                        </form>
                        <form action="{{ route('users.topics.manage', [auth()->user(), $topic->id]) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-arrow-left"></i> Back</button>
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
        @if ($topic)
            <div class="mb-4">
                <div class="container-fluid">
                    <h4 class="display-7 py-1 fw-bold ">{{ $topic-> topic}}</h4>
                    <p style="font-size: 14px"><strong class="text-primary">Description </strong><br> {{ $topic-> description}}</p>
                    <p><small>hosted by</small> <small class="text-info">{{ $topic-> user->name}}</small></p>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center">
            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" topic="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" topic="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" topic="Ajith Pushparaj" alt="j">
            </div>
            <form action="{{ route('topics.details', [$topic->id]) }}" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>
    </div>
    

    <div class="col-lg-8 py-1">

                <div class="row g-5 py-3 mx-2 justify-content-center">
                    
                    <div class="col-md-12 col-lg-12">
                        <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                            novalidate action="{{ route('users.updatetopics',  $topic-> topic) }}" method="post" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Update Topics</h5>
                            </div>

                            <div class="col-md-12">
                                <label for="topic" class="form-label">Topics</label>
                                <input type="text" name="topic" id="topic" placeholder="topic" 
                                class="form-control py-2  rounded-lg @error('topic') border border-danger @enderror" value="{{ $topic->topic }}">

                                @error('topic')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="category" class="form-label">Category - </label>
                                    <label class="text-info" for="">{{ $topic->category }}</label>
                                    <select name="category" id="category"
                                        class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                                        <option value="">Choose Category</option>
                                        <option value="1">Futur Tech</option>
                                        <option value="2">History & Ethics</option>
                                        <option value="3">Workplace Skills</option>
                                    </select>
                                @error('category')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            
                            <div class="col-md-12 pt-3">
                                <label for="description" class="form-label">Describe the topic</label>
                                <p class="text-info">{{$topic-> description}}</p>
                                <textarea class="form-control py-1  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="5" value=""></textarea>
                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr class="my-4">

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('users.topics.manage', [auth()->user(), $topic->id]) }}" class="btn btn-danger">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>

        </div>
    </div>

@endsection

