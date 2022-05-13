@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light  py-5">
        <div class="row">
            <div class="profile-edit col-sm-9">
                <div class="header-style">
                    <h1 class="display-4 lh-lg">New Job</h1>
                </div>
                <div class="flex justify-center">
                    <div class="container">
                        <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                            novalidate action="{{ route('users.addjob',  auth()->user()->name) }}" method="post">
                            
                            @csrf
                            <div class="col-md-6">
                                <label for="titre" class="form-label">Job Position</label>
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
                                <label for="requirements" class="form-label">Requirements for the position</label>
                                <input type="text" name="requirements" id="requirements" placeholder="requirements" 
                                class="form-control py-2  rounded-lg @error('requirements') border border-danger @enderror" value="">

                                @error('requirements')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            

                            <div class="col-md-6">
                                <label for="deadline" class="form-label">Application deadline </label>
                                <input type="date" name="deadline" id="deadline" placeholder="deadline" 
                                class="form-control py-2  rounded-lg @error('deadline') border border-danger @enderror" value="">

                                @error('deadline')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="links" class="form-label">Link to the platform</label>
                                <input type="text" name="links" id="links" placeholder="links" 
                                class="form-control py-2  rounded-lg @error('links') border border-danger @enderror" value="">

                                @error('links')
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