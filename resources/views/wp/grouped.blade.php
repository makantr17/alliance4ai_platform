@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
        <div class="container-fluid my-5">
            <div class="mx-0">
                <div class="pb-5">
                    <h1 class="display-5 fw-bold pb-1" style="color:#F87B06">Circle</h1>
                    <p class="text-muted">Join our circle, Vision to create a network of 100 clubs across the entire Diaspora</p>
                </div>
                <div class="bg-dark text-secondary mb-2 text-center rounded" style="opacity:0.8">
                    <div class="overflow-hidden" style="max-height: 35vh;" >
                        <div class="" >
                            <img src="/icons/background-groups.jpg" class="img-fluid rounded shadow-lg mb-4 rounded" alt="Example image" width="100%" height="400"  loading="lazy">
                        </div>
                    </div>
                </div>
                <div class="py-4">
                    
                </div>
            </div>

            <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
            <div class="d-flex gap-2 w-100 justify-content-between my-5">
                <div class="col">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                        <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">2</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                    </div>
                </div>
                <div class="mx-5">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                        <form class="needs-validation pr-2" novalidate action="{{ route('groups') }}" method="get">
                            @csrf  
                            <div class="d-flex align-items-center">
                                <i class="fa fa-sort pr-2" style="font-size:20px"></i>
                                <select name="location" id="location"
                                    class="form-control rounded-lg @error('location') border border-danger @enderror" value="{{ old('location')}}">
                                    <option value="">-- all location</option>
                                    @foreach($location as $locations)
                                        <option value="{{ $locations->location }}">{{ $locations->location }}</option>
                                    @endforeach
                                </select>
                                @error('location')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button class="btn btn-sm ml-2" style="background:#3E8F78; color:white;" type="submit">Filter</button>
                            </div>
                        </form>
                        @auth
                            <form action="{{ route('users.creategroups',  auth()->user()->name) }}" method="get" class="mr-1">
                            @csrf
                                <button type="submit" class="btn btn-sm ml-2" style="background:#3E8F78; color:white; ">New Circle</button>
                            </form>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                        @endauth
                    </div>
                </div>
            </div>
            <!-- NAVBAR COLLECTION FOR HEADER END HERE-->

            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="row mx-5">
                        <div class="col-lg-12">
                            <div class="courses-top-search">
                                <ul class="nav float-left" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                                    </li>
                                </ul> <!-- nav -->
                                
                                <div class="courses-search float-right">
                                    <form nonvalidate action="{{ route('groups') }}" method="get">
                                        @csrf
                                        <input type="text" name="search" placeholder="Search" 
                                        class="form-control py-2  rounded-lg @error('search') border border-danger @enderror" value="{{ old('search')}}">

                                        @error('search')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div> <!-- courses search -->
                            </div> <!-- courses top search -->
                        </div>
                    </div> 

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-5 mx-5">
                    @if ($group -> count())
                        @foreach($group as $groups)
                        <div class="col-sm-3">
                            <div class="card shadow-sm bg-light" >
                                @if ($groups-> image )
                                    <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" alt="twbs" width="100%" height="225" style="max-height: 25vh;" >
                                @else
                                    <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100%" height="225">
                                @endif
                                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                                <div class="card-body">
                                    <h6 class="text">{{ $groups-> name}}</h6>
                                    <p class="mb-0"> <i class="fa fa-map-marker"></i> {{ $groups-> location}}, <small class="text-success">{{ $groups->group_member->count() }} joined</small></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            @auth
                                                <form action="{{ route('groups.members', [$groups ->id]) }}" method="get" >
                                                @csrf
                                                    <button type="submit" class="btn btn-sm text-white " style="background:#F87B06">Open Circle</button>
                                                </form>
                                                @if (!$groups->joinedBy(auth()->user()))
                                                    <form action="{{ route('groups_details', [$groups->id]) }}" method="get" >
                                                    @csrf
                                                        <button type="submit" class="btn btn-sm btn-info btn-outline-secondary">Join</button>
                                                    </form>
                                                @endif
                                            @endauth
                                            @guest
                                                <form action="{{ route('groups.members', [$groups ->id]) }}" method="get" >
                                                @csrf
                                                    <button type="submit" class="btn btn-sm text-white " style="background:#F87B06">Open Circle</button>
                                                </form>
                                                <!-- <form action="{{ route('groups_details', [$groups->id]) }}" method="get" >
                                                @csrf
                                                    <button type="submit" class="btn btn-sm btn-info btn-outline-secondary">More</button>
                                                </form> -->
                                            @endguest
                                        </div>
                                        <small class="text-muted">{{ $groups-> created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    </div>
                    <!-- end col -->
                    

                </div>
            </div>
        </div>

        
@endsection
