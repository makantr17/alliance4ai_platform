@extends('layouts.app')

@section('content')
    
    
    <!--====== COURSES SINGEl PART START ======-->
    <section id="corses-singel" class="pt-20 pb-50 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="corses-singel-left mt-30">
                        @if ($course -> count())
                            @foreach($course as $courses)
                            <div class="title">
                                <h3>{{ $courses-> titre}}</h3>
                            </div> <!-- title -->
                        @endforeach
                        @else
                            <p>No Lesson Available or posted</p>
                        @endif
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                            <img src="/images/course/teacher/t-1.jpg" alt="Teacher">
                                        </div>
                                        <div class="name">
                                            <span>Teacher</span>
                                            <h6>Mark anthem</h6>
                                        </div>
                                    </div>
                                </li>
                               
                            </ul>
                        </div> <!-- course terms -->
                        
                        <div class="corses-singel-image pt-20">
                            <img src="/images/course/cu-1.jpg" alt="Courses">
                        </div> <!-- corses singel image -->
                        
                        <div class="corses-tab ">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                            </ul>

                            @if ($course -> count())
                                @foreach($course as $courses)
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="overview-description">
                                            <div class="singel-description pt-1">
                                                <h6>Course Summary</h6>
                                                <nav class="text-muted">{{ substr($courses-> description, 0, 250) }}</nav>
                                            </div>
                                            
                                        </div> <!-- overview description -->
                                    </div>
                                </div> <!-- tab content -->
                            @endforeach
                            @else
                                <p></p>
                            @endif

                            <div class="list-group">
                                @if ($lessons -> count())
                                    @foreach($lessons as $lesson)
                                    <a href="{{ route('learning.course.lesson', $lesson) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3 border" aria-current="true">
                                        <img src="/images/icon-alliance/diploma.png" alt="twbs" width="45" height="45" class="rounded-circle flex-shrink-0 border">
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                        <div>
                                            <h6 class="mb-0">{{ $lesson-> title}}</h6>
                                            <nav class="mb-0 opacity-75">{{substr($lesson-> content, 0, 50) }}</nav>
                                        </div>
                                        <small class="opacity-50 text-nowrap">{{ $lesson-> estimate_time}}</small>
                                        </div>
                                    </a>
                                    @endforeach
                                @else
                                    <p></p>
                                @endif
                            </div>

                        </div>
                    </div> <!-- corses singel left -->
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                               <h4>Course Features </h4>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>Duaration : <span>10 Hours</span></li>
                                    <li><i class="fa fa-clone"></i>Leactures : <span>09</span></li>
                                    <li><i class="fa fa-beer"></i>Quizzes :  <span>05</span></li>
                                    <li><i class="fa fa-user-o"></i>Students :  <span>100</span></li>
                                </ul>
                                <div class="price-button pt-10">
                                    <span>Price : <b>$0</b></span>
                                    
                                    @auth
                                        <form novalidate action="{{ route('learning.course', [$course[0]->id ]) }}"  method="post">
                                            @csrf
                                            <button type="submit" class="main-btn">Enroll Free</button>
                                        </form>
                                    @endauth

                                    @guest
                                        <a class="main-btn" href="{{ route('login') }}" >Register</a>
                                    @endguest
                                </div>
                            </div> <!-- course features -->
                        </div>
                        
                    </div>
                </div>
            </div> <!-- row -->
            
        </div> <!-- container -->
    </section>

@endsection
