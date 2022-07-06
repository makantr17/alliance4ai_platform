@extends('layouts.app')

@section('content')

    <!--====== COURSES PART START ======-->
    
    <section id="courses-part" class="pt-30 pb-120 white-bg">
        <div class="container">
            <div class="mb-5">
                <div class="bg-white text-secondary mb-2 text-center rounded">
                    <div class="py-3">
                        <h1 class="display-6 fw-bold" style="color:#02873a" >Learning</h1>
                        <p class="text-muted">Learn different courses shared by Futur makers and increase your score</p>
                    </div>
                    <div class="overflow-hidden" style="max-height: 30vh;">
                        <div class="">
                            <img src="images/icon/bg-a4ai.png" class="img-fluid rounded-3 shadow-lg mb-4 rounded" alt="Example image" width="60%" height="500" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="container-fluid col-xxl-8 px-0 py-2 px-4 mb-1">
                <div class="rounded">
                    <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
                    <div class="mx-0 mb-0">
                        <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
                            <div class="col">
                                <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                                    <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                                    <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                                    <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
                                </div>
                                <nav class="pt-1 text-muted">Learning Community</nav>
                            </div>
                            <div class=" d-flex flex-wrap align-items-center px-0 pt-2">
                                @auth
                                    <form action="{{ route('users.createcourse',  auth()->user()->name) }}" method="get" class="m-1">
                                    @csrf
                                        <button type="submit" style="font-size: 14px;" class="btn btn-lg btn-info">New Course</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
                </div>
            </div>




            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item"></li>
                        </ul> <!-- nav -->
                        
                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row">
                        @if ($course -> count())
                            @foreach($course as $courses)
                            <div class="col-lg-3 col-md-6">
                                <div class="singel-course pd-0 mt-2 border shadow-sm">
                                    <div class="thum">
                                        <div class="image">
                                            <img src="images/course/courseai.jpg" alt="Course">
                                        </div>
                                        <div class="price">
                                            <span>Free</span>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <a href="{{ route('learning.course', [$courses->id]) }}"><h5 class="py-1 m-0">{{ $courses-> name}}</h5></a>
                                        <nav><small>By- {{$courses->user->name}} </small></nav>
                                        <nav class="text-muted"> {{ Str :: limit($courses-> description, 30) }} </nav>
                                        @auth
                                            @if (!$courses->isTaken(auth()->user()))
                                                <small class=" text-info">start now</small>
                                            @else
                                                <small>loaded in</small>
                                            @endif
                                        @endauth
                                        <div class="d-flex justify-content-between align-items-center">
                                            <form action="{{ route('learning.course', [$courses->id]) }}" method="get" >
                                            @csrf
                                                <button type="submit" class="btn btn-sm my-2 btn-secondary">Open</button>
                                            </form>
                                            <div class="sc-fUqQNk jDAUBC avatar-group--dense">
                                                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="" src="/images/-min-29.jpg" title="Abhishek Kumar" alt="r">
                                                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/897193_small500.png" title="Jason Sykes" alt="s">
                                                <img width="20" height="20" class="rounded-circle flex-shrink-0" class="sc-jtmhnJ jpjECk" src="/images/cxc.jpg" title="Ajith Pushparaj" alt="j">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> <!-- singel course -->
                            </div>
                            @endforeach
                        @else
                            <p>No Course Available or posted</p>
                        @endif
                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
            <div class="row">
                <div class="col-lg-12">
                    <nav class="courses-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="active" href="#">1</a></li>
                            <li class="page-item"><a href="#">2</a></li>
                            <li class="page-item"><a href="#">3</a></li>
                            <li class="page-item">
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>  <!-- courses pagination -->
                </div>
            </div>  <!-- row -->
        </div> <!-- container -->
    </section>
@endsection
