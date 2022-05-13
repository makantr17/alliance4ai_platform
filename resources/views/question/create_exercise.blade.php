@extends('layouts.app')

@section('content')

<div class="py-5 text-center">
      <h2>Question</h2>
      <p>Information about a question</p>
    </div>

    <div class="row g-5 py-5 mx-1">
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate action="{{ route('users.addexercise',  $topic) }}" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            @csrf

            <div class="col-md-12">
                <label for="question" class="form-label">Question</label>
                <input type="text" name="question" id="question" placeholder="Your question" 
                class="form-control py-2  rounded-lg @error('question') border border-danger @enderror" value="">
                
                @error('question')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="link" class="form-label">Link</label>
                <input type="text" name="link" id="link" placeholder="Your link" 
                class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="">
                
                @error('link')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="start" class="form-label">Start</label>
                <input type="date" name="start" id="start" placeholder="Your start" 
                class="form-control py-2  rounded-lg @error('start') border border-danger @enderror" value="">
                
                @error('start')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="end" class="form-label">End</label>
                <input type="date" name="end" id="end" placeholder="Your end" 
                class="form-control py-2  rounded-lg @error('end') border border-danger @enderror" value="">
                
                @error('end')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" placeholder="Your title" 
                class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="">
                
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="1x" value=""></textarea>

                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-md-12">
                <label for="explanation" class="form-label">Explanation</label>
                <textarea class="form-control py-2  rounded-lg @error('explanation') border border-danger @enderror" name="explanation" id="explanation" cols="30" rows="1" value=""></textarea>

                @error('explanation')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-5">
                <label for="is_active" class="form-label">Is this question active?</label>
                    <select name="is_active" id="is_active"
                        class="form-control py-2  rounded-lg @error('is_active') border border-danger @enderror" value="{{ old('is_active')}}">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>

                @error('is_active')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-sm-12 mb-3">
                <label for="file" class="form-label">Edit your image</label>
                <input class="form-control" name="image" type="file" id="image" value="">
            </div>
          </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
        </form>
    </div>
</div>




@endsection