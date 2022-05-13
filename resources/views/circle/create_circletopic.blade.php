@extends('layouts.app')

@section('content')


<div class="py-5 text-center">
      <h2>New Circle Discussion</h2>
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
        <form class="needs-validation" novalidate action="{{ route('topiccircle.createcirclediscussion',  $groups->id) }}" method="post">
          <div class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" placeholder="title" 
                class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="">

                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="category" class="form-label">Category group</label>
                <select name="category" id="category"
                class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category') }}">
                    <option value="Future Tech">Future Tech</option>
                    <option value="Workplace Skills">Workplace Skills</option>
                    <option value="Ethics and History">Ethics and History</option>
                </select>

                @error('category')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="type" class="form-label">Type topic</label>
                <select name="type" id="type"
                class="form-control py-2  rounded-lg @error('type') border border-danger @enderror" value="{{ old('type') }}">
                    <option value="Video Call">Video Call</option>
                    <option value="Chatting">Chatting</option>
                </select>

                @error('type')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            

            <div class="col-md-6">
                <label for="content" class="form-label">Content</label>
                <input type="text" name="content" id="content" placeholder="content" 
                class="form-control py-2  rounded-lg @error('content') border border-danger @enderror" value="">

                @error('content')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="link" class="form-label">Link</label>
                <input type="text" name="link" id="link" placeholder="link" 
                class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="">

                @error('link')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="start_time" class="form-label">Start_time</label>
                <input type="time" name="start_time" id="start_time" placeholder="start_time" 
                class="form-control py-2  rounded-lg @error('start_time') border border-danger @enderror" value="">

                @error('start_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="end_time" class="form-label">End_time</label>
                <input type="time" name="end_time" id="end_time" placeholder="end_time" 
                class="form-control py-2  rounded-lg @error('end_time') border border-danger @enderror" value="">

                @error('end_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" placeholder="description" 
                class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" value="">

                @error('description')
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