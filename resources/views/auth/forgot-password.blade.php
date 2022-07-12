@extends('layouts.app')

@section('content')
<div class="flex-column full-height">
    <div class="mb-2">
        <div class="bg-white text-secondary mb-2 text-center rounded">
            <div class="overflow-hidden" style="max-height: 25vh;">
                <div class="">
                    <img src="\images\-min-31.jpg" class="opacity-60 img-fluid rounded-3 shadow-lg mb-4 rounded" alt="Example image" width="100%" height="500" loading="lazy">
                </div>
            </div>
        </div>
    </div>
    <div class="header-style">
        <h3 class="display-6 fw-bold" style="color:#D16A04" >Forgot Password</h3>
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
                    <label for="email" class="form-label">YOUR EMAIL ADDRESS</label>
                    <nav class="fw-light mb-4 mt-2">your email address will be send to you</nav>
                    <input type="email" name="email" id="email" placeholder="Enter your email" 
                    class="my-2 form-control rounded-lg @error('email') border border-danger @enderror" value="{{ old('email') }}">

                    @error('email')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                
                <div class="col-md-4">
                    <button type="submit" class="btn btn-md btn-primary">Send Password Link</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection