@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light  py-5">
        <div class="row">
            <div class="profile-edit col-sm-9">
                <div class="header-style">
                    <h1 class="display-4 lh-lg">New Hackerthon</h1>
                </div>
                <div class="flex justify-center">
                    <div class="container">
                        <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                            novalidate action="{{ route('users.create_hackerthon',  auth()->user()->name) }}" method="post">
                            
                            @csrf
                            <div class="col-md-6">
                                <label for="category" class="form-label">Category Hackerthon</label>
                                <input type="text" name="category" id="category" placeholder="Your category" 
                                class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="">
                                
                                @error('category')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="titre" class="form-label">Title</label>
                                <input type="text" name="titre" id="titre" placeholder="Your titre" 
                                class="form-control py-2  rounded-lg @error('titre') border border-danger @enderror" value="">
                                
                                @error('titre')
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

                            <div class="col-md-6">
                                <label for="instructions" class="form-label">Requirements for the position</label>
                                <input type="text" name="instructions" id="instructions" placeholder="instructions" 
                                class="form-control py-2  rounded-lg @error('instructions') border border-danger @enderror" value="">

                                @error('instructions')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tasks" class="form-label">Link to the platform</label>
                                <input type="text" name="tasks" id="tasks" placeholder="tasks" 
                                class="form-control py-2  rounded-lg @error('tasks') border border-danger @enderror" value="">

                                @error('tasks')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="limit_group" class="form-label">Application limit_group </label>
                                <input type="number" name="limit_group" id="limit_group" placeholder="limit_group" 
                                class="form-control py-2  rounded-lg @error('limit_group') border border-danger @enderror" value="">

                                @error('limit_group')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Save HackerThon</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection