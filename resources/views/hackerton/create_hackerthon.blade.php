@extends('layouts.app')

@section('content')
                <div class="py-5 text-center">
                    <h2>New Hackathon</h2>
                </div>

                <div class="row g-5 py-3 mx-2 justify-content-center">
                    
                    <div class="col-md-7 col-lg-7">
                        <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                            novalidate action="{{ route('users.create_hackerthon',  auth()->user()->name) }}" method="post" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Description</h5>
                            </div>
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

                            <div class="col-md-6">
                                <label for="title" class="form-label">Hackathon Title</label>
                                <input type="text" name="title" id="title" placeholder="Your title" 
                                class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ old('title')}}">
                                
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="subtitle1" class="form-label">Subtitle 1</label>
                                <input type="text" name="subtitle1" id="subtitle1" placeholder="subtitle 1" 
                                class="form-control py-2  rounded-lg @error('subtitle1') border border-danger @enderror" value="{{ old('subtitle1')}}">
                                
                                @error('subtitle1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="description1" class="form-label">Description1</label>
                                <textarea class="form-control py-2  rounded-lg @error('description1') border border-danger @enderror" name="description1" id="description1" cols="30" rows="5" value="{{ old('description1')}}"></textarea>

                                @error('description1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="subtitle2" class="form-label">Subtitle 2</label>
                                <input type="text" name="subtitle2" id="subtitle2" placeholder="subtitle 1" 
                                class="form-control py-2  rounded-lg @error('subtitle2') border border-danger @enderror" value="{{ old('subtitle2')}}">
                                
                                @error('subtitle2')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="description2" class="form-label">Description2</label>
                                <textarea class="form-control py-2  rounded-lg @error('description2') border border-danger @enderror" name="description2" id="description2" cols="30" rows="5" value="{{ old('description2')}}"></textarea>

                                @error('description2')
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
                            <!-- Submission process -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Submission Details</h5>
                            </div>
                            <div class="col-md-12">
                                <label for="instructions" class="form-label">Submission details</label>
                                <textarea class="form-control py-2  rounded-lg @error('instructions') border border-danger @enderror" name="instructions" id="instructions" cols="30" rows="4" value="{{ $user->instructions}}"></textarea>

                                @error('instructions')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Evaluation process -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Evaluation Process</h5>
                            </div>
                            <div class="col-md-12">
                                <label for="evaluation" class="form-label">Evaluation details</label>
                                <textarea class="form-control py-2  rounded-lg @error('evaluation') border border-danger @enderror" name="evaluation" id="evaluation" cols="30" rows="4" value="{{ $user->evaluation}}"></textarea>

                                @error('evaluation')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Rules ..//§§///////////////// -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Set Rules</h5>
                            </div>

                            <div class="col-md-12">
                                <label for="rules" class="form-label">Lis of rules</label>
                                <textarea class="form-control py-2  rounded-lg @error('rules') border border-danger @enderror" name="rules" id="rules" cols="30" rows="4" value="{{ $user->rules}}"></textarea>

                                @error('rules')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="col-md-12">
                                <label for="limit_group" class="form-label">Set maximum member by group</label>
                                <input type="number" name="limit_group" id="limit_group" placeholder="limit_group" 
                                class="form-control py-2  rounded-lg @error('limit_group') border border-danger @enderror" value="">

                                @error('limit_group')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Prizes</h5>
                            </div>
                            <div class="col-md-4">
                                <label for="first_prize" class="form-label">First Prize</label>
                                <input type="number" name="first_prize" id="first_prize" placeholder="first" 
                                class="form-control py-2  rounded-lg @error('first_prize') border border-danger @enderror" value="">

                                @error('first_prize')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="second_prize" class="form-label">Second Prize</label>
                                <input type="number" name="second_prize" id="second_prize" placeholder="Second prize" 
                                class="form-control py-2  rounded-lg @error('second_prize') border border-danger @enderror" value="">

                                @error('second_prize')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="third_prize" class="form-label">Third Prize</label>
                                <input type="number" name="third_prize" id="third_prize" placeholder="Third prize" 
                                class="form-control py-2  rounded-lg @error('third_prize') border border-danger @enderror" value="">

                                @error('third_prize')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            
                            
                            <!-- Timeline for competition &&&&&&&&&&&&&&&& -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">Timelines</h5>
                            </div>

                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" name="start_date" id="start_date" placeholder="start date" 
                                class="form-control py-2  rounded-lg @error('start_date') border border-danger @enderror" value="">

                                @error('start_date')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="deadline" class="form-label">Deadline for submission</label>
                                <input type="date" name="deadline" id="deadline" placeholder="start date" 
                                class="form-control py-2  rounded-lg @error('deadline') border border-danger @enderror" value="">

                                @error('deadline')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Timeline for competition &&&&&&&&&&&&&&&& -->
                            <div class="col-12">
                                <h5 class="py-4 fw-bold text-info">References</h5>
                                <p>These links will help competitors to explore and get ready for the hackethon</p>
                            </div>
                            <div class="col-md-6">
                                <label for="link1" class="form-label">link 1</label>
                                <input type="text" name="link1" id="link1" placeholder="link1" 
                                class="form-control py-2  rounded-lg @error('link1') border border-danger @enderror" value="">

                                @error('link1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="link2" class="form-label">link 2</label>
                                <input type="text" name="link2" id="link2" placeholder="link2" 
                                class="form-control py-2  rounded-lg @error('link2') border border-danger @enderror" value="">

                                @error('link2')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="my-4">

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Register</button>
                                <a href="{{ route('users.hackerthon',  auth()->user()->name) }}" class="btn btn-danger">Cancel</a>
                            </div>
                            
                        </form>
                    </div>
                </div>
@endsection