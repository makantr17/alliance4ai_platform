@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="p-3 mb-4 bg-light rounded-3">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <img class="mx-3 my-3"  width="80" height="80" src="/images/icon-alliance/job.png" alt="enterprise">
            <h3 class="display-6 fw-bold">Jobs</h3>
        </a>
        <div class="row mx-2 align-items-center" >
            <div class="col-md-9">
                 <p> Orur content. Be sure to look under the hood at the source HTML here as we've adjusted
                    the alignment and sizing of both column's content for equal-height.</p>
            </div>
            <div class="col-md-2">
                <form  action="{{ route('users.addjob',  auth()->user()->name) }}" >
                    <button type="submit" class="btn btn-primary my-3">Add new Job</button>
                </form>
            </div>
            
        </div>
    </div>

    <div class="list-group">
    @if ($user_jobs -> count())
        @foreach($user_jobs as $user_job)
        <a href="{{ route('users.jobs.manage', [$user_job->user, $user_job->id]) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="/images/icon-alliance/group-chat.png" alt="twbs" width="100" height="100" class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-0">{{ $user_job-> titre}}</h6>
                <p class="mb-0 opacity-75">{{ $user_job-> description}}</p>
            </div>
            <small class="opacity-50 text-nowrap">{{ $user_job-> created_at->diffForHumans() }}</small>
            </div>
        </a>
        @endforeach
    @else
        <p class="mx-5 my-5">No Discussion Available or posted</p>
    @endif
    </div>

</div>




@endsection