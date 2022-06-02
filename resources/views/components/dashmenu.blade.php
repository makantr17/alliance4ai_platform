


<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
<span>Info and reports</span>
<a class="link-secondary" href="#" aria-label="Add a new report">
    <span data-feather="plus-circle"></span>
</a>
</h6>
<ul class="nav flex-column mb-2">
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.profile',  auth()->user()->name) }}">
        <span data-feather="user"></span>
        Profile
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.score', auth()->user()->name) }}">
            <span data-feather="book"></span>Score
            <span class="badge p-1 bg-light border text-dark rounded-pill align-text-bottom">27</span>
        </a>
    </li>
    @if (auth()->user()->isAdmin)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('setting', auth()->user()->name)}}">
            <span data-feather="user"></span>
            Settings
            </a>
        </li>
    @endif
</ul>




