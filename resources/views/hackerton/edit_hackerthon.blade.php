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
                        <form action="{{ route('users.hackerthon',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-arrow-left"></i> Hackathons</button>
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

                <div class="row g-5 py-3 mx-2 justify-content-center">
                    
                    <div class="col-md-12 col-lg-12">
                        <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                            novalidate action="{{ route('users.update.hackerthon', [$hackerthon-> user, $hackerthon] ) }}" method="post" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Description</h5>
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Category Theme</label>
                                    <select name="category" id="category"
                                        class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ $hackerthon->category}}">
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

                            <div class="col-md-6">
                                <label for="title" class="form-label">Hackathon Title</label>
                                <input type="text" name="title" id="title" placeholder="Your title" 
                                class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ $hackerthon->title}}">
                                
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="subtitle1" class="form-label">Subtitle 1</label>
                                <input type="text" name="subtitle1" id="subtitle1" placeholder="subtitle 1" 
                                class="form-control py-2  rounded-lg @error('subtitle1') border border-danger @enderror" value="{{ $hackerthon->subtitle1}}">
                                
                                @error('subtitle1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="description1" class="form-label">Description1</label>
                                <textarea class="form-control py-2  rounded-lg @error('description1') border border-danger @enderror" name="description1" id="description1" cols="30" rows="5" value="{{ $hackerthon->description1 }}">{{ $hackerthon->description1 }}</textarea>

                                @error('description1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="subtitle2" class="form-label">Subtitle 2</label>
                                <input type="text" name="subtitle2" id="subtitle2" placeholder="subtitle 1" 
                                class="form-control py-2  rounded-lg @error('subtitle2') border border-danger @enderror" value="{{ $hackerthon->subtitle2}}">
                                
                                @error('subtitle2')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="description2" class="form-label">Description2</label>
                                <textarea class="form-control py-2  rounded-lg @error('description2') border border-danger @enderror" name="description2" id="description2" cols="30" rows="5" value="{{ $hackerthon->description2}}">{{ $hackerthon->description2}}</textarea>

                                @error('description2')
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
                            <!-- Submission process -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Submission Details</h5>
                            </div>
                            <div class="col-md-12">
                                <label for="instructions" class="form-label">Submission details</label>
                                <textarea class="form-control py-2  rounded-lg @error('instructions') border border-danger @enderror" name="instructions" id="instructions" cols="30" rows="4" value="{{ $hackerthon->instructions}}">{{ $hackerthon->instructions}}</textarea>

                                @error('instructions')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Evaluation process -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Evaluation Process</h5>
                            </div>
                            <div class="col-md-12">
                                <label for="evaluation" class="form-label">Evaluation details</label>
                                <textarea class="form-control py-2  rounded-lg @error('evaluation') border border-danger @enderror" name="evaluation" id="evaluation" cols="30" rows="4" value="{{ $hackerthon->evaluation}}">{{ $hackerthon->evaluation}}</textarea>

                                @error('evaluation')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Rules ..//§§///////////////// -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Set Rules</h5>
                            </div>

                            <div class="col-md-12">
                                <label for="rules" class="form-label">Lis of rules</label>
                                <textarea class="form-control py-2  rounded-lg @error('rules') border border-danger @enderror" name="rules" id="rules" cols="30" rows="4" value="{{ $hackerthon->rules}}">{{ $hackerthon->rules}}</textarea>

                                @error('rules')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="col-md-12">
                                <label for="limit_group" class="form-label">Set maximum member by group</label>
                                <input type="number" name="limit_group" id="limit_group" placeholder="limit_group" 
                                class="form-control py-2  rounded-lg @error('limit_group') border border-danger @enderror" value="{{ $hackerthon->limit_group }}">

                                @error('limit_group')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Prizes</h5>
                            </div>
                            <div class="col-md-4">
                                <label for="first_prize" class="form-label">First Prize</label>
                                <input type="number" name="first_prize" id="first_prize" placeholder="first" 
                                class="form-control py-2  rounded-lg @error('first_prize') border border-danger @enderror" value="{{ $hackerthon->first_prize}}">

                                @error('first_prize')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="second_prize" class="form-label">Second Prize</label>
                                <input type="number" name="second_prize" id="second_prize" placeholder="Second prize" 
                                class="form-control py-2  rounded-lg @error('second_prize') border border-danger @enderror" value="{{ $hackerthon->second_prize }}">

                                @error('second_prize')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="third_prize" class="form-label">Third Prize</label>
                                <input type="number" name="third_prize" id="third_prize" placeholder="Third prize" 
                                class="form-control py-2  rounded-lg @error('third_prize') border border-danger @enderror" value="{{ $hackerthon->third_prize }}">

                                @error('third_prize')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            
                            
                            <!-- Timeline for competition &&&&&&&&&&&&&&&& -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Timelines</h5>
                            </div>

                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" name="start_date" id="start_date" placeholder="start date" 
                                class="form-control py-2  rounded-lg @error('start_date') border border-danger @enderror" value="{{ $hackerthon->start_date }}">

                                @error('start_date')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="deadline" class="form-label">Deadline for submission</label>
                                <input type="date" name="deadline" id="deadline" placeholder="start date" 
                                class="form-control py-2  rounded-lg @error('deadline') border border-danger @enderror" value="{{ $hackerthon->deadline }}">

                                @error('deadline')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Timeline for competition &&&&&&&&&&&&&&&& -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">References</h5>
                                <p>These links will help competitors to explore and get ready for the hackethon</p>
                            </div>
                            <div class="col-md-6">
                                <label for="link1" class="form-label">link 1</label>
                                <input type="text" name="link1" id="link1" placeholder="link1" 
                                class="form-control py-2  rounded-lg @error('link1') border border-danger @enderror" value="{{ $hackerthon->link1 }}">

                                @error('link1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="link2" class="form-label">link 2</label>
                                <input type="text" name="link2" id="link2" placeholder="link2" 
                                class="form-control py-2  rounded-lg @error('link2') border border-danger @enderror" value="{{ $hackerthon->link2 }}">

                                @error('link2')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="my-4">

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Register</button>
                                <a href="{{ route('users.hackerthon',  auth()->user()->name) }}" class="btn btn-danger">Cancel</a>
                            </div>
                            
                        </form>
                    </div>
                </div>

    </div>
</div>
    
@endsection













