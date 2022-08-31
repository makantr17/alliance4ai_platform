@extends('layouts.app')

@section('content')


<div class="pt-5 text-center">
    <h2>New Discussion</h2>
    <p class="fw-light">The discussion will be shared with circles and peoples invited in</p>
</div>
<div class="container ">
    <div class="row g-5 py-2  d-flex justify-content-center align-items-center">
      
      <div class="col-md-8 col-lg-8 bg-light shadow-sm p-5">
        <form class="needs-validation" novalidate action="{{ route('users.creatediscussion',  auth()->user()) }}" method="post">
          <div class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="title" class="form-label"><strong class="text-danger">* </strong> Meeting Title</label>
                <input type="text" name="title" id="title" placeholder="title" 
                class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="{{ old('title')}}">

                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12">
                <p class="">Add topics</p>
                <textarea type="text" style="display:none" name="topics" id="topics" placeholder="added topics" cols="15" rows="2"
                class="form-control py-2 text-info  rounded-lg @error('topics') border border-danger @enderror" value="{{ old('topics')}}">{{ old('topics')}}</textarea>
                @error('topics')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="ml-3 topicList container-fluid d-flex flex-wrap border p-2 bg-white fw-light text-secondary">
                @if ($listoftopics -> count())
                    @foreach($listoftopics as $topics)
                        <label class="p-1 m-1 border bg-light rounded"><input type="checkbox" value="{{$topics->id}}"> {{$topics->topic}}</label><br>
                    @endforeach
                @else
                    <option value="">no topics</option>
                @endif 
            </div>
            
            
            <div class="col-md-6">
                <label for="date" class="form-label"><strong class="text-danger">* </strong> Meeting Date</label>
                <input type="date" name="date" id="date" placeholder="date" 
                class="form-control py-2  rounded-lg @error('date') border border-danger @enderror" value="{{ old('date')}}">
                @error('date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="start_time" class="form-label"> <strong class="text-danger">* </strong> Start_time</label>
                <input type="time" name="start_time" id="start_time" placeholder="start_time" 
                class="form-control py-2  rounded-lg @error('start_time') border border-danger @enderror" value="{{ old('start_time')}}">

                @error('start_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="end_time" class="form-label"><strong class="text-danger">* </strong> End_time</label>
                <input type="time" name="end_time" id="end_time" placeholder="end_time" 
                class="form-control py-2  rounded-lg @error('end_time') border border-danger @enderror" value="{{ old('end_time')}}">

                @error('end_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="category" class="form-label"><strong class="text-danger">* </strong> Category</label>
                    <select name="category" id="category"
                        class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                        <option value="" >Choose Category</option>
                        <option value="1" {{ old('category') == "1" ? 'selected' : '' }}>Futur Tech</option>
                        <option value="2" {{ old('category') == "2" ? 'selected' : '' }}>History & Ethics</option>
                        <option value="3" {{ old('category') == "3" ? 'selected' : '' }}>Workplace Skills</option>
                    </select>
                @error('category')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="location" class="form-label"><strong class="text-danger">* </strong> Country</label>
                    <select name="location" id="location"
                        class="form-control py-2  rounded-lg @error('location') border border-danger @enderror" value="{{ old('location')}}">
                        <option value="">Choose country</option>
                        <x-country  />
                    </select>
                    
                @error('location')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>

            
            <div class="col-md-12">
                <label for="link" class="form-label"><strong class="text-danger">* </strong> Physical or Virtual meeting link</label>
                <input type="text" name="link" id="link" placeholder="address" 
                class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="{{ old('link')}}">

                @error('link')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="admin_1" class="form-label"><strong class="text-danger">* </strong> Admin_1</label>
                    <select name="admin_1" id="admin_1"
                        class="form-control py-2  rounded-lg @error('admin_1') border border-danger @enderror" value="{{ old('admin_1')}}">
                        <option value="">Choose Admin</option>
                        @if ($listofusers -> count())
                            @foreach($listofusers as $userof)
                                <option value="{{ $userof->email}}" {{ old('admin_1') == $userof->email ? 'selected' : '' }} > {{$userof->name}}</option>
                            @endforeach
                        @else
                            <option value="">no user</option>
                        @endif
                    </select>
                @error('admin_1')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="admin_2" class="form-label">Admin_2</label>
                    <select name="admin_2" id="admin_2"
                        class="form-control py-2  rounded-lg @error('admin_2') border border-danger @enderror" data-value="{{ old('admin_2')}}">
                        <option value="">Choose Admin</option>
                        @if ($listofusers -> count())
                            @foreach($listofusers as $userof)
                                <option value="{{ $userof->email}}" {{ old('admin_2') == $userof->email ? 'selected' : '' }} > {{$userof->name}}</option>
                            @endforeach
                        @else
                            <option value="">no user</option>
                        @endif
                    </select>
                @error('admin_2')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="admin_2" class="form-label">Admin_3</label>
                    <select name="admin_3" id="admin_3"
                        class="form-control py-2  rounded-lg @error('admin_3') border border-danger @enderror" value="{{ old('admin_3')}}">
                        <option value="">Choose Admin</option>
                        @if ($listofusers -> count())
                            @foreach($listofusers as $userof)
                                <option value="{{ $userof->email}}" {{ old('admin_3') == $userof->email ? 'selected' : '' }} > {{$userof->name}}</option>
                            @endforeach
                        @else
                            <option value="">no user</option>
                        @endif
                    </select>
                @error('admin_3')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="peoples" class="form-label">Invite Peoples</label>
                <textarea type="text" style="display:none" name="peoples" id="peoples" placeholder="peoples" cols="20" rows="3"
                class="form-control py-2 text-info  rounded-lg @error('peoples') border border-danger @enderror" value="{{ old('peoples')}}">{{ old('peoples')}}</textarea>
                @error('peoples')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="ml-3 listofpeople container-fluid d-flex flex-wrap border p-2 bg-white fw-light text-secondary">
                @if ($listofusers -> count())
                    @foreach($listofusers as $userof)
                        <label class="p-1 m-1 border bg-light rounded"><input type="checkbox" value="{{$userof->email}}"> {{$userof->name}}</label><br>
                    @endforeach
                @else
                    <option value="">no user</option>
                @endif 
            </div>


            <div class="col-md-12">
                <label for="groups" class="form-label">Add Groups</label>
                <textarea type="text" style="display:none" name="groups" id="groups" placeholder="groups" cols="20" rows="3"
                class="form-control py-2  rounded-lg @error('groups') border border-danger @enderror" value="{{ old('groups')}}"> {{ old('groups')}}</textarea>
                @error('groups')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="ml-3 groupList container-fluid d-flex flex-wrap border p-2 bg-white fw-light text-secondary">
                @if ($listofgroups -> count())
                    @foreach($listofgroups as $groupof)
                        <label class="p-1 m-1 border bg-light rounded d-flex align-items-center"><input type="checkbox" value="{{$groupof->id}}"> {{$groupof->name}}</label><br>
                    @endforeach
                @else
                    <option value="">no user</option>
                @endif
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" id="description" placeholder="description" cols="20" rows="3"
                class="form-control py-2 text-info  rounded-lg @error('description') border border-danger @enderror" value="{{ old('description')}}">{{ old('description')}}</textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                
            </div>

          </div>
          <hr class="my-4">

          <div class="d-flex">
            <button class="w-100 btn btn-primary btn-lg mr-1" type="submit">Register</button>
            <a href="{{ route('discussion') }}" class="w-100 btn btn-danger btn-lg mr-1">Cancel</a>
          </div>
          
        </form>



    </div>
</div>



@endsection