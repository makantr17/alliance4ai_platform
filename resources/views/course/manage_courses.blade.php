@extends('layouts.app')

@section('content')
<div class="container py-4">
    @if ($course -> count())
        @foreach($course as $courses)
        <div class="p-3 mb-4 bg-light rounded-3">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                <img class="mx-3 my-3"  width="80" height="80" src="/icons/enterprise.png" alt="enterprise">
                <h3 class="display-6 fw-bold">{{ $courses-> titre}}</h3>
            </a>
            <div class="container-fluid py-5">
                
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2>Overview</h2>
                    <p>{{ $courses-> description}} Orur content. Be sure to look under the hood at the source HTML here as we've adjusted
                         the alignment and sizing of both column's content for equal-height.</p>
                    <form  action="{{ route('users.createlessons',  auth()->user()->name) }}" >
                        <button type="submit" class="btn btn-primary my-3">Add new Lesson</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>{{ $user ->name}} does not have any course registered</p>
    @endif

    <div class="container-fluid bg-light  py-5">
        <div class="row">
            <div class="text--center">
                <h4 class="h5 fw-bold">List of Employees</h4>
                <br>
            </div>
            <div class="profile-edit">
                <table class="table table-bordered style-comments">
                    <thead>
                        <tr>
                            <th id="0">Id</th>
                            <th id="1">Title</th>
                            <th id="1">Description</th>
                            <th id="2">Updated</th>
                            <th id="2">Manage</th>
                            <th id="2">Edit</th>
                            <th id="2">Delete</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @if ($lessons -> count())

                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson-> id}}</td>
                                    <td>{{ $lesson-> title}}</td>
                                    <td>{{ $lesson-> content}}</td>
                                    <td>{{ $lesson-> created_at->diffForHumans() }}</td>
                                    <td>
                                        <form novalidate action="">
                                            <button class="btn btn-primary" type="submit" >Manage</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form novalidate action="{{ route('users.updatelessons',  $lesson-> title) }}">
                                            <button class="btn btn-primary" type="submit" >Modify</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form novalidate action="">
                                            <button class="btn btn-primary" type="submit" >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @else
                            <p>{{ $user ->name}} does not have any posts</p>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>




@endsection