@extends('layouts.app')

@section('content')


<div class="pt-5 text-center">
    <h2>New Discussion</h2>
    <p>create a discussion and share with circles and peoples</p>
</div>
<div class="container ">
    <div class="row g-5 py-2  d-flex justify-content-center align-items-center">
      
      <div class="col-md-8 col-lg-8 bg-light shadow-sm p-5">
        <form class="needs-validation" novalidate action="{{ route('users.creatediscussion',  auth()->user()->name) }}" method="post">
          <div class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" placeholder="title" 
                class="form-control py-2  rounded-lg @error('title') border border-danger @enderror" value="">

                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="topics" class="form-label">Chose Topics</label>
                <textarea type="text" name="topics" id="topics" placeholder="topics" cols="20" rows="3"
                class="form-control py-2 text-info  rounded-lg @error('topics') border border-danger @enderror" value=""></textarea>

                @error('topics')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="topicList col-md-12 d-flex border p-2 bg-white fw-light text-secondary">
                @if ($listoftopics -> count())
                    @foreach($listoftopics as $topics)
                        <label class="p-1 m-1 border bg-light rounded"><input type="checkbox" value="{{$topics->topic}}"> {{$topics->topic}}</label><br>
                    @endforeach
                @else
                    <option value="">no user</option>
                @endif 
            </div>



            <div class="col-md-6">
                <label for="date" class="form-label">Date meeting</label>
                <input type="date" name="date" id="date" placeholder="date" 
                class="form-control py-2  rounded-lg @error('date') border border-danger @enderror" value="">

                @error('date')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="start_time" class="form-label">Start_time</label>
                <input type="time" name="start_time" id="start_time" placeholder="start_time" 
                class="form-control py-2  rounded-lg @error('start_time') border border-danger @enderror" value="">

                @error('start_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="end_time" class="form-label">End_time</label>
                <input type="time" name="end_time" id="end_time" placeholder="end_time" 
                class="form-control py-2  rounded-lg @error('end_time') border border-danger @enderror" value="">

                @error('end_time')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                    <select name="category" id="category"
                        class="form-control py-2  rounded-lg @error('category') border border-danger @enderror" value="{{ old('category')}}">
                        <option value="">Choose Category</option>
                        <option value="1">Futur Tech</option>
                        <option value="2">History & Ethics</option>
                        <option value="3">Workplace Skills</option>
                    </select>
                @error('category')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="location" class="form-label">Location</label>
                    <select name="location" id="location"
                        class="form-control py-2  rounded-lg @error('location') border border-danger @enderror" value="{{ old('location')}}">
                        <option value="">Choose Location</option>
                        <option value="Guinea">Guinea</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Rwanda">Rwanda</option>
                    </select>
                @error('location')
                  <div class="text-danger">
                      {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" placeholder="description" 
                class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" value="">

                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="link" class="form-label">Add links</label>
                <input type="text" name="link" id="link" placeholder="link" 
                class="form-control py-2  rounded-lg @error('link') border border-danger @enderror" value="">

                @error('link')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="admin_1" class="form-label">Admin_1</label>
                    <select name="admin_1" id="admin_1"
                        class="form-control py-2  rounded-lg @error('admin_1') border border-danger @enderror" value="{{ old('admin_1')}}">
                        <option value="">Choose Admin_1</option>
                        @if ($listofusers -> count())
                            @foreach($listofusers as $userof)
                                <option value="{{ $userof->email}}"> {{$userof->name}}</option>
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
                        class="form-control py-2  rounded-lg @error('admin_2') border border-danger @enderror" value="{{ old('admin_2')}}">
                        <option value="">Choose Admin_2</option>
                        @if ($listofusers -> count())
                            @foreach($listofusers as $userof)
                                <option value="{{$userof->email}}"> {{$userof->name}}</option>
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


            <div class="col-md-12">
                <label for="peoples" class="form-label">Invite Peoples</label>
                <textarea type="text" name="peoples" id="peoples" placeholder="peoples" cols="20" rows="3"
                class="form-control py-2 text-info  rounded-lg @error('peoples') border border-danger @enderror" value=""></textarea>

                @error('peoples')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="listofpeople col-md-12 d-flex border p-2 bg-white fw-light text-secondary">
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
                <textarea type="text" name="groups" id="groups" placeholder="groups" cols="20" rows="3"
                class="form-control py-2  rounded-lg @error('groups') border border-danger @enderror" value=""></textarea>

                @error('groups')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="groupList col-md-12 d-flex border p-2 bg-white fw-light text-secondary">
                @if ($listofgroups -> count())
                    @foreach($listofgroups as $groupof)
                        <label class="p-1 m-1 border bg-light rounded d-flex align-items-center"><input type="checkbox" value="{{$groupof->id}}"> {{$groupof->name}}</label><br>
                    @endforeach
                @else
                    <option value="">no user</option>
                @endif
            </div>

          </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Sauvegarde</button>
        </form>






        <!-- <input type="text" value="" class="textfield col-8" id="video0_tags" name="video0_tags">
        <div class="taglist">
          <label><input type="checkbox" value="2D Animation">2D Animation</label>
          <label><input type="checkbox" value="3D Animation">3D Animation</label>
          <label><input type="checkbox" value="Animatronics">Animatronics</label>
          <label><input type="checkbox" value="Architectural">Architectural</label>
          <label><input type="checkbox" value="Cartoon">Cartoon</label>
          <label><input type="checkbox" value="Cell Animation">Cell Animation</label>
          <label><input type="checkbox" value="Character Animation">Character Animation</label><label><input type="checkbox" value="Cut & Paste">Cut & Paste</label>
          <label><input type="checkbox" value="Doodle">Doodle</label>
          <label><input type="checkbox" value="HDR">HDR</label>
          <label><input type="checkbox" value="High Speed">High Speed</label>
          <label><input type="checkbox" value="Illustration">Illustration</label>
          <label><input type="checkbox" value="Live Action">Live Action</label>
          <label><input type="checkbox" value="Macro">Macro</label>
          <label><input type="checkbox" value="Motion Design">Motion Design</label>
          <label><input type="checkbox" value="Motion Graphics">Motion Graphics</label>
          <label><input type="checkbox" value="Moving Installation">Moving Installation</label>
        </div> -->

    </div>
</div>



@endsection