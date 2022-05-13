@extends('layouts.app')

@section('content')

<div class="py-5 text-center">
      <h2>Update Lesson</h2>
      <p>Updating these information will be changed when saved</p>
    </div>

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
          
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate action="{{ route('users.updatelessons',  $lesson-> title) }}" method="post">
          <div class="row g-3">
            @csrf

            <div class="col-md-6">
                <label for="title" class="form-label"> Title</label>
                <input type="text" name="title" id="title" placeholder="Your title" 
                class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ $lesson->title}}">
                
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-md-6">
                <label for="content" class="form-label"> Content</label>
                <input type="text" name="content" id="content" placeholder="content" 
                class="form-control py-2  rounded-lg @error('content') border border-danger @enderror" value="{{ $lesson->content}}">

                @error('content')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="link" class="form-label"> Link</label>
                <input type="text" name="link" id="link" placeholder="Your link" 
                class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="{{ $lesson->link}}">
                
                @error('link')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="estimate_time" class="form-label"> Estimate_time</label>
                <input type="time" name="estimate_time" id="estimate_time" placeholder="Your estimate_time" 
                class="form-control py-2  rounded-lg @error('estimate_time') border border-danger @enderror" value="{{ $lesson->estimate_time}}">
                
                @error('estimate_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Sauvegarde</button>
        </form>
    </div>
</div>


@endsection