@extends('layouts.app')

@section('content')

   
    <!--====== FUTUR MAKERS PART START ======-->
    
    <section id="teachers-part" class="pt-65 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50 pb-35">
                        <h5>Featured Futur Makers</h5>
                        <h2>Meet Our futur makers</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
            @if ($users -> count())
                @foreach($users as $user)
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-teachers mt-30 text-center">
                        <div class="image">
                            @if ($user->image )
                                <img src="{{ '/storage/images/'.$user->id.'/'.$user->image }}" alt="Teachers">
                            @else
                                <img src="/images/icon-alliance/teacher.png" alt="Teachers">
                            @endif
                            <!-- <img src="images/teachers/t-1.jpg" alt="Teachers"> -->
                        </div>
                        <div class="cont">
                            <a href="teachers-singel.html"><h6>{{ $user->name }}</h6></a>
                            <span>{{ $user->profession }} </span>
                        </div>
                    </div> <!-- singel futur makers -->
                </div>
                @endforeach
            @endif
                
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
@endsection
