@extends('layouts.app')

@section('content')

<div class="py-5 text-center">
    <h2>Add new topic</h2>
</div>

  <div class="row g-5 py-3 mx-2 justify-content-center">
    
    <div class="col-md-7 col-lg-7">
      <form class="needs-validation" novalidate action="{{ route('users.createtopics',  auth()->user()->name ) }}" method="post" enctype="multipart/form-data">
        <div class="row g-3">
          @csrf

          <h3 class="py-4 fw-bold text-info">Topic information</h3>
          <div class="border bg-light py-4 col-lg-12">
                <div class="col-md-12 my-3">
                    <label for="category" class="form-label">Category of Topics</label>
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
                <div class="col-md-12 my-3">
                    <label for="topic" class="form-label">Topic name</label>
                    <input type="text" name="topic" id="topic" placeholder="topic name" 
                    class="form-control py-2  rounded-lg @error('topic') border border-danger @enderror" value="{{ old('topic')}}">
                    
                    @error('topic')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            
                <div class="col-md-12 my-3">
                    <label for="description" class="form-label">Topic description</label>
                    <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="4" value="{{ old('description')}}"></textarea>

                    @error('description')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- ADD RESSOURCES ~##########################"" -->
            <h3 class="py-4 fw-bold text-info">Add Ressources</h3>
            <div class="border bg-light py-2 col-lg-12">
                <div class="col-md-12 py-1"><label for="title" class="form-label">Ressource title</label>
                    <input type="text" name="content[1][title]" id="title" placeholder="First title" class="form-control py-2  rounded-lg @error('content.1.title') border border-danger @enderror" value="{{ old('content.1.title') }}"> 
                    @error('content.1.title')
                        <div class="text-danger">{{ $message }} </div> 
                    @enderror
                </div>
                <div class="col-md-12 py-1">
                    <label for="link to title" class="form-label">Link to the ressource</label>
                    <input type="text" name="content[1][link]" id="link" placeholder="Second link" class="form-control py-2  rounded-lg @error('content.1.link') border border-danger @enderror" value="{{ old('content.1.link') }}"> 
                    @error('content.1.link') 
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <!-- Add the ressource cover here -->
                <div class="my-3">
                    <label for="image" class="form-label">Upload Cover for the ressource</label>
                    <input class="form-control @error('content.1.image') border border-danger @enderror" name="content[1][image]" type="file" id="image" value="{{ old('content.1.image')}}" onchange="loadFile(event)">

                    @error('content.1.image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 py-1 bg-light">
                    <img id="output" class="my-3 img-circle" style="rounded" width="150" height="" alt="#" src="#" />
                </div>

                <script>
                    var loadFile = function(event){
                        var output= document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                    }
                </script>
            </div>
            <!-- End add ressource cover -->
            <!-- Add second ressources -->
            <div class="border bg-light py-2 col-lg-12">
                <div class="col-md-12 py-1"><label for="title" class="form-label">Ressource title</label>
                    <input type="text" name="content[2][title]" id="title" placeholder="title" class="form-control py-2  rounded-lg @error('content.2.title') border border-danger @enderror" value="{{ old('content.2.title') }}"> 
                    @error('content.2.title')
                        <div class="text-danger">{{ $message }} </div> 
                    @enderror
                </div>
                
                <div class="col-md-12 py-1">
                    <label for="link" class="form-label">Link to the ressource</label>
                    <input type="text" name="content[2][link]" id="link" placeholder="link" class="form-control py-2  rounded-lg @error('content.2.link') border border-danger @enderror" value="{{ old('content.2.link') }}"> 
                    @error('content.2.link') 
                        <div class="text-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <!-- Add the ressource cover here -->
                <div class="my-3">
                    <label for="image" class="form-label">Upload Cover for the ressource</label>
                    <input class="form-control @error('content.2.image') border border-danger @enderror" name="content[2][image]" type="file" id="image" value="{{ old(content[2][image])}}" onchange="loadFile1(event)">

                    @error('content.2.image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 py-1 bg-light">
                    <img id="output1" class="my-3 img-circle" style="rounded" width="150" height="" alt="#" src="#" />
                </div>

                <script>
                    var loadFile1 = function(event){
                        var output= document.getElementById('output1');
                        output.src = URL.createObjectURL(event.target.files[0]);
                    }
                </script>
            </div>
            <!-- End add ressource cover -->
            
            <!-- End ADD RESSOURCES -->

            <h3 class="py-4 fw-bold text-info">Add Prompt questions</h3>
            <div class="border bg-light py-4 col-lg-12">
                <div class="col-md-12">
                    <label for="questions.0.question" class="form-label">First Prompt question</label>
                    <input type="text" name="questions[0][question]" value="{{ old('questions.0.question') }}" id="questions.0.question" placeholder="question" 
                    class="form-control py-2  rounded-lg @error('questions.0.question') border border-danger @enderror">
                    
                    @error('questions.0.question')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 my-3">
                    <label for="questions.1.question" class="form-label">Second Prompt question</label>
                    <input type="text" name="questions[1][question]" value="{{ old('questions.1.question') }}" id="questions.1.question" placeholder="question" 
                    class="form-control py-2  rounded-lg @error('questions.1.question') border border-danger @enderror">
                    
                    @error('questions.1.question')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <!-- Start exercise section ###########" -->
            <h3 class="py-4 fw-bold text-info">Add Exercise</h3>
            <div class="border bg-light py-4 col-lg-12">
                <div class="col-md-12">
                    <label for="question" class="form-label">Exercise 1</label>
                    <textarea class="form-control py-2  rounded-lg @error('exercises.0.question') border border-danger @enderror" name="exercises[0][question]" id="exercise1" cols="30" rows="2" value="{{ old('exercises.0.question') }}">{{ old('exercises.0.question') }}</textarea>
                    @error('exercises.0.question')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 my-3">
                    <label for="question" class="form-label">Exercise 2</label>
                    <textarea class="form-control py-2  rounded-lg @error('exercises.1.question') border border-danger @enderror" name="exercises[1][question]" id="exercise1" cols="30" rows="2" value="{{ old('exercises.1.question') }}">{{ old('exercises.1.question') }}</textarea>
                    @error('exercises.1.question')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>

        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
      </form>
  </div>
</div>






@endsection