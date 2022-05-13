@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light  py-5">
        <div class="row">
            <div class="profile-edit col-sm-9">
                <div class="header-style">
                    <h1 class="display-4 lh-lg">Update {{ $hackerthons-> titre }} Hackerthon</h1>
                </div>
                <div class="flex justify-center">
                    @auth
                        <div class="container">
                            
                            <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-category-center"
                                novalidate action="{{ route('users.update_hackerthon',  $hackerthons-> titre) }}" method="post">
                                
                                @csrf
                                <div class="col-md-4">
                                    <label for="titre" class="form-label">titre</label>
                                    <input type="text" name="titre" id="titre" placeholder="Your titre" 
                                    class="form-control py-2  rounded-lg @error('titre') border border-danger @enderror" value="{{ $hackerthons->titre}}">
                                    
                                    @error('titre')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="category" class="form-label">category</label>
                                    <input type="text" name="category" id="category" placeholder="category" 
                                    class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ $hackerthons->category}}">

                                    @error('category')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="instructions" class="form-label">instructions</label>
                                    <input type="text" name="instructions" id="instructions" placeholder="Your instructions" 
                                    class="form-control py-2  rounded-lg @error('instructions') border border-danger @enderror" value="{{ $hackerthons->instructions}}">
                                    
                                    @error('instructions')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="limit_group" class="form-label">limit_group</label>
                                    <input type="date" name="limit_group" id="limit_group" placeholder="Your limit_group" 
                                    class="form-control py-2  rounded-lg @error('limit_group') border border-danger @enderror" value="{{ $hackerthons->limit_group}}">
                                    
                                    @error('limit_group')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="tasks" class="form-label">tasks</label>
                                    <input type="text" name="tasks" id="tasks" placeholder="Your tasks" 
                                    class="form-control py-2  rounded-lg @error('tasks') border border-danger @enderror" value="{{ $hackerthons->tasks}}">
                                    
                                    @error('tasks')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="start_at" class="form-label">start_at</label>
                                    <input type="time" name="start_at" id="start_at" placeholder="Your start_at" 
                                    class="form-control py-2  rounded-lg @error('start_at') border border-danger @enderror" value="{{ $hackerthons->start_at}}">
                                    
                                    @error('start_at')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save Modification</button>
                                </div>
                                
                            </form>
                        </div>
                        
                    @endauth
                </div>
            </div>
            
        </div>
    </div>
@endsection