@extends('layouts.app')

@section('content')
<div class="py-5 text-center border-bottom">
    <h2>New Group</h2>
</div>

<div class="row g-5 py-3 mx-2 justify-content-center">
    <div class="col-md-7 col-lg-7">
        <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center" enctype="multipart/form-data"
            novalidate action="{{ route('users.creategroups',  auth()->user()->name) }}" method="post">
            
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" 
                class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="{{ old('name')}}">
                
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" placeholder="Your titre" 
                class="form-control py-2  rounded-lg @error('titre') border border-danger @enderror" value="{{ old('titre')}}">
                
                @error('titre')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" id="location" placeholder="Your location" 
                class="form-control py-2  rounded-lg @error('location') border border-danger @enderror" value="{{ old('location')}}">
                
                @error('location')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="limit" class="form-label">Maximum Collaborator</label>
                <input type="number" name="limit" id="limit" placeholder="limit" 
                class="form-control py-2  rounded-lg @error('limit') border border-danger @enderror" value="{{ old('limit')}}">

                @error('limit')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="5" value="{{ old('description')}}"></textarea>
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
            

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Add Group</button>
            </div>
            
        </form>
    </div>
</div>
@endsection