@extends('layouts.app')

@section('content')
    
    
    <!--====== COURSES SINGEl PART START ======-->
    <section id="corses-singel" class="pt-20 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="corses-singel-left mt-20">
                        @if ($lessons)
                            <div class="title pb-4">
                                <h4 class="pb-3 text-info display-6">{{ $lessons-> course-> name}}</h4>
                                <p class="text-muted">{{ $lessons-> course-> description}}</p>
                            </div> 
                        @endif

                        <div class="course-terms mb-5">
                            <ul>
                                <li>
                                    <div class="teacher-name">
                                        <div class="thum">
                                            @if ($lessons-> course-> user->image)
                                            <img src="{{ '/storage/images/'.$lessons-> course->user->id.'/'.$lessons-> course->user->image }}" alt="twbs" width="20" height="20" class="rounded-circle flex-shrink-0">
                                            @else
                                                <img src="/images/cxc.jpg" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0">
                                            @endif
                                        </div>
                                        <div class="name">
                                            <h6><small>by {{ $lessons-> course-> user->name}}</small></h6>
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
                                                <h4>{{ $lessons-> title }}</h4>
                                            </div>
                                            
                                            <div class="singel-description pt-30">
                                                <nav class="text-muted">{{ $lessons-> description }}</nav>
                                                <br>
                                                <nav class="text-muted">{{ $lessons-> content }}</nav>
                                                @if($lessons-> link)
                                                <div class="bg-light pl-2">
                                                    <a href="{{ $lessons-> link }}" class="text-info py-2">{{ $lessons-> link }}</a>
                                                </div>
                                                @endif
                                            </div>
                                            <!-- ########## IF detaills sreenshot -->
                                            
                                            <!-- ########## Paragraph 2 -->
                                            <div class="singel-description pt-30">
                                                <h6>{{ $lessons-> subtitle1 }}</h6>
                                                <nav class="text-muted">{{ $lessons-> description1 }}</nav>
                                                <br>
                                                <nav class="text-muted">{{ $lessons-> content1 }}</nav>
                                                <code>{{ $lessons-> content1 }}</code>
                                                @if($lessons-> link1)
                                                <div class="bg-light pl-2">
                                                    <a href="{{ $lessons-> link1 }}" class="text-info py-2">{{ $lessons-> link1 }}</a>
                                                </div>
                                                @endif
                                            </div>
                                            <!--###########IF detaills CODE 2 -->
                                            <!-- ########## Paragraph 2 -->
                                            @if($lessons-> subtitle2)
                                                <div class="singel-description pt-30">
                                                    <h6>{{ $lessons-> subtitle2 }}</h6>
                                                    <nav class="text-muted">{{ $lessons-> description2 }}</nav>
                                                    <br>
                                                    <nav class="text-muted">{{ $lessons-> content2 }}</nav>
                                                    <code>{{ $lessons-> content2 }}</code>
                                                    @if($lessons-> link2)
                                                    <div class="bg-light pl-2">
                                                        <a href="{{ $lessons-> link2 }}" class="text-info py-2">{{ $lessons-> link2 }}</a>
                                                    </div>
                                                    @endif
                                                </div>
                                            @endif

                                            @if($lessons-> subtitle2)
                                            <div class="singel-description pt-30">
                                                <h6>{{ $lessons-> subtitle3 }}</h6>
                                                <nav class="text-muted">{{ $lessons-> description3 }}</nav>
                                                <br>
                                                <nav class="text-muted">{{ $lessons-> content3 }}</nav>
                                                <code>{{ $lessons-> content3 }}</code>
                                                @if($lessons-> link3)
                                                <div class="bg-light pl-2">
                                                    <a href="{{ $lessons-> link3 }}" class="text-info py-2">{{ $lessons-> link3 }}</a>
                                                </div>
                                                @endif
                                            </div>
                                            @endif
                                            
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
