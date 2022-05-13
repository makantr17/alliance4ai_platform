@extends('layouts.app')

@section('content')
<div class="flex-column full-height">
    <div class="header-style">
        <h1 class="display-4 lh-lg">Forgot Password</h1>
    </div>
    <div class="flex justify-center p-3">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <!-- if invalid login status -->
            @if (session('error'))
                <div class="text-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="text-danger">
                    {{ session('success') }}
                </div>
            @endif

            <form class="row g-3 needs-validation d-flex flex-column align-items-center justify-content-center" novalidate action="{{ route('password.email')}}" method="post">
                @csrf
                <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" 
                    class="form-control rounded-lg @error('email') border border-danger @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Send Password Link</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection