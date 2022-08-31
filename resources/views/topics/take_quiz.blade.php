@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="container-fluid mt-20">
        <div class="row  justify-content-center">
            <!-- START Listed Topics here -->
            <div class="col-lg-8">
            <!-- Start of Topic here  #################################################-->
            @if ($exercise ->count())

                <a href="#" class="m-2 list-group-item-action d-block gap-3 bg-light" aria-current="true">
                    @if ($exercise->topic->category === '1' )
                    <div class="col justify-content-center p-4 rounded"  style="height: 35vh;  background-image: url('/images/icon/back-col5.png');">
                        @if ($exercise->topic->user->image)
                            <img src="{{ '/storage/images/'.$exercise->topic->user->id.'/'.$exercise->topic->user->image }}" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                        @else
                            <img src="/images/cxc.jpg" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                        @endif
                    </div>
                    @elseif ($exercise->topic->category === '2' )
                    <div class="col justify-content-center p-4 rounded"  style="height: 35vh;  background-image: url('/images/icon/back-col6.png');">
                        @if ($exercise->topic->user->image)
                            <img src="{{ '/storage/images/'.$exercise->topic->user->id.'/'.$exercise->topic->user->image }}" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                        @else
                            <img src="/images/cxc.jpg" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                        @endif
                    </div>
                    @else
                        <div class="col justify-content-center p-4 rounded"  style="height: 35vh;  background-image: url('/images/icon/back-col8.png');">
                            @if ($exercise->topic->user->image)
                                <img src="{{ '/storage/images/'.$exercise->topic->user->id.'/'.$exercise->topic->user->image }}" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                            @else
                                <img src="/images/cxc.jpg" alt="twbs" width="130" height="130" class="shadow mt-5 rounded-circle flex-shrink-0 shadow-sm">
                            @endif
                        </div>
                    @endif
                </a>
                <a href="#" class="list-group-item-action d-block gap-3 py-2 m-2 bg-white " aria-current="true">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h4 class="mb-0 py-2 text-black">{{ $exercise->topic-> topic}}</h4>
                            <div class="d-flex gap-2 w-100 align-items-center pt-2">
                                <nav class="opacity-100 display-7" style="font-size:14px">By {{ $exercise-> user->name }}, </nav>
                            </div>
                            <h5 class="py-2 mt-4 text-primary"><nav><i class="p-1 fa fa-wpforms" style="font-size:20px;" aria-hidden="true"></i> Take Quiz</nav> </h5>
                            <!-- <h6 class="mb-0 py-2 text-primary"></h6> -->
                            <p><strong>Question: </strong>  {{ $exercise-> question}}</p>
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
                                  <label for=""><strong class="text-danger">* </strong> Write down your answer </label>
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