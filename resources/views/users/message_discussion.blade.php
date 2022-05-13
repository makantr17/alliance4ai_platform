@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
    <section id="courses-part" class="pt-20 pb-120 ">
        <div class="container-fluid">
            <div class="bg-dark text-secondary px-4 pt-2 mb-5 text-center">
                <div class="py-3">
                    <h1 class="display-6 fw-bold text-white">{{ $user -> name }} Posts</h1>
                </div>
                <div class="overflow-hidden" style="max-height: 20vh;">
                    <div class="container px-5">
                        <img src="/icons/bootstrap-docs.png" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image" width="700" height="500" loading="lazy">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item">Showning 4 0f 24 Results</li>
                        </ul> <!-- nav -->
                        
                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> 

            <div class="col-lg-10 list-group">
                <div class="card-body py-3">
                    @if ($message -> count())
                        @foreach($message as $messages)
                            <x-message :message="$messages" />
                        @endforeach
                    @else
                        <p></p>
                    @endif
                </div>
            </div>


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
