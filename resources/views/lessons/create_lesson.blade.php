@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light  py-5">
        <div class="row">
            <div class="profile-edit col-sm-9">
                <div class="header-style">
                    <h1 class="display-4 lh-lg">Create New Lesson</h1>
                </div>
                <div class="flex justify-center">
                    @auth
                        <div class="container">
                            <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                                novalidate action="{{ route('users.createlessons',  auth()->user()->name ) }}" method="post">
                                
                                @csrf
                                <div class="col-md-6">
                                   <label for="course_id" class="form-label">Course_id group</label>
                                        <select name="course_id" id="course_id"
                                            class="form-control py-2  rounded-lg @error('course_id') border border-danger @enderror" value="{{ old('course_id')}}">
                                            <option value="">choose Course</option>
                                            @if ($course -> count())
                                                @foreach($course as $courses)
                                                    <option value="{{ $courses-> id}}">{{ $courses-> titre}}</option>
                                                @endforeach
                                            @else
                                                <option value="none">does not have any posts</option>
                                            @endif
                                        </select>

                                    @error('course_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="form-label">title</label>
                                    <input type="text" name="title" id="title" placeholder="Your title" 
                                    class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ $user->title}}">
                                    
                                    @error('title')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="content" class="form-label">content</label>
                                    <input type="text" name="content" id="content" placeholder="content" 
                                    class="form-control py-2  rounded-lg @error('content') border border-danger @enderror" value="{{ $user->content}}">

                                    @error('content')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="link" class="form-label">link</label>
                                    <input type="text" name="link" id="link" placeholder="Your link" 
                                    class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="{{ $user->link}}">
                                    
                                    @error('link')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="estimate_time" class="form-label">estimate_time</label>
                                    <input type="time" name="estimate_time" id="estimate_time" placeholder="Your estimate_time" 
                                    class="form-control py-2  rounded-lg @error('estimate_time') border border-danger @enderror" value="{{ $user->estimate_time}}">
                                    
                                    @error('estimate_time')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add Course</button>
                                </div>
                                
                            </form>
                        </div>
                        
                    @endauth
                </div>
            </div>
            
        </div>
    </div>
@endsection