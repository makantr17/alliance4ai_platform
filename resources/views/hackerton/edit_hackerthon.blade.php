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
                        <form action="{{ route('users.create_hackerthon',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-bookmark-o"></i> Create new Hackathon</button>
                        </form>
                        <form action="{{ route('users.update_hackerthon',  $hackerthon-> title) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-plus"></i> Edit hackathon</button>
                        </form>
                        <form action="{{ route('users.hackerthon',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-muted btn-sm"><i class="fa fa-braille"></i> Hackathons</button>
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
    <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-category-center"
        novalidate action="{{ route('users.update_hackerthon',  $hackerthon-> title) }}" method="post">
        
        @csrf
        <div class="col-md-4">
            <label for="titre" class="form-label">titre</label>
            <input type="text" name="titre" id="titre" placeholder="Your titre" 
            class="form-control py-2  rounded-lg @error('titre') border border-danger @enderror" value="{{ $hackerthon->titre}}">
            
            @error('titre')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <div class="col-md-4">
            <label for="category" class="form-label">category</label>
            <input type="text" name="category" id="category" placeholder="category" 
            class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ $hackerthon->category}}">

            @error('category')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="instructions" class="form-label">instructions</label>
            <input type="text" name="instructions" id="instructions" placeholder="Your instructions" 
            class="form-control py-2  rounded-lg @error('instructions') border border-danger @enderror" value="{{ $hackerthon->instructions}}">
            
            @error('instructions')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="limit_group" class="form-label">limit_group</label>
            <input type="date" name="limit_group" id="limit_group" placeholder="Your limit_group" 
            class="form-control py-2  rounded-lg @error('limit_group') border border-danger @enderror" value="{{ $hackerthon->limit_group}}">
            
            @error('limit_group')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="tasks" class="form-label">tasks</label>
            <input type="text" name="tasks" id="tasks" placeholder="Your tasks" 
            class="form-control py-2  rounded-lg @error('tasks') border border-danger @enderror" value="{{ $hackerthon->tasks}}">
            
            @error('tasks')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="start_at" class="form-label">start_at</label>
            <input type="time" name="start_at" id="start_at" placeholder="Your start_at" 
            class="form-control py-2  rounded-lg @error('start_at') border border-danger @enderror" value="{{ $hackerthon->start_at}}">
            
            @error('start_at')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>



        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Save Modification</button>
        </div>
        
    </form>
    </div>
</div>
    
@endsection













