@extends('layouts.app')

@section('content')
    <div class="flex-column  bg-light">
        <div class="header-style">
            <h1 class="display-4 lh-lg">Register Account</h1>
        </div>
        <div class="flex justify-center">
            <div class="container">
                <form class="row g-3 my-3 needs-validation d-flex flex-row align-items-center justify-content-center"
                 novalidate action="{{ route('register')}}" method="post">
                    @csrf
                    <div class="col-md-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Your name" 
                        class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="{{ old('name') }}">
                        
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label">phone</label>
                        <input type="text" name="phone" id="phone" placeholder="phone" 
                        class="form-control py-2  rounded-lg @error('phone') border border-danger @enderror" value="{{ old('phone') }}">

                        @error('phone')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender"
                        class="form-control py-2  rounded-lg @error('gender') border border-danger @enderror" value="{{ old('gender') }}">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>

                        @error('gender')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="age" class="form-label">Age group</label>
                        <select name="age" id="age"
                        class="form-control py-2  rounded-lg @error('age') border border-danger @enderror" value="{{ old('age') }}">
                            <option value="15-25">15-25</option>
                            <option value="26-35">26-35</option>
                            <option value="36-45">36-45</option>
                            <option value="45+">45+</option>
                        </select>

                        @error('age')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label for="country" class="form-label">country</label>
                        <select type="text" name="country" id="country"
                        class="form-control py-2  rounded-lg @error('country') border border-danger @enderror" value="{{ old('country') }}">
                            <x-country />
                        </select>
                        @error('country')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="address" class="form-label">address</label>
                        <input type="text" name="address" id="address" placeholder="address" 
                        class="form-control py-2  rounded-lg @error('address') border border-danger @enderror" value="{{ old('address') }}">

                        @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" id="city" placeholder="city" 
                        class="form-control py-2  rounded-lg @error('city') border border-danger @enderror" value="{{ old('city') }}">

                        @error('city')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="profession" class="form-label">profession</label>
                        <select type="text" name="profession" id="profession" 
                        class="form-control py-2  rounded-lg @error('profession') border border-danger @enderror" value="{{ old('profession') }}">
                            <option value="Tech">Student</option>
                            <option value="Consulting">Consultant</option>
                            <option value="Finance">Data Analist</option>
                            <option value="Healthcare">Doctor</option>
                            <option value="Law">Lawyer</option>
                            <option value="Retail">Retailer</option>
                            <option value="Art">Artist</option>
                            <option value="Writing">Author</option>
                            <option value="above 40">Other</option>
                        </select>

                        @error('profession')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label for="email" class="form-label">Your email</label>
                        <input type="text" name="email" id="email" placeholder="Your email" 
                        class="form-control py-2  rounded-lg @error('email') border border-danger @enderror" value="{{ old('email') }}">

                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" 
                        class="form-control py-2  rounded-lg @error('password') border border-danger @enderror" value="">

                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" 
                        class="form-control py-2  rounded-lg @error('password_confirmation') border border-danger @enderror"  value="">

                        @error('password_confirmation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>
                    <div class="col-md-12 p-3 mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
