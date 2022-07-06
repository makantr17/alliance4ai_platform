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
                <div class="col-sm-3 border rounded">
                    <!-- Start Course ################ -->
                    <h4 class="h4 fw-bold py-2 text--center">Courses</h4>
                    @if ($courses -> count())
                        @foreach($courses as $course)
                        <div class="border bg-light d-flex row justify-content-between m-1">
                            <p class="fw-bold pb-1" style="font-size:16px">{{ $course-> name}}</p>
                            <sm class="card-text pb-1" style="font-size:12px">{{ Str :: limit($course-> description, 45) }}</small>
                            <small class="text-primary">by {{ $course-> user->name}}</small>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-info">{{ $course-> created_at->diffForHumans() }}</small>
                                
                                <div class="btn-topic">
                                    <form novalidate action="{{ route('users.course.manage', [$course->user, $course->id]) }}">
                                        <button class="btn btn-muted btn-sm text-info" type="submit">Details</button>
                                    </form>
                                </div>

                                <div class="btn-topic">
                                    <form novalidate action="{{ route('setting.saveCourse', [$course->user, $course->id]) }}" method="post">
                                    <div class="form-check form-switch">
                                        <input name="checker" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                                    </div>
                                    @csrf    
                                    <button class="btn btn-muted btn-sm text-info border" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <small class="col-sm-12 text--center">no courses</small>
                    @endif
                    <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
                        {{ $discussions -> links()}}
                    </div>
                </div>
                <!-- End Course #################### -->
                <!-- Start Discussion ###############""" -->
                <div class="col-sm-3 border rounded">
                    <h4 class="h4 fw-bold py-2 text--center">Discussions</h4>
                    @if ($discussions -> count())
                        @foreach($discussions as $discussion)
                        <div class="border bg-light d-flex row justify-content-between m-1">
                            <p class="fw-bold pb-1" style="font-size:16px">{{ $discussion-> title}}</p>
                            <sm class="card-text pb-1" style="font-size:12px">{{ Str :: limit($discussion-> description, 45) }}</small>
                            <small class="text-primary">by {{ $discussion-> user->name}}</small>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-info">{{ $discussion-> created_at->diffForHumans() }}</small>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                                </div>
                                <div class="btn-topic">
                                    <form novalidate action="{{ route('users.discussion.manage', [$discussion->user, $discussion->id]) }}">
                                        <button class="btn btn-muted btn-sm text-info" type="submit">Details</button>
                                    </form>
                                </div>
                                <div class="btn-topic">
                                    <form novalidate action="{{ route('setting.saveDiscussion', [$discussion->user, $discussion->id]) }}" method="post">
                                    @csrf    
                                    <button class="btn btn-muted btn-sm text-info border" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <small class="col-sm-12 text--center">no discussion</small>
                    @endif
                    <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
                        {{ $discussions -> links()}}
                    </div>
                </div>
                <!-- End Discussion ###########"" -->
                <!-- TOPIC ###################"""" -->
                <div class="col-sm-3 border rounded gray-bg">
                    <h4 class="h4 fw-bold py-2 text--center">Topics</h4>
                    @if ($topics -> count())
                        @foreach($topics as $topic)
                        <div class="border bg-light d-flex row justify-content-between m-1">
                            <p class="fw-bold pb-1" style="font-size:16px">{{ $topic-> topic}}</p>
                            <small class="card-text pb-1" style="font-size:12px">{{ Str :: limit($topic-> description, 45) }}</small>
                            <small class="text-primary">by {{ $topic-> user->name}}</small>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-info">{{ $topic-> created_at->diffForHumans() }}</small>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                                </div>
                                <div class="btn-topic">
                                    <form novalidate action="{{ route('users.topics.manage', [$topic-> user->name, $topic->id]) }}">
                                        <button class="btn btn-muted btn-sm text-info" type="submit">Details</button>
                                    </form>
                                </div>
                                <div class="btn-topic">
                                    <form novalidate action="{{ route('setting.saveTopic', [$topic-> user->name, $topic->id]) }}" method="post">
                                    @csrf    
                                    <button class="btn btn-muted btn-sm text-info border" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <small class="col-sm-12 text--center">no topics</small>
                    @endif
                    <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
                        {{ $topics -> links()}}
                    </div>
                </div>
                <!-- END TOPIC ##################"""" -->
                <!-- Start Hackerthon ################## -->
                <div class="col-sm-3 border rounded">
                    <h4 class="h4 fw-bold py-2 text--center">hackathon</h4>
                    @if ($hackerthons -> count())
                        @foreach($hackerthons as $hackerthon)
                        <div class="border bg-light d-flex row justify-content-between m-1">
                            <p class="fw-bold pb-1" style="font-size:16px">{{ $hackerthon-> title}}</p>
                            <small class="card-text pb-1" style="font-size:12px">{{ Str :: limit($hackerthon-> subtitle1, 45) }}</small>
                            <small class="text-primary">by {{ $hackerthon-> user->name}}</small>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-info">{{ $hackerthon-> created_at->diffForHumans() }}</small>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                                </div>
                                <div class="btn-topic">
                                    <form novalidate action="{{ route('users.hackerthon.manage', [$hackerthon->user, $hackerthon->id]) }}">
                                        <button class="btn btn-muted btn-sm text-info" type="submit">Details</button>
                                    </form>
                                </div>
                                <div class="btn-topic">
                                    <form novalidate action="{{ route('setting.saveHackathon', [$hackerthon->user, $hackerthon->id]) }}" method="post">
                                    @csrf    
                                    <button class="btn btn-muted btn-sm text-info border" type="submit">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <small class="col-sm-12 text--center">no hackerthon</small>
                    @endif
                    <div class="col-lg-12 d-flex mt-5 flex-wrap justify-content-center">
                        {{ $hackerthons -> links()}}
                    </div>
                </div>
                <!-- End Setting Board #####################" -->
                <!-- Start Setting Board ######### -->
                <div class="col-sm-3 border gray-bg">
                    <h4 class="h4 fw-bold py-2 text--center">Setting Board</h4>
                    <div class="">
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
                        <p class="fw-normal my-2 text-info">Admin Access</p>
                        <div class="">
                            @if ($admin -> count())
                                @foreach($admin as $admin_user)
                                    <nav><strong>access_admin: </strong>{{$admin_user->access_role[0]-> is_admin ? 'true' : 'false' }}</nav>
                                    <nav><strong>grant_user_topic: </strong>{{$admin_user->access_role[0]-> grant_user_topic ? 'true' : 'false'}}</nav>
                                    <nav><strong>grant_user_discussion: </strong>{{$admin_user->access_role[0]-> grant_user_discussion ? 'true' : 'false'}}</nav>
                                    <nav><strong>grant_user_circles: </strong>{{$admin_user->access_role[0]-> grant_user_circles ? 'true' : 'false'}}</nav>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End admin Access controle -->
                <!-- Start Admin Controle ################"" -->
                <div class="col-sm-5 row bg-gray border">
                    <div class="col-sm-12">
                        <h4 class=" fw-bold py-2 text--center">Information</h4>
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
                <!-- End admin Controle -->
                
            </div>
        </div>
    </div>
@endsection