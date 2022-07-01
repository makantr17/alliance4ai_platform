@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-light py-5">
        <div class="row">
            <div class="col-sm-12">
                @auth
                    <x-menu />
                @endauth
            </div>
            <div class="col-sm-12 row">
                
                <div class="col-sm-3">
                    <h4 class="h4 fw-bold py-2 text--center">Setting Board</h4>
                    <div class="">
                        <p class="fw-light">Find user by email and grant or remove admin access</p>
                        <form class="" novalidate action="{{ route('setting.grant-admin', auth()->user()->name)}}" method="get">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="search by email" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                            </div>
                            <!-- if invalid login status -->
                            @if (session('status'))
                                <div class="bg-red-500 p-2 rounded-lg mb-6 fw-lighter">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </form>
                    </div>
                    <!-- User Access -->
                    <div class="">
                        <h5 class="fw-normal my-2 text-info">Admin Access</h5>
                        <div class="">
                            @if ($admin -> count())
                                @foreach($admin as $admin_user)
                                    <nav><strong>access_admin: </strong>{{$admin_user->access_role[0]-> is_admin ? 'true' : 'false' }}</nav>
                                    <nav><strong>access_admin: </strong>{{$admin_user->access_role[0]-> grant_user_topic ? 'true' : 'false'}}</nav>
                                    <nav><strong>access_admin: </strong>{{$admin_user->access_role[0]-> grant_user_discussion ? 'true' : 'false'}}</nav>
                                    <nav><strong>access_admin: </strong>{{$admin_user->access_role[0]-> grant_user_circles ? 'true' : 'false'}}</nav>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 row">
                    <div class="col-sm-12">
                        <h4 class=" fw-lighter py-2 text--center border-bottom">Information</h4>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-bordered style-comments">
                            <thead>
                                <tr>
                                    <th id="0">username</th>
                                    <th id="1">email</th>
                                    <th id="3">admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users -> count())
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user-> name}}</td>
                                            <td>{{$user-> email}}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>No suggestions any posts</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection