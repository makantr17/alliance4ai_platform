@extends('layouts.app')

@section('content')

<div class="py-5 text-center">
    <h2>Add new topic</h2>
    <p>Topic informations will be saved</p>
</div>

  <div class="row g-5 py-5 mx-2">
    
    <div class="col-md-7 col-lg-8">
      <form class="needs-validation" novalidate action="{{ route('users.createtopics',  auth()->user()->name ) }}" method="post" enctype="multipart/form-data">
        <div class="row g-3">
          @csrf
          <div class="col-md-12">
              <label for="category" class="form-label">Category</label>
                  <select name="category" id="category"
                      class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                      <option value="">Choose Category</option>
                      <option value="0">Future Tech</option>
                      <option value="1">Workplace Skills</option>
                      <option value="2">Ethics & History</option>
                  </select>

              @error('category')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="col-md-12">
              <label for="topic" class="form-label">Topic</label>
              <input type="text" name="topic" id="topic" placeholder="Your topic" 
              class="form-control py-2  rounded-lg @error('topic') border border-danger @enderror" value="">
              
              @error('topic')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
              @enderror
          </div>
          
          <div class="col-md-12">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="4" value="{{ $user->description}}"></textarea>

              @error('description')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
              @enderror
          </div>

          <div class="mb-3">
              <label for="image" class="form-label">Upload Cover</label>
              <input class="form-control @error('image') border border-danger @enderror" name="image" type="file" id="image" value="">

              @error('image')
                  <div class="text-danger">
                      {{ $image }}
                  </div>
              @enderror
          </div>

        </div>
        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
      </form>
  </div>
</div>






@endsection