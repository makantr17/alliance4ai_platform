
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
                        <form action="{{ route('users.createtopics',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Create Topic</button>
                        </form>
                        <form action="{{ route('users.topics.manage', [auth()->user()->name, $topic->id]) }}" method="get" class="mr-1">
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
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
            </div>
            <form action="" method="get" >
            @csrf
                <button type="submit" class="btn btn-sm my-2 btn-secondary">Go to site</button>
            </form>
        </div>
    </div>
    

    <div class="col-lg-8 py-1">
            <div class="row g-5 py-3 mx-2 justify-content-center">
                
                <div class="col-md-12 col-lg-12">
                    <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                        novalidate action="{{ route('users.addcontent',  $topic ) }}" method="post" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="col-12">
                            <h5 class="py-3 fw-bold text-info">New Content</h5>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="title" class="form-label">The ressource title</label>
                            <input type="text" name="title" id="title" placeholder="Your title" 
                            class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="">
                            
                            @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="link" class="form-label">Link o the ressource</label>
                            <input type="text" name="link" id="link" placeholder="Your link" 
                            class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="">
                            
                            @error('link')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Cover</label>
                            <input class="form-control @error('image') border border-danger @enderror" name="image" type="file" id="image" value="{{ old('image')}}" onchange="loadFile(event)">

                            @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 py-1 bg-light">
                            <img id="output" class="my-3 img-circle" style="rounded" width="150" height="" alt="#" src="#" />
                        </div>

                        <script>
                            var loadFile = function(event){
                                var output= document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                            }
                        </script>

                        <hr class="my-4">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Register</button>
                            <a href="{{ route('users.topics.manage', [auth()->user()->name, $topic]) }}" class="btn btn-danger">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
