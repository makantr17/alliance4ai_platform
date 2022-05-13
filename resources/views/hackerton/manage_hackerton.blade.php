@extends('layouts.app')

@section('content')


<div class="container py-4">
    @if ($hackerthon -> count())
        @foreach($hackerthon as $hackerthons)
        <div class="p-3 mb-4 bg-light rounded-3">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="mx-3 my-3"  width="80" height="80" src="/images/icon-alliance/diploma.png" alt="enterprise">
                <h3 class="display-6 fw-bold">{{ $hackerthons-> titre}}</h3>
            </a>
            <div class="container-fluid py-4">
                <div class="h-100 p-4 bg-light border rounded-3">
                    <h4>{{ $hackerthons-> category}}</h4>
                    <p> {{ $hackerthons-> description}}</p>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 w-100 justify-content-between align-items-center">
            <nav><h4>Members Joined the HackerThon</h4></nav>
            <div class="d-flex align-items-row ">
                <form class="mx-1" action="" >
                    <button type="submit" class="btn btn-primary my-3">Add member</button>
                </form>
                <form class="mx-1" action="{{ route('users.update_hackerthon',  $hackerthons-> titre) }}" >
                    <button type="submit" class="btn btn-primary my-3">Edit Hackerthon</button>
                </form>
            </div>
        </div>
        @endforeach
    @else
        <p></p>
    @endif  

    <div class="row g-5 py-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Timeline</h6>
              <small class="text-muted">start_at -end_at</small>
            </div>
            <span class="text-muted">1week</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Remplir les info</h6>
              <small class="text-muted">Corectement remplir les info</small>
            </div>
            <span class="text-muted">100</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Athentification</h6>
              <small class="text-muted">Informations correctes</small>
            </div>
            <span class="text-muted">100</span>
          </li>
          
        </ul>   
      </div>
      <div class="col-md-7 col-lg-8">
        <div class="list-group">
            @if ($hackerthon -> count())
                @foreach($hackerthon as $hackerthons)
                <a href="" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                    <img src="/images/icon-alliance/hacker.png" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">Mamady Kante</h6>
                            <p class="mb-0 opacity-75">City conakry</p>
                        </div>
                        <small class="opacity-50 text-nowrap">{{ $hackerthons-> created_at->diffForHumans() }}</small>
                    </div>
                </a>
                @endforeach

            @else
                <p>No Discussion Available or posted</p>
            @endif
        </div>
      </div>
    </div>
</div>




@endsection