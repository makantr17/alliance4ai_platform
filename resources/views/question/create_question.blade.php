@extends('layouts.app')

@section('content')

<div class="py-5 text-center">
      <h2>Question</h2>
      <p>Information about a question</p>
    </div>

    <div class="row g-5 py-5">
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate action="{{ route('storeQuestion',  $topic) }}" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            @csrf

            <div class="col-md-12">
                <label for="question" class="form-label">Question</label>
                <input type="text" name="question" id="question" placeholder="Your question" 
                class="form-control py-2  rounded-lg @error('question') border border-danger @enderror" value="">
                
                @error('question')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" name="description" id="description" cols="30" rows="1x" value=""></textarea>

                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-md-12">
                <label for="explanation" class="form-label">Explanation</label>
                <textarea class="form-control py-2  rounded-lg @error('explanation') border border-danger @enderror" name="explanation" id="explanation" cols="30" rows="1" value=""></textarea>

                @error('explanation')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-5">
                <label for="is_active" class="form-label">Is this question active?</label>
                    <select name="is_active" id="is_active"
                        class="form-control py-2  rounded-lg @error('is_active') border border-danger @enderror" value="{{ old('is_active')}}">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>

                @error('is_active')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="grid grid-cols-1 my-5 justify-center">
                <label class="flex items-center">
                    @error('answers.0.answer')
                    <span class="text-red-700 text-xs content-end float-right">{{$message}}</span>
                    @enderror
                    <!-- <input type="hidden" value="0" name="answers[0][is_checked]">
                    <input type="checkbox" value="1" name="answers[0][is_checked]"> -->
                    <select name="answers[0][is_checked]" id="">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <span class="min-w-full mx-auto px-5">
                        <input name="answers[0][answer]" value="{{ old('answers.0.answer') }}" type="text" class="mt-1 text-xs block w-full bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                    </span>
                </label>
                <label class="flex items-center">
                    @error('answers.0.answer')
                    <span class="text-red-700 text-xs content-end float-right">{{$message}}</span>
                    @enderror
                    <!-- <input type="hidden" value="0" name="answers[1][is_checked]">
                    <input type="checkbox" value="1" name="answers[1][is_checked]"> -->
                    <select name="answers[1][is_checked]" id="">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <span class="min-w-full mx-auto px-5">
                        <input name="answers[1][answer]" value="{{ old('answers.1.answer') }}" type="text" class="mt-1 block w-full text-xs  bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                    </span>
                </label>
                <label class="flex items-center">
                    @error('answers.0.answer')
                    <span class="text-red-700 text-xs content-end float-right">{{$message}}</span>
                    @enderror
                    <!-- <input type="hidden" value="0" name="answers[2][is_checked]">
                    <input type="checkbox" value="1" name="answers[2][is_checked]"> -->
                    <select name="answers[2][is_checked]" id="">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <span class="min-w-full mx-auto px-5">
                        <input name="answers[2][answer]" value="{{ old('answers.2.answer') }}" type="text" class="mt-1 block w-full text-xs  bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                    </span>
                </label>
                <label class="flex items-center">
                    @error('answers.0.answer')
                    <span class="text-red-700 text-xs content-end float-right">{{$message}}</span>
                    @enderror
                    <!-- <input type="hidden" value="0" name="answers[3][is_checked]">
                    <input type="checkbox" value="1" name="answers[3][is_checked]"> -->
                    <select name="answers[3][is_checked]" id="">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <span class="min-w-full mx-auto px-5">
                        <input name="answers[3][answer]" value="{{ old('answers.3.answer') }}" type="text" class="mt-1 block w-full text-xs  bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" />
                    </span>
                </label>
            </div>
          </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Save</button>
        </form>
    </div>
</div>




@endsection