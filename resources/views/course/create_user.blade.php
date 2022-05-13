@extends('layouts.app')

@section('content')

    <div class="py-5 text-center">
      <h2>Create new course</h2>
      <p>Course arre uploaded and edited, feel all info</p>
    </div>

    <div class="row g-5 py-3 mx-2">
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
        <form class="needs-validation" novalidate action="{{ route('users.createcourse',  auth()->user()->name) }}" method="post">
          <div class="row g-3">
            @csrf

            <div class="col-md-12">
                <label for="titre" class="form-label">titre</label>
                <input type="text" name="titre" id="titre" placeholder="Your titre" 
                class="form-control py-2  rounded-lg @error('titre') border border-danger @enderror" value="{{ $user->titre}}">
                
                @error('titre')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" placeholder="description" 
                class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" value="{{ $user->description}}">

                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Sauvegarde</button>
        </form>
    </div>
</div>



@endsection