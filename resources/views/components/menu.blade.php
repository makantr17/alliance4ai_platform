<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Twelfth navbar example">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('users.profile',  auth()->user()) }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.discussion',  auth()->user()) }}">Discussions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.topics',  auth()->user()) }}">Topics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.group',  auth()->user()) }}">Groups</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.hackerthon',  auth()->user()) }}">Hackathons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.course',  auth()->user()) }}">Courses</a>
            </li>
        </ul>
    </div>
    </div>
</nav>





