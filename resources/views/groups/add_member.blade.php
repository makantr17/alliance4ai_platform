@extends('layouts.app')

@section('content')


<div class="py-5 text-center">
      <h2>Iviting to Join Group</h2>
      <p>Updating these information will be changed when saved</p>
    </div>

    <div class="row g-5 py-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Timeline</h6>
              <small class="text-muted">start_at -end_at</small>
            </div>
            <span class="text-muted">1week</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Remplir les info</h6>
              <small class="text-muted">Corectement remplir les info</small>
            </div>
            <span class="text-muted">100</span>
          </li>
          
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate action="{{ route('group.addmember',  $group->name) }}" method="post">
          <div class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="description" class="form-label">Invitation will be sent by {{ auth()->user()->name }}</label>
                <input type="text" name="description" id="description" placeholder="description" hidden readely 
                class="form-control py-2  rounded-lg @error('description') border border-danger @enderror" value="{{ auth()->user()->name }}">

                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="user_id" class="form-label">Select user by mail</label>
                    <select name="user_id" id="user_id"
                        class="form-control py-2  rounded-lg @error('user_id') border border-danger @enderror" value="{{ old('user_id')}}">
                        <option value="">Choose email</option>
                        @if ($allusers -> count())
                            @foreach($allusers as $induser)
                                <option value="{{ $induser-> id}}">{{ $induser-> email}}</option>
                            @endforeach
                        @else
                            <option value="none">does not have any posts</option>
                        @endif
                    </select>

                @error('user_id')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-sm-6 ">
            @if ($allusers -> count())
                @foreach($allusers as $induser)
                    <div class="col-sm-12 ">
                        <div class="form-check">
                            <input type="checkbox" name="email" id="{{ $induser-> id}}" class="form-check-input">
                            <label for="remember">{{ $induser-> email}}</label>
                        </div>
                    </div>
                @endforeach
            @else
                <option value="none">does not have any posts</option>
            @endif
            </div>
            


            
          </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Sauvegarde</button>
        </form>
    </div>
</div>












    
@endsection