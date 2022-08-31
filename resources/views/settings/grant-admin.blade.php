@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light py-5">
        <div class="row">
            <div class="col-sm-12">
                @auth
                    <x-menu />
                @endauth
            </div>
            <div class="col-sm-12">
                <div class="container d-flex flex-row-reverse">
                    <a href="{{ route('setting', auth()->user())}}">
                        <button class="btn btn-secondary">Go back</button>
                    </a>
                </div>
                <div class="text--center">
                    <h1 class="h1 fw-lighter py-2 text--center">Access Admin</h1>
                    <h4 class="h4 fw-lighter py-2">Grant or Remove Admin Access to user</h4>
                </div>
                <div class="row d-flex justify-content-center">
                    
                    <div class="col-sm-4">
                        <div>
                            @if ($userFound ->count())
                                @foreach($userFound as $user)
                                <ul class="style-ul">
                                    <li>
                                        @if ($user->image)
                                            <img class=" img-circle" style="border-radius: 100px; margin:1rem" width="100" height="100" 
                                            src="{{'/storage/images/'.$user->id.'/'.$user->image}}" alt="Woman">
                                        @else
                                            <img class=" img-circle" style="border-radius: 100px; margin:1rem" width="100" height="100" 
                                            src="/images/icon-alliance/man.png" alt="default">
                                        @endif
                                    </li>
                                    <li><strong>@name</strong> {{$user-> name}}</li>
                                    <form novalidate action="{{ route('setting', auth()->user())}}" method="post">
                                        @csrf
                                        <li><strong>@email:</strong> <input type="email" name="email"  id="email" placeholder="{{$user-> email}}" 
                                                class="email-style"  value="{{$user-> email}}"></li>
                                        <div class="d-flex justify-content-between">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Status Admin</label>
                                            <div class="form-check form-switch">
                                                <input  class="form-check-input" name="isAdmin" type="checkbox" id="flexSwitchCheckChecked" {{ $user-> isAdmin ? 'checked' : ''}}>
                                            </div>
                                        </div>

                                        <!-- Admin Roles -->
                                        <div >
                                            @if ($user->access_role -> count() && $admin[0]->access_role[0]-> is_root )
                                                
                                                    <strong>Grant access</strong>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">access_admin</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="access_admin" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> is_admin ? 'checked' : ''}}></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">grant_user_topic</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="grant_user_topic" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> grant_user_topic ? 'checked' : ''}}></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">grant_user_discussion</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="grant_user_discussion" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> grant_user_discussion ? 'checked' : ''}}></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">grant_user_circles</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="grant_user_circles" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> grant_user_circles ? 'checked' : ''}}></div>
                                                    </div>

                                                    <strong>Delete access</strong>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">delete_user_topic</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="delete_user_topic" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> delete_user_topic ? 'checked' : ''}}></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">delete_user_discussion</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="delete_user_discussion" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> delete_user_discussion ? 'checked' : ''}}></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">delete_user_circles</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="delete_user_circles" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> delete_user_circles ? 'checked' : ''}}></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">delete_hackerthon</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="delete_hackerthon" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> delete_hackerthon ? 'checked' : ''}}></div>
                                                    </div>
                                                    <strong>Give root access</strong>
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">root access</label>
                                                        <div class="form-check form-switch"><input  class="form-check-input" name="is_root" type="checkbox" id="flexSwitchCheckChecked" {{ $user->access_role[0]-> is_root ? 'checked' : ''}}></div>
                                                    </div>

                                                    
                                            @endif
                                        </div>
                                        <!-- End Admin roles -->
                                        <div >
                                            <button type="submit" class="btn btn-primary">Save change</button>
                                        </div>
                                    </form>
                                </ul>
                                @endforeach
                            @else
                                <p class="text--center text-danger">User email not correct or doesnot exist</p>
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection