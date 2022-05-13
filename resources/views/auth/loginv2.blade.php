@extends('layouts.app')

@section('content')
<div class="flex-column full-height bg-light">
    <div class="header-style">
        <h1 class="display-4 lh-lg">Login to Account</h1>
    </div>
    <div class="flex justify-center p-2">
        <div class="container">
            <!-- if invalid login status -->
            @if (session('status'))
                <div class="bg-red-500 p-2 rounded-lg mb-6 text-danger text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form class="row g-3 needs-validation d-flex flex-column align-items-center justify-content-center" novalidate action="{{ route('login')}}" method="post">
                @csrf
                <div class="col-sm-4">
                    <label for="email" class="form-label">Your email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" 
                    class="form-control px-3 py-3  rounded-lg @error('email') border border-danger @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"  placeholder="Password" 
                    class="form-control px-3 py-3  rounded-lg @error('password') border border-danger @enderror" value="">

                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-sm-4 ">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <div class="col-sm-4 ">
                    <label for="remember">
                        <a href="{{ route('password.request')}}"> Forgot Password ?</a><br>
                        <span>Not registered! 
                            <a href="{{ route('register') }}" >Create new Account here!</a>
                        </span>
                        
                    </label>
                </div>
                
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection