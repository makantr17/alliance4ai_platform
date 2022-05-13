@extends('layouts.app')

@section('content')
   <!--====== PRELOADER PART START ======-->
    
        <div class="container-fluid">
            <div class="bg-dark text-secondary px-4 pt-2 mb-5">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-lg-6 text-center">
                        <h1 class="display-5 fw-bold lh-1 mb-3 text-white">Circle Details</h1>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-12 my-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if ($group[0] -> user -> image)
                                        <img src="{{ '/storage/images/'.$group[0]->user_id.'/'.$group[0]->user->image }}" alt="twbs" width="50" height="50" class="rounded-circle flex-shrink-0 shadow-sm p-1">
                                    @else
                                        <img src="/images/icon-alliance/discussion.png" alt="twbs" width="50" height="50" class="rounded-circle flex-shrink-0 shadow-sm p-1">
                                    @endif
                                    <small>@ {{ $group[0]->user->name }} </small>
                                </div>
                            </div> <!-- courses top search -->
                        </div>
                    </div>

                    <div class="list-group">
                        @if ($group -> count())
                            @foreach($group as $groups)
                            <div href="" class="d-col gap-3 py-3 mb-3" aria-current="true">
                                <div class="col-lg-12 mb-3">
                                    @if ($groups-> image )
                                        <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" class="border-3" alt="twbs" width="100%" height="" class="mb-2">
                                    @else
                                        <img src="/images/icon-alliance/group-chat.png" class="border-3" alt="twbs" width="" height="200" class="flex-shrink-0 ">
                                    @endif
                                </div>
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h1 class="mb-3 display-5">{{ $groups-> name}}</h1>
                                        <h3 class="my-2 lh-md mt-2 fw-light">{{ $groups-> titre}} </h3>
                                        <p class="mb-0 lh-md fw-light">{{ $groups-> description}} </p>
                                        <div>
                                            <p class=" text-nowrap"><strong>Location:</strong> {{ $groups-> location}}</p>
                                        </div>
                                    </div>
                                    <small class="opacity-50 text-nowrap">{{ $groups-> created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>No Group Available or posted</p>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="/images/icon-alliance/hacker.png" alt="twbs" width="50" height="50" class="rounded-circle flex-shrink-0 p-1 shadow-sm border">
                                <img src="/images/icon-alliance/old-man.png" alt="twbs" width="50" height="50" class="rounded-circle flex-shrink-0 p-1 shadow-sm border">
                                <div class="mx-3"> <strong>+{{$group_members -> count()}} others</strong></div>
                            </div> <!-- courses top search -->
                        </div>
                    </div> 

                    <!-- JOIN BUTTON Start here -->
                    <div class="row my-5 py-2">
                        @auth
                            @if ($group_members -> count())
                                @if ($group_members -> contains('user_id', auth()->user()->id ))
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('groups.members', [$group[0] ->id]) }}" class="d-block btn gap-3 gray-bg py-2 px-2 mb-3 border" aria-current="true">
                                                Open Circle
                                            </a>
                                        </div> <!-- courses top search -->
                                    </div>
                                @else
                                    <form class="mx-1" novalidate action="{{ route('groups_details', [$group[0] ->id] ) }}" method="post">
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button type="submit" class="btn btn-primary my-3">Join Circle</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            @else
                                <form class="mx-1"novalidate  action="{{ route('groups_details', [$group[0] ->id] ) }}" method="post">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-primary my-3">Join Circle</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-lg-12 d-flex justify-content-center align-items-center pt-2">
                                    <p class="opacity-50 text-nowrap fw-light text-center">By clicking Join Circle, you will agree to be a member who accept <br> the term and conditions of Futur Maker teams.</p>
                                </div>
                            @endif
                        @endauth
                        @guest
                            <a class="btn btn-primary" href="{{ route('login') }}" >Signin</a>
                        @endguest
                    </div> 
                </div>
                <!-- JOIN Button End heere -->

                    

                
            
            </div>

        </div>
@endsection
