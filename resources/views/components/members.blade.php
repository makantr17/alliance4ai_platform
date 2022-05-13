@props(['group_member'=> $groupMembers])

<div class="d-flex text-muted pt-3 bg-light mb-1">
    @if ($group_member ->user->image)
        <img class="bd-placeholder-img flex-shrink-0 me-2 rounded-circle border p-1 border-success" width="50" height="50" src="{{ '/storage/images/'.$group_member->user_id.'/'.$group_member -> user ->image}}" alt="12">
    @else
        <img class="bd-placeholder-img flex-shrink-0 me-2 rounded-circle border p-1 border-success" width="50" height="50" src="/images/icon-alliance/man.png" alt="default">
    @endif
    <p class="pb-3 col mb-0 small lh-sm">
        <span class="d-flex justify-content-between pb-1">
            <strong class="d-block text-gray-dark">{{ $group_member -> user ->name}}</strong>
            <a href="">  Joined {{ $group_member-> created_at->diffForHumans() }}</a>
        </span>
        <a href="#"class="text-info">{{ $group_member -> user ->profession}}</a>
    </p>
</div>