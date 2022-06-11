@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
   
        <div class="container-fluid">
            
            <div>
               

                <div class="d-flex gap-2 w-100 justify-content-between my-2">
                    <div class="col">
                        <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                            <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">2</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                        </div>
                    </div>
                    <div class="">
                        <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                            <form class="needs-validation pr-2" novalidate action="{{ route('groups') }}" method="get">
                                @csrf  
                                <div class="d-flex align-items-center"></div>
                            </form>
                            <form class="needs-validation py-1" novalidate action="{{ route('users.calendardiscussion') }}" method="post">
                                @csrf  
                                <div class="d-flex align-items-center">
                                    <select name="category" id="category"
                                        class="form-control  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                                        <option value="">Select all</option>
                                        <option value="0">Futur Tech</option>
                                        <option value="1">History & Ethics</option>
                                        <option value="2">Workplace Skills</option>
                                    </select>
                                    @error('category')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <button class="btn btn-info" type="submit">Filter All</button>
                                </div>
                            </form>
                            @auth
                                <form action="{{ route('users.calendardiscussion.mycalendar', auth()->user()->name) }}" method="get" >
                                @csrf
                                    <button type="submit" class="btn btn-md ml-1 text-white " style="background:#F87B06">My calender</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
            <div class="row row-cols row-cols-sm-2 row-cols-md-3 g-3 mb-5 d-flex justify-content-center align-items-center">
                <div class="col-sm-10 bg-light p-2">
                    <div class="card-body">
                        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="p-5">
                <x-calender />
            </div> -->
        </div>

<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,
            })
        });
</script>
        
@endsection

