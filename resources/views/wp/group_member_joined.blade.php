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
                            <img src="{{ '/storage/images/group/'.$groups->name.'/'.$groups->image }}" alt="twbs" width="100%" height="500" loading="lazy" class="img-fluid rounded shadow-lg mb-4 rounded">
                        @else
                            <img src="/images/icon-alliance/discussion.png" alt="twbs" width="100%" height="500" loading="lazy" class="img-fluid rounded shadow-lg mb-4 rounded">
                        @endif
                        <!-- <img src="/icons/abstract_background.jpg" class="img-fluid rounded shadow-lg mb-4 rounded" alt="Example image" width="100%" height="500" loading="lazy"> -->
                    </div>
                </div>
            </div>
          </a>
      </div>
      <div class="d-flex gap-2 w-100 justify-content-between flex-wrap align-items-center my-4">
          <nav class="col-sm-9">
                <div class="pt-1">
                    <h1 class="display-6 fw-bold text-black">{{ $groups-> name}}</h1>
                    <p>{{ $groups-> description}}</p>
                </div>
                <p> <i class="fa fa-map-marker text-danger" aria-hidden="true"></i> <small>{{ $groups-> location}}</small> </p>
          </nav>
          <div class="d-flex align-items-center my-1">
            <div class="container d-flex flex-row-reverse">
                <a href="{{ route('groups')}}">
                    <button class="btn btn-danger btn-sm">back</button>
                </a>
            </div>
            <form action="{{ route('groups.members', [$groups ->id]) }}" method="get" class="mr-1">
            @csrf
                <button type="submit"class="btn btn-secondary btn-sm">Discussion</button>
            </form>
            <form action="{{ route('groups.members.joined', [$groups ->id]) }}" method="get" class="mr-1">
            @csrf
                <button type="submit"class="btn btn-secondary btn-sm">Members</button>
            </form>
            @guest
                <a class="btn btn-secondary btn-sm" href="{{ route('login') }}" >Signin</a>
            @endguest
          </div>
      </div>
      <!-- <hr class="my-1"> -->
      @endforeach
    @else
        <p>No Groups Available or posted</p>
    @endif  
    <!-- <div>
        <h1 class='h1 py-2 pt-5'>Circles</h1>
    </div> -->
    <div class="row bg-light py-2 d-flex justify-content-center">
        <div class="col-md-9 bg-white">
            <div class="p-3 border-bottom rounded shadow-sm">
              <h5 class="py-2 mb-0">Future Makers</h5>
              @if ($group_members -> count())
                  @foreach($group_members as $group_member)
                    <!-- MEMBERS LISTED HERE -->
                    <x-members :group_members="$group_member" />
                    <!-- MEMBERS LISTED STOP HERE -->
                  @endforeach
              @else
                  <p></p>
              @endif
            </div>
        </div>
    </div>

</div>



@endsection