@extends('layouts.app')

@section('content')
    
    
    <!--====== COURSES SINGEl PART START ======-->
    <section id="corses-singel" class="pt-0 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="corses-singel-left mt-30">
                        @if ($course -> count())
                            <div class="title">
                                <h3>{{ $course-> name}}</h3>
                            </div> 
                        @else
                            <p>No Lesson Available or posted</p>
                        @endif
                        <div class="course-terms">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                            @if ($course->user->image)
                                            <img src="{{ '/storage/images/'.$course->user->id.'/'.$course->user->image }}" alt="twbs" width="20" height="20" class="rounded-circle flex-shrink-0">
                                            @else
                                                <img src="/images/cxc.jpg" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0">
                                            @endif
                                        </div>
                                        <div class="name">
                                            <span>{{ $course-> created_at->diffForHumans() }}</span>
                                            <h6><small>by {{ $course-> user->name}}</small></h6>
                                        </div>
                                    </div>
                                </li>
                               
                            </ul>
                        </div> <!-- course terms -->
                        
                        <div class="corses-tab mt-5">
                            <ul class="nav nav-justified" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                            </ul>

                            @if ($course -> count())
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="overview-description">
                                            <div class="singel-description pt-1">
                                                <h6>Course Summary</h6>
                                                <nav class="text-muted">{{ substr($course-> description, 0, 250) }}</nav>
                                            </div>
                                            
                                        </div> <!-- overview description -->
                                    </div>
                                </div>
                            @else
                                <p></p>
                            @endif

                            <div class="list-group">
                                @if ($lessons -> count())
                                    @foreach($lessons as $lesson)
                                    <a href="{{ route('learning.course.lesson', $lesson) }}" class="list-group-item list-group-item-action d-flex gap-3 py-4 border-top" aria-current="true">
                                        <img src="/images\896689_small500.png" alt="twbs" width="45" height="45" class="rounded-circle flex-shrink-0">
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
                
            </div> <!-- row -->
            
        </div> <!-- container -->
    </section>

@endsection
