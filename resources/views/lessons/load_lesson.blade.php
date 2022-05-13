@extends('layouts.app')

@section('content')
    
    
    <!--====== COURSES SINGEl PART START ======-->
    <section id="corses-singel" class="pt-20 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="corses-singel-left mt-30">
                        @if ($lessons)
                            <div class="title pb-5">
                                <h4 class="pb-2 text-info display-6">{{ $lessons-> course-> titre}}</h4>
                                <p class="text-muted">{{ $lessons-> course-> description}}</p>
                            </div> 
                        @endif

                        <div class="course-terms my-2">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                            <img src="/images/course/teacher/t-1.jpg" alt="Teacher">
                                        </div>
                                        <div class="name">
                                            <span>Teacher</span>
                                            <p class="text-muted fw-bold">Mark anthem</p>
                                        </div>
                                    </div>
                                </li>
                               
                            </ul>
                        </div> <!-- course terms -->
                        
                        
                        <div class="corses-tab ">
                            @if ($lessons)
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                        <div class="overview-description">
                                            <div class="singel-description pt-30 pb-20">
                                                <h2>{{ $lessons-> title }}</h2>
                                            </div>
                                            <!-- ############ If file -->
                                            @if ($lessons->files)
                                                <div class="corses-singel-image pt-4">
                                                    <img src="/images/course/cu-1.jpg" alt="Courses">
                                                </div> <!-- corses singel image -->
                                            @endif
                                            <div class="singel-description pt-30">
                                                <h6>Course Summary</h6>
                                                <nav class="text-muted">{{ $lessons-> content }}</nav>
                                                <a href="{{ $lessons-> link }}" class="text-info py-2">Follow this link</a>
                                            </div>
                                            <!-- ########## IF detaills sreenshot -->
                                            <div class="bg-light rounded p-5 my-2">
                                                <!-- <h1>More</h1> -->
                                                <img src="/images/course/cu-1.jpg" width="100%" alt="Courses">
                                            </div>
                                            <!-- ########## Paragraph 2 -->
                                            <div class="singel-description pt-30">
                                                <h6>{{ $lessons-> title }}</h6>
                                                <nav class="text-muted">{{ $lessons-> content }}</nav>
                                                <a href="{{ $lessons-> link }}" class="text-info py-2">Follow this link</a>
                                            </div>
                                            <!--###########IF detaills CODE 2 -->
                                            <div class="bg-light rounded p-4 my-2">
                                                <code>
                                                    <h6 class="pb-2">{{ $lessons-> title }}</h6>
                                                    <nav class="text-muted">{{ $lessons-> content }}</nav>
                                                </code>
                                            </div>
                                             <!-- ########## Paragraph 3 -->
                                             <div class="singel-description pt-30">
                                                <h6>Comsuption of management</h6>
                                                <nav class="text-muted">{{ $lessons-> content }}</nav>
                                            </div>
                                            <!--###########IF detaills CODE 2 -->


                                        </div> <!-- overview description -->
                                    </div>
                                </div> 
                            @else
                                <p></p>
                            @endif
                        </div>
                    </div> <!-- corses singel left -->
                </div>
                <div class="col-lg-4">
                    
                </div>
            </div> <!-- row -->
            
        </div> <!-- container -->
    </section>

@endsection
