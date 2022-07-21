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
          <div class="col-md-6">
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
          <div class="col-md-6">
              <label for="topic" class="form-label">Topic</label>
              <input type="text" name="topic" id="topic" placeholder="Your topic" 
              class="form-control py-2  rounded-lg @error('topic') border border-danger @enderror" value="{{ old('topic')}}">
              
              @error('topic')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
              @enderror
          </div>
          
          <div class="col-md-12">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="4" value="{{ old('description')}}"></textarea>

              @error('description')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
              @enderror
          </div>

        <!-- ADD RESSOURCES ~##########################"" -->
          <h3 class="py-4 fw-bold text-info">Add Ressources</h3>
          <p style="font-size:14px" class="opacity:0.8">Add at least two ressources like link or content</p>

          <!-- First ressource -->
            
            <script>
                function myFunctionLink() {
                document.getElementById("ressource1").innerHTML = '<div class="col-md-12 py-2"><label for="title" class="form-label">First Ressource title</label>'+
                '<input type="text" name="content[0][title]" id="title" placeholder="Your title" class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ old('content.0.title') }}"> @error('title')<div class="text-danger">{{ $message }} </div> @enderror</div>'+
                '<div class="col-md-12 py-2"><label for="link" class="form-label">Link ressources</label>' +
                        '<input type="text" name="content[0][link]" id="link" placeholder="Your link" class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="{{ old('content.0.link') }}"> @error('link') <div class="text-danger"> {{ $message }} </div>@enderror</div>';
                }
                function myFunctionArticle() {
                document.getElementById("ressource1").innerHTML = '<div class="col-md-12 py-2"><label for="title" class="form-label">First Ressource title</label>'+
                '<input type="text" name="content[0][title]" id="title" placeholder="Your title" class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ old('content.0.title') }}"> @error('title')<div class="text-danger">{{ $message }} </div> @enderror</div>'+
                '<div class="col-md-12 py-2"><label for="description" class="form-label">Article ressource</label>' +
                        '<textarea name="content[0][description]" id="" cols="20" rows="2" class="form-control py-2  rounded-lg @error('description') border border-danger @enderror"></textarea> @error('description') <div class="text-danger"> {{ $message }} </div> @enderror</div>';
                }
               
            </script>
            <div class="bg-light">
                <div class="col-md-12 py-2" id="ressource1">
                    <div class="col-md-12 py-5 d-flex justify-content-center ">
                        <div id="demo" class="btn text-primary border rounded" onclick="myFunctionLink()">Add link</div>
                        <div id="demo" class="btn text-primary border rounded" onclick="myFunctionArticle()">Add article</div>
                        
                    </div>
                </div>
            </div>
            

            <script>
                function myFunctionLink1() {
                document.getElementById("ressource2").innerHTML = '<div class="col-md-12 py-2"><label for="title" class="form-label">First Ressource title</label>'+
                '<input type="text" name="content[1][title]" id="title" placeholder="Your title" class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ old('content.1.title') }}"> @error('title')<div class="text-danger">{{ $message }} </div> @enderror</div>'+
                '<div class="col-md-12 py-2"><label for="link" class="form-label">Link ressources</label>' +
                        '<input type="text" name="content[1][link]" id="link" placeholder="Your link" class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="{{ old('content.1.link') }}"> @error('link') <div class="text-danger"> {{ $message }} </div>@enderror</div>';
                }
                function myFunctionArticle1() {
                document.getElementById("ressource2").innerHTML = '<div class="col-md-12 py-2"><label for="title" class="form-label">First Ressource title</label>'+
                '<input type="text" name="content[1][title]" id="title" placeholder="Your title" class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ old('content.1.title') }}"> @error('title')<div class="text-danger">{{ $message }} </div> @enderror</div>'+
                '<div class="col-md-12 py-2"><label for="description" class="form-label">Article ressource</label>' +
                        '<textarea name="content[1][description]" id="" cols="20" rows="2" class="form-control py-2  rounded-lg @error('description') border border-danger @enderror"></textarea> @error('description') <div class="text-danger"> {{ $message }} </div> @enderror</div>';
                }
            </script>
            <div class="bg-light">
                <div class="col-md-12 py-2" id="ressource2">
                    <div class="col-md-12 py-5 d-flex justify-content-center ">
                        <div id="demo" class="btn text-primary border rounded" onclick="myFunctionLink1()">Add link</div>
                        <div id="demo" class="btn text-primary border rounded" onclick="myFunctionArticle1()">Add article</div>
                    </div>
                </div>
            </div>
            

            <script>
                // var loadFile = function(event){
                //     var output= document.getElementById('output');
                //     output.src = URL.createObjectURL(event.target.files[0]);
                // }
                // var loadFile2 = function(event){
                //     var output= document.getElementById('output2');
                //     output2.src = URL.createObjectURL(event.target.files[0]);
                // }
            </script>
            


            <!-- End ADD RESSOURCES -->

            <h3 class="py-4 fw-bold text-info">Add Prompt questions</h3>
            
            <div class="col-md-12">
                <label for="questions.0.question" class="form-label">Prompt question 1</label>
                <input type="text" name="questions[0][question]" value="{{ old('questions.0.question') }}" id="questions.0.question" placeholder="question" 
                class="form-control py-2  rounded-lg @error('questions.0.question') border border-danger @enderror">
                
                @error('questions.0.question')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="questions.1.question" class="form-label">Prompt question 2</label>
                <input type="text" name="questions[1][question]" value="{{ old('questions.1.question') }}" id="questions.1.question" placeholder="question" 
                class="form-control py-2  rounded-lg @error('questions.1.question') border border-danger @enderror">
                
                @error('questions.1.question')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <!-- Start exercise section ###########" -->
            <h3 class="py-4 fw-bold text-info">Add Exercise</h3>
            <div class="col-md-12">
                <label for="question" class="form-label">Exercise 1</label>
                <textarea class="form-control py-2  rounded-lg @error('exercises.0.question') border border-danger @enderror" name="exercises[0][question]" id="exercise1" cols="30" rows="2" value="{{ old('exercises.0.question') }}"></textarea>
                @error('exercise1')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="question" class="form-label">Exercise 2</label>
                <textarea class="form-control py-2  rounded-lg @error('exercises.1.question') border border-danger @enderror" name="exercises[1][question]" id="exercise1" cols="30" rows="2" value="{{ old('exercises.1.question') }}"></textarea>
                @error('exercise2')
                    <div class="text-danger">
                        {{ $message }}
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