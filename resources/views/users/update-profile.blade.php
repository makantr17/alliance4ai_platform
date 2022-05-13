@extends('layouts.app')

@section('content')
<div class="py-5 text-center">
      <h2>Update your information</h2>
      <p>The modification to your platform will be uploaded, fill all info</p>
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
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Athentification</h6>
              <small class="text-muted">Informations correctes</small>
            </div>
            <span class="text-muted">100</span>
          </li>
          
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate action="{{ route('user.update-profile',  auth()->user()->name) }}" method="post">
          <div class="row g-3">
            @csrf

            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" placeholder="Your name" 
                class="form-control py-2  rounded-lg @error('name') border border-danger @enderror" value="{{ $user->name}}">
                
                @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" placeholder="address" 
                class="form-control py-2  rounded-lg @error('address') border border-danger @enderror" value="{{ $user->address}}">

                @error('address')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="profession" class="form-label">Profession</label>
                <select class="form-select" type="text" name="profession" id="profession" 
                class="form-control py-2  rounded-lg @error('profession') border border-danger @enderror" value="{{ $user->profession}}">
                    <option value="Tech">Tech</option>
                    <option value="Consulting">Consulting</option>
                    <option value="Finance">Finance</option>
                    <option value="Healthcare">Healthcare</option>
                    <option value="Law">Law</option>
                    <option value="Retail">Retail</option>
                    <option value="Government">Government</option>
                    <option value="Art">Art</option>
                    <option value="Writing">Writing</option>
                    <option value="Sports">Sports</option>
                    <option value="above 40">Fashion</option>
                    <option value="above 40">Military</option>
                    <option value="above 40">Other</option>
                </select>

                @error('profession')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="age" class="form-label">Age group</label>
                <select class="form-select" name="age" id="age"
                class="form-control py-2  rounded-lg @error('age') border border-danger @enderror" value="{{ $user->age}}">
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
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" name="gender" id="gender"
                class="form-control py-2  rounded-lg @error('gender') border border-danger @enderror" value="{{ $user->gender}}">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>

                @error('gender')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" type="text" name="country" id="country"
                class="form-control py-2  rounded-lg @error('country') border border-danger @enderror" value="{{ $user->country}}">
                    <option value="Africa">Africa</option>
                    <option value="North America">North America</option>
                    <option value="South America">South America</option>
                    <option value="Asia">Asia</option>
                    <option value="Europe">Europe</option>
                    <option value="Middle East">Middle East</option>
                    <option value="Australia">Australia</option>
                </select>

                @error('country')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="phone" 
                class="form-control py-2  rounded-lg @error('phone') border border-danger @enderror" value="{{ $user->phone}}">

                @error('phone')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" placeholder="city" 
                class="form-control py-2  rounded-lg @error('city') border border-danger @enderror" value="{{ $user->city}}">

                @error('city')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="col-md-12">
                <label for="email" class="form-label">Your email</label>
                <input type="text" name="email" id="email" placeholder="Your email" 
                class="form-control py-2  rounded-lg @error('email') border border-danger @enderror" value="{{ $user->email}}">

                @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          </div>
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Sauvegarde</button>
        </form>
    </div>
</div>




@endsection