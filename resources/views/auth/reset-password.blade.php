@extends('layouts.app')

@section('content')
<div class="flex-column full-height bg-light">
    <div class="header-style">
        <h1 class="display-4 lh-lg">Reset Password</h1>
    </div>
    <div class="flex justify-center">
        <div class="container">
            <!-- if invalid login status -->
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-dark text-center">
                    {{ session('status') }}
                </div>
            @endif


            <form class="row g-3 needs-validation d-flex flex-column align-items-center justify-content-center" novalidate action="{{ route('password.update')}}" method="post">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

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
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" name="password" id="password"  placeholder="Password" 
                    class="form-control px-3 py-3  rounded-lg @error('password') border border-danger @enderror" value="">

                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" 
                    class="form-control py-2  rounded-lg "  value="">

                </div>
                
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection