@extends('layouts.app')

@section('content')
<div class="py-5 text-center">
    <h2>New Lesson</h2>
</div>

<div class="row g-5 py-3 mx-2 justify-content-center">
    
    <div class="col-md-7 col-lg-7">
        @auth
            <form class="row g-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                novalidate action="{{ route('users.createlessons', [$course->user, $course->id]) }}" method="post">
                
                @csrf
                
                <p class="text-info pb-2"><i class="fa fa-edit"></i> Section 1</p>


                <div class="col-md-12">
                    <label for="title" class="form-label">title</label>
                    <input type="text" name="title" id="title" placeholder="Your title" 
                    class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ $user->title}}">
                    
                    @error('title')
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
                
                <div class="col-md-12">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control py-2  rounded-lg @error('content') border border-danger @enderror" name="content" id="content" cols="30" rows="5" value="{{ old('content')}}"></textarea>

                    @error('content')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <p class="text-info py-3"><i class="fa fa-edit"></i> Section 1m</p>

                <div class="col-md-12">
                    <label for="subtitle1" class="form-label">subtitle1</label>
                    <input type="text" name="subtitle1" id="subtitle1" placeholder="Your subtitle1" 
                    class="form-control py-2  rounded-lg @error('subtitle1') border border-danger @enderror" value="{{ $user->subtitle1}}">
                    
                    @error('subtitle1')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="description1" class="form-label">Description1</label>
                    <textarea class="form-control py-2  rounded-lg @error('description1') border border-danger @enderror" name="description1" id="description1" cols="20" rows="4" value="{{ old('description1')}}"></textarea>

                    @error('description1')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="code1" class="form-label">Code1</label>
                    <textarea class="form-control py-2  rounded-lg @error('code1') border border-danger @enderror" name="code1" id="code1" cols="20" rows="4" value="{{ old('code1')}}"></textarea>

                    @error('code1')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="col-md-12">
                    <label for="link1" class="form-label">link1</label>
                    <input type="text" name="link1" id="link1" placeholder="Your link1" 
                    class="form-control py-2  rounded-lg @error('link1') border border-danger @enderror" value="{{ $user->link1}}">
                    
                    @error('link1')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <p class="text-info py-3"><i class="fa fa-edit"></i> Section 3</p>

                <div class="col-md-12">
                    <label for="subtitle2" class="form-label">subtitle2</label>
                    <input type="text" name="subtitle2" id="subtitle2" placeholder="Your subtitle2" 
                    class="form-control py-2  rounded-lg @error('subtitle2') border border-danger @enderror" value="{{ $user->subtitle2}}">
                    
                    @error('subtitle2')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="description2" class="form-label">Description2</label>
                    <textarea class="form-control py-2  rounded-lg @error('description2') border border-danger @enderror" name="description2" id="description2" cols="20" rows="4" value="{{ old('description2')}}"></textarea>

                    @error('description2')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="code2" class="form-label">Code2</label>
                    <textarea class="form-control py-2  rounded-lg @error('code2') border border-danger @enderror" name="code2" id="code2" cols="20" rows="4" value="{{ old('code2')}}"></textarea>

                    @error('code2')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="link2" class="form-label">link2</label>
                    <input type="text" name="link2" id="link2" placeholder="Your link2" 
                    class="form-control py-2  rounded-lg @error('link2') border border-danger @enderror" value="{{ $user->link2}}">
                    
                    @error('link2')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <p class="text-info py-3"><i class="fa fa-edit"></i> Section 4</p>

                <div class="col-md-12">
                    <label for="subtitle3" class="form-label">subtitle3</label>
                    <input type="text" name="subtitle3" id="subtitle3" placeholder="Your subtitle3" 
                    class="form-control py-2  rounded-lg @error('subtitle3') border border-danger @enderror" value="{{ $user->subtitle3}}">
                    
                    @error('subtitle3')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="description3" class="form-label">Description3</label>
                    <textarea class="form-control py-2  rounded-lg @error('description3') border border-danger @enderror" name="description3" id="description3" cols="20" rows="4" value="{{ old('description3')}}"></textarea>

                    @error('description3')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="code3" class="form-label">Code3</label>
                    <textarea class="form-control py-2  rounded-lg @error('code3') border border-danger @enderror" name="code3" id="code3" cols="20" rows="4" value="{{ old('code3')}}"></textarea>

                    @error('code3')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="link3" class="form-label">link3</label>
                    <input type="text" name="link3" id="link3" placeholder="Your link3" 
                    class="form-control py-2  rounded-lg @error('link3') border border-danger @enderror" value="{{ $user->link3}}">
                    
                    @error('link3')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                

                

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>
                </div>
                
            </form>
        @endauth
    </div>
        
    
</div>
@endsection