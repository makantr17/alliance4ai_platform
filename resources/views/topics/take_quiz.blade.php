@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="container-fluid mt-20">
        <div class="row">
            <!-- START Listed Topics here -->
            <div class="col-lg-8">
            <!-- Start of Topic here  #################################################-->
            @if ($exercise ->count())
                <a href="#" class="list-group-item list-group-item-action border d-block gap-3 py-2 m-2 bg-white " aria-current="true">
                    <div class="d-block justify-content-center overflow-hidden mb-2" style="max-height: 35vh;">
                        @if ($exercise->topic -> image)
                            <img src="{{ '/storage/images/topic/'.$exercise->topic->topic.'/'.$exercise->topic->image }}" alt="twbs" width="" height="" class="rounded flex-shrink-0 ">
                        @else
                            <img src="/images/icon-alliance/message.png" alt="twbs" width="150" height="150" class="rounded flex-shrink-0 shadow-sm p-1">
                        @endif
                    </div>
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            @if ($exercise->user->image)
                                <img src="{{ '/storage/images/'.$exercise->user->id.'/'.$exercise->user->image }}" alt="twbs" width="45" height="45" class="rounded-circle flex-shrink-0 p-1 border border-info">
                            @else
                                <img src="/images/icon-alliance/message.png" alt="twbs" width="45" height="45" class="rounded-circle flex-shrink-0 shadow-sm p-1">
                            @endif
                            <small class="opacity-50 text-nowrap">{{ $exercise-> user->name }}</small>
                            <h1 class="py-2">Question</h1>
                            <h6 class="mb-0 py-2">{{ $exercise-> question}}</h6>
                            <nav>{{ $exercise-> description}}</nav>
                        </div>
                    </div>
                </a>

                @auth
                    <!-- NEW REPLY START HERE -->
                    <div class="light-bg col-lg-12 mb-10 p-2 ">
                        <form class="needs-validation" novalidate action="{{ route('topics.takequiz',  $exercise-> id) }}" method="post">
                            <div class="row g-3">
                                @csrf
                                <div class="col-md-4">
                                    <input type="text" name="user_id" id="user_id" placeholder="user_id"  hidden readonly
                                    class="form-control py-2  rounded-lg @error('user_id') border border-danger @enderror" value="{{ auth()->user()->id }}">
                                    @error('user_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="exercise_id" id="exercise_id" placeholder="exercise_id"  hidden readonly
                                    class="form-control py-2  rounded-lg @error('exercise_id') border border-danger @enderror" value="{{ $exercise-> id}}">
                                    @error('exercise_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                  <label for="">Write down your answer</label>
                                    <textarea type="text" name="answer" id="answer" cols="5" rows="5"
                                    class="form-control py-2  rounded-lg @error('answer') border border-danger @enderror" value=""> </textarea>
                                    
                                    @error('answer')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                  <label for="link" class="form-label">Link</label>
                                  <input type="text" name="link" id="link" placeholder="Your link" 
                                  class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="">
                                  
                                  @error('link')
                                      <div class="text-danger">
                                          {{ $message }}
                                      </div>
                                  @enderror
                              </div>

                                <div class="col-sm-12 mb-3">
                                  <label for="file" class="form-label">Attach a file</label>
                                  <input class="form-control" name="image" type="file" id="image" value="">
                                </div>

                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-secondary small">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endauth
            @else
            <div class="col-lg-12 text-center"> 
                <div class="d-flex justify-content-center align-items-center">
                    <img src="/images/icon-alliance/chat1.png" class="border-3" alt="twbs" width="" height="200" class="flex-shrink-0 ">
                </div>
            </div>
            @endif



          </div>
    </div>
</div>




@endsection