@extends('layouts.app')

@section('content')


@auth
    <x-menu />
@endauth

<div class="container-fluid col-xxl-8 px-0 py-2">
    <div class="bg-light p-3 rounded ">
        <!-- HEADER SLIDE START HERE -->
        <!-- HEADER SLIDE START HERE -->
        <div class="px-4  mb-2 text-center">
            <div class="py-1">
                <h1 class="display-6 fw-bold text-dark">My Circles</h1>
            </div>
            
        </div>

        <!-- NAVBAR COLLECTION FOR HEADER START HERE -->
        <div class="d-flex gap-2 w-100 justify-content-between">
            <div class="col">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    <!-- <div class="px-0 pt-1"> <div href="javascript:void(0)" class="text-muted d-inline-flex align-items-center align-middle" data-abc="true"> <i class="fa fa-thumbs-up"></i>&nbsp; <span class="align-middle">2</span> </div> <span class="text-muted d-inline-flex align-items-center align-middle ml-4"> <i class="fa fa-eye text-muted fsize-3"></i>&nbsp; <span class="align-middle">15</span> </span> </div> -->
                </div>
            </div>
            <div class="">
                <div class=" d-flex flex-wrap align-items-center px-0 pt-0">
                    @auth
                        <form action="{{ route('users.createcourse',  auth()->user()->name) }}" method="get" class="mr-1">
                        @csrf
                            <button type="submit"class="btn btn-info">Create new course</button>
                        </form>

                    @endauth
                </div>
            </div>
        </div>
        <!-- NAVBAR COLLECTION FOR HEADER END HERE-->
    </div>
</div>


<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @if ($courses -> count())
        @foreach($courses as $course)
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class=" justify-content-center text--center align-items-center">
                <img class="mx-3 my-3"  width="150" height="150" src="/icons/enterprise.png" alt="enterprise">
            </div>
            <div class="card-body">
              <h4>{{ $course-> titre}}</h4>
              <p class="card-text">{{ $course-> description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <form novalidate action="{{ route('users.course.manage', [$course->user, $course->id]) }}">
                        <button class="btn btn-primary" type="submit" >Manage</button>
                    </form>
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">{{ $course-> created_at->diffForHumans() }}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        @else
            <p>{{ $user ->name}} does not have any posts</p>
        @endif
        
      </div>
    </div>
</div>
    



    
@endsection