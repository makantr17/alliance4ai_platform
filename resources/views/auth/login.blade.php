@extends('layouts.app')

@section('content')


<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Sign in</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <!-- if invalid login status -->
        @if (session('status'))
            <div class="bg-red-500 p-2 rounded-lg mb-6 text-danger text-center">
                {{ session('status') }}
            </div>
        @endif
        <form class="" novalidate action="{{ route('login')}}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="email" name="email" id="floatingInput" placeholder="Your email" 
                class="form-control rounded-4 @error('email') border border-danger @enderror" value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>
                @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" id="floatingPassword"  placeholder="Password" 
                    class="form-control rounded-4 @error('password') border border-danger @enderror" value="">
                <label for="floatingPassword">Password</label>
                @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Sign in</button>
          
            <small class="text-muted"></small>
        </form>
        <a href="{{ route('password.request')}}">Forgot password click here</a>
        <hr class="my-4">
        <h2 class="fs-5 fw-bold mb-3">Create new account</h2>
        <a class="col-md-12" href="{{ route('register')}}">
            <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-4" type="submit">
                <svg class="bi me-1" width="16" height="16"><use xlink:href="#google"/></svg>
                Sign up 
            </button>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection