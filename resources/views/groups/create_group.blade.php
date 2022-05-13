@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light  py-5">
        <div class="row">
            <div class="profile-edit col-sm-9">
                <div class="header-style">
                    <h1 class="display-4 lh-lg">Create New Group</h1>
                </div>
                <div class="flex justify-center">
                    <div class="container">
                        <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center" enctype="multipart/form-data"
                            novalidate action="{{ route('users.creategroups',  auth()->user()->name) }}" method="post">
                            
                            @csrf
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" placeholder="Your name" 
                                class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="">
                                
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" name="titre" id="titre" placeholder="Your titre" 
                                class="form-control py-2  rounded-lg @error('titre') border border-danger @enderror" value="">
                                
                                @error('titre')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" id="location" placeholder="Your location" 
                                class="form-control py-2  rounded-lg @error('location') border border-danger @enderror" value="">
                                
                                @error('location')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="limit" class="form-label">Maximum Collaborator</label>
                                <input type="number" name="limit" id="limit" placeholder="limit" 
                                class="form-control py-2  rounded-lg @error('limit') border border-danger @enderror" value="">

                                @error('limit')
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

                            <div class="mb-6">
                                <label for="image" class="form-label">Add cover</label>
                                <input class="form-control @error('image') border-danger @enderror" name="image" type="file" id="image"  value="">
                                @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Add Group</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection