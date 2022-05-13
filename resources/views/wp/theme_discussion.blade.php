@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
<section id="courses-part" class="pt-20 pb-120 ">
    <div class="container-fluid">
        <!-- HEADER SLIDE START HERE -->
        <div class="bg-dark text-secondary px-4 pt-2 mb-5 text-center">
            <div class="py-3">
                <h1 class="display-6 fw-bold text-white">Discussion Themes</h1>
            </div>
            <div class="overflow-hidden" style="max-height: 20vh;">
                <div class="container px-5">
                    <img src="/icons/computer.jpg" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
                </div>
            </div>
        </div>
        <!-- HEADER SLIDE END HERE -->
            

        <!-- ADDING NEW SECTION -->
        <div >
            <div class="d-flex  justify-content-center">
                <div>
                    <a href="{{ route('discussion', 0) }}">
                        <div tabindex="0" class="flex-auto p-2 white border border-gray-light1 rounded-huge darken1-hover pointer" role="button" style="max-height: 300px; padding-bottom: 42px; padding-top: 42px;">
                            <div class="mb-3 overflow-hidden" style="height: 110px; max-height: 110px;">
                                <div class="flex justify-center items-center height-full">
                                    <div class="mb-1 mx-auto flex items-center justify-center pointer" aria-label="Create Base from scratch" style="width: 96px; height: 96px; border-radius: 12px; background-color: rgb(104, 200, 196);">
                                        <svg width="40" height="40" viewBox="0 0 16 16" class="coloredText" data-color="green" style="shape-rendering: geometricprecision;"><path fill-rule="evenodd" fill="currentColor" d=""></path></svg>
                                    </div>
                                </div>
                            </div>
                            <h3 class="my-2 mx-2 display strong big center text-gray-dark1 truncate break-word" title="Start from scratch">Workplace Skills</h3>
                            <p class="my-2 mx-auto center" title="Create a new blank base with custom tables, fields, and views." style="max-width: 13rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                Self Management, Problem solving, Positive attitudes etc....
                            </p>
                        </div>
                    </a>
                </div>
                
                <div class="pl-2"></div>
                <div>
                    <a href="{{ route('discussion', 1) }}">
                        <div tabindex="0" class="flex-auto p-2 white border border-gray-light1 rounded-huge darken1-hover pointer" role="button" style="max-height: 300px; padding-bottom: 42px; padding-top: 42px;">
                            <div class="mb-3 overflow-hidden" style="height: 110px; max-height: 110px;">
                                <div class="flex justify-center items-center height-full">
                                    <div class="mb-1 mx-auto flex items-center justify-center pointer text-blue" aria-label=" from scratch" style="width: 96px; height: 96px; border-radius: 12px; background-color: rgb(207, 223, 255);">
                                        <svg width="40" height="40" viewBox="0 0 16 16" class="icon" style="shape-rendering: geometricprecision;"></svg>
                                    </div>
                                </div>
                            </div>
                            <h3 class="my-2 display strong big center text-gray-dark1 truncate break-word" title="Quickly upload">Ethics and History</h3>
                            <p class="my-2 mx-auto center" title="Easily migrate your existing projects in just a few minutes." style="max-width: 13rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                Ethical data storytelling, Discrimination, Health and Safety, Security etc...
                            </p>
                        </div>
                    </a>
                </div>

                <div class="pl-2"></div>

                <div>
                    <a href="{{ route('discussion', 2) }}">
                        <div tabindex="0" class="flex-auto p-2 white border border-gray-light1 rounded-huge darken1-hover pointer" role="button" style="max-height: 300px; padding-bottom: 42px; padding-top: 42px;">
                            <div class="mb-3 overflow-hidden" style="height: 110px; max-height: 110px;">
                                <div class="flex justify-center items-center height-full">
                                    <div class="mb-1 mx-auto flex items-center justify-center pointer" aria-label="Create Base from scratch" style="width: 96px; height: 96px; border-radius: 12px; background-color: rgb(209, 247, 196);">
                                        <svg width="40" height="40" viewBox="0 0 16 16" class="coloredText" data-color="green" style="shape-rendering: geometricprecision;"><path fill-rule="evenodd" fill="currentColor" d=""></path></svg>
                                    </div>
                                </div>
                            </div>
                            <h3 class="my-2 mx-2 display strong big center text-gray-dark1 truncate break-word" title="Start from scratch">Future Tech</h3>
                            <p class="my-2 mx-auto center" title="Create a new blank base with custom tables, fields, and views." style="max-width: 13rem; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                Artificial Intelligence and Machine Learning, Robotics, IoT, Blockchain etc...
                            </p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
