@extends('layouts.app')

@section('content')

<div class="container-fluid mb-5">
    
    @if ($group -> count())
      @foreach($group as $groups)
        <div class="my-1 rounded-3">
            <a href="#" class="d-block align-items-center text-dark text-decoration-none">
                <div class="bg-light text-secondary mb-2 text-center">
                    <div class="overflow-hidden" style="max-height: 25vh;">
                        <div class="">
                            @if ($groups-> image )
                                <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" alt="twbs" width="85%" height="500" loading="lazy" class="img-fluid rounded shadow-lg mb-4 rounded">
                            @else
                                <img src="/images/icon-alliance/discussion.png" alt="twbs" width="85%" height="500" loading="lazy" class="img-fluid rounded shadow-lg mb-4 rounded">
                            @endif
                            <!-- <img src="/icons/abstract_background.jpg" class="img-fluid rounded shadow-lg mb-4 rounded" alt="Example image" width="100%" height="500" loading="lazy"> -->
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="d-flex col-sm-12 gap-2 w-100 justify-content-center flex-wrap align-items-center my-4">
            <div class="col-sm-10 d-flex my-3 justify-content-right">
                <form action="{{ route('groups.members', [$groups ->id]) }}" method="get" class="mr-1">
                @csrf
                    <button type="submit"class="btn btn-light btn-sm border">Discussion</button>
                </form>
                <form action="{{ route('groups.members.joined', [$groups ->id]) }}" method="get" class="mr-1">
                @csrf
                    <button type="submit"class="btn btn-light btn-sm border">Members</button>
                </form>
                @guest
                    <a class="btn btn-light btn-sm border" href="{{ route('login') }}" >Signin</a>
                @endguest
                <div class="container d-flex flex-row-reverse">
                    <a href="{{ route('groups')}}">
                        <button class="btn btn-light btn-sm border">back</button>
                    </a>
                </div>
            </div>
            <nav class="col-sm-10">
                <div class="">
                    <h3 class="display-7 pb-1 fw-bold text-black">{{ $groups-> name}}</h3>
                </div>
                <p> <i class="fa fa-map-marker text-secondary" aria-hidden="true"></i> <small>{{ $groups-> location}}</small> </p>
            </nav>
        </div>
      <!-- <hr class="my-1"> -->
      @endforeach
    @else
        <p>No Groups Available or posted</p>
    @endif  
    <!-- <div>
        <h1 class='h1 py-2 pt-5'>Circles</h1>
    </div> -->
    <div class="row justify-content-center col-md-12">
        <div class="row bg-white py-2 justify-content-center col-md-10">
            <div class="col-sm-12">
                <h5 class="pt-3 m-1 fw-bold text-info ">Future Makers</h5>
                    <div class="row justify-content-center align-items-center bg-white">
                        <!-- START Listed Topics here -->
                        <div class="col-sm-12 mt-5 ">
                            @if ($group_members -> count())
                                @foreach($group_members as $group_member)
                                <a href="#" class="border-bottom list-group-item-action d-flex flex-wrap justify-content-between gap-3 py-3 my-0 bg-white p-0" aria-current="true">
                                    <div class=" overflow-hidden"  style="max-height: 19vh;">
                                    @if ($group_member ->user->image)
                                        <img class="bd-placeholder-img flex-shrink-0 rounded-circle border shadow-sm" width="80" height="80" src="{{ '/storage/images/'.$group_member->user_id.'/'.$group_member -> user ->image}}" alt="12">
                                    @else
                                        <img class="bd-placeholder-img flex-shrink-0 rounded-circle border " width="80" height="80" src="/images/icon-alliance/man.png" alt="default">
                                    @endif
                                    </div>
                                    <div class="col-sm-9 d-flex gap-2 w-100 justify-content-between align-items-center">
                                        <div>
                                            <p class="pt-0 mt-2 mb-2 lh-1 text-black fw-bold"> {{$group_member -> user ->name}} </p>
                                            <p class="pt-0 mt-2 mb-1 lh-1 text-black fw-bold"> {{$group_member -> user ->profession}} </p>
                                            <nav class="mb-0 opacity-100 my-1 text-secondary"> <i class="fa fa-map-marker fa-1x fw-light"></i> <small class="text-black">{{ $group_member -> user -> country}}</small></nav>
                                        </div>
                                        <small class="opacity-80 text-nowrap">{{ $group_member-> created_at->diffForHumans() }}</small>
                                    </div>
                                </a>
                                @endforeach
                            @else
                                <p>No Discussion Available or posted</p>
                            @endif
                        </div>
                        <!-- END Listed Topics here -->
                    </div>

                    <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
                        {{ $group_members -> links()}}
                    </div>
            </div>
        </div>
    </div>
</div>












        


@endsection