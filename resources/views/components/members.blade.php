@props(['group_member'=> $groupMembers])

<div class="d-flex text-muted py-2 bg-white mb-1 px-2 border rounded">
    @if ($group_member ->user->image)
        <img class="bd-placeholder-img flex-shrink-0 me-2 rounded-circle border shadow-sm" width="40" height="40" src="{{ '/storage/images/'.$group_member->user_id.'/'.$group_member -> user ->image}}" alt="12">
    @else
        <img class="bd-placeholder-img flex-shrink-0 me-2 rounded-circle border " width="40" height="40" src="/images/icon-alliance/man.png" alt="default">
    @endif
    <p class="pb-2 col mb-0 small lh-sm ">
        <span class="d-flex justify-content-between pb-1">
            <strong class="d-block text-gray-dark">{{ $group_member -> user ->name}}</strong>
            <a href=""> {{ $group_member-> created_at->diffForHumans() }}</a>
        </span>
        <a href="#"class="text-info">{{ $group_member -> user ->profession}}</a>
    </p>
</div>



