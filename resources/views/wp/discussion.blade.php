@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
    <section id="courses-part" class="pb-120 ">
        <div class="container-fluid">
            <div>
                <div class=" text-secondary mb-2 text-center rounded" style="background:#019DE2">
                <div class="py-2">
                    <h1 class="display-6 fw-bold text-light py-2">Discussion</h1>
                    </div>
                        <div class="overflow-hidden" style="max-height: 30vh;">
                            <div class="">
                                <img src="/icons/AI_event_1.jpg" class="img-fluid rounded-3 shadow-lg mb-4 rounded" alt="Example image" width="60%" height="500" loading="lazy">
                            </div>
                            
                        </div>
                    </div>
            </div>

            <!-- Navbar -->
            <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
            <div class="d-flex gap-2 w-100 justify-content-between py-4">
                <div class="col">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                        <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">0</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                    </div>
                </div>
                <div class="">
                    <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                        <form class="needs-validation pr-2" novalidate action="{{ route('discussion') }}" method="get">
                            @csrf  
                            <div class="d-flex align-items-center">
                                <i class="fa fa-sort pr-2" style="font-size:20px"></i>
                                <select name="period" id="period"
                                    class="form-control rounded-lg @error('period') border border-danger @enderror" value="{{ old('period')}}">
                                    <option value="">Select all</option>
                                    <option value="Future Discussion">Future Discussion</option>
                                    <option value="Past Discussion">Past Discussion</option>
                                    <option value="Ongoing Discussion">Ongoing Discussion</option>
                                </select>
                                @error('period')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button class="btn btn-info ml-0" type="submit">Period</button>
                            </div>
                        </form> 
                        <form class="needs-validation pr-2" novalidate action="{{ route('discussion') }}" method="get">
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
                                <button class="btn btn-info ml-0" type="submit">Filter</button>
                            </div>
                        </form>
                        @auth
                            <form action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="get" class="mr-1">
                            @csrf
                                <button type="submit" class="btn btn-info ">New Discussion</button>
                            </form>

                        @endauth
                        </span>
                    </div>
                </div>
            </div>


            <!-- DISPLAY CONTENTS HERE -->
            <div class="container-fluid row justify-content-center align-items-center">
                <!-- START Listed Topics here -->
                <div class="col-sm-10 list-group mt-5">
                    @if ($discussion -> count())
                        @foreach($discussion as $discussions)
                        <a href="{{ route('discussion.details', $discussions) }}" class="list-group-item-action d-flex wrap mb-3 gap-3 border bg-white p-0 shadow-sm" aria-current="true">
                            <div >
                                @if ($discussions-> files )
                                    <img src="{{ '/storage/images/discussion/'.$discussions->id.'/'.$discussions->files }}" alt="twbs" width="" height="150" class="rounded flex-shrink-0 ">
                                @else
                                    <img src="/images/icon-alliance/discussion.png" alt="twbs" width="" height="150" class="rounded flex-shrink-0">
                                @endif
                            </div>
                            <div class="d-flex gap-2 w-100 justify-content-between p-2">
                                <div>
                                    <h6 class="pt-2 fw-medium ">{{ $discussions-> title}}</h6>
                                    <nav class="mb-0 opacity-75 my-1">{{ $discussions-> description}}</nav>
                                    <nav class="mb-0 opacity-100 my-1 text-secondary"> <strong>Location</strong> {{ $discussions-> location}}</nav>
                                    <nav class="mb-0 opacity-100 my-1 text-secondary"> <strong>Start_at</strong> {{ $discussions-> start_time}} <strong>End_at</strong> {{ $discussions-> start_time}}</nav>
                                </div>
                                <small class="opacity-50 text-nowrap">{{ $discussions-> created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                        @endforeach
                    @else
                        <p>No Discussion Available or posted</p>
                    @endif
                </div>
                <!-- END Listed Topics here -->
            </div>
            <!-- END CONTENTS HERE -->

            
        </div> <!-- container -->
    </section>
@endsection
