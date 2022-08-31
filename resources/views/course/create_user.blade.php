@extends('layouts.app')

@section('content')

<div class="py-5 text-center">
    <h2>Create new course</h2>
    <p>Course arre uploaded and edited, feel all info</p>
</div>

  <div class="row g-5 py-3 mx-2 justify-content-center">
      
      <div class="col-md-7 col-lg-7">
        <form class="needs-validation" novalidate action="{{ route('users.createcourse',  auth()->user()) }}" method="post">
          <div class="row g-3">
            @csrf

            <div class="col-md-12">
                <label for="category" class="form-label"><strong class="text-danger">* </strong> Category Theme</label>
                    <select name="category" id="category"
                        class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                        <option value="">Choose Category</option>
                        <option value="1" {{ old('category') == "1" ? 'selected' : '' }}>Futur Tech</option>
                        <option value="2" {{ old('category') == "2" ? 'selected' : '' }}>History & Ethics</option>
                        <option value="3" {{ old('category') == "3" ? 'selected' : '' }}>Workplace Skills</option>
                    </select>

                @error('category')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="name" class="form-label"><strong class="text-danger">* </strong> Course Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" 
                class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="{{ old('name')}}">
                
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-md-12">
              <label for="description" class="form-label"><strong class="text-danger">* </strong> Course Description</label>
              <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="4" value="{{ $user->description}}"></textarea>

              @error('description')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"><strong class="text-danger">* </strong> Upload Cover</label>
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