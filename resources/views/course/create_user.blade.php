@extends('layouts.app')

@section('content')

<div class="py-5 text-center">
    <h2>Create new course</h2>
    <p>Course arre uploaded and edited, feel all info</p>
</div>

  <div class="row g-5 py-3 mx-2 justify-content-center">
      
      <div class="col-md-7 col-lg-7">
        <form class="needs-validation" novalidate action="{{ route('users.createcourse',  auth()->user()->name) }}" method="post">
          <div class="row g-3">
            @csrf

            <div class="col-md-6">
                <label for="category" class="form-label">Category Theme</label>
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
                <label for="name" class="form-label">name</label>
                <input type="text" name="name" id="name" placeholder="Your name" 
                class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="{{ old('name')}}">
                
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" placeholder="description" 
                class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" value="{{ old('description')}}">

                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Cover</label>
                <input class="form-control @error('image') border border-danger @enderror" name="image" type="file" id="image" value="{{ old('image')}}" onchange="loadFile(event)">

                @error('image')
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
          <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Register</button>
              <button type="submit" class="btn btn-danger">Cancel</button>
          </div>
        </form>
    </div>
</div>



@endsection