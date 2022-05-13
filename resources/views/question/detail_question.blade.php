@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="container-fluid mt-20">
        <div class="row">
            <div class="col-6 gap-2 w-100 justify-content-between">
                <div>
                    <h5 class="my-2 display-6">{{ $question->question}}</h5>
                    <br>
                    <p><strong>Explanation</strong> <br>{{ $question->explanation}}</p>
                    <p class="opacity-50 text-nowrap"><strong>Created</strong> {{ $question-> created_at->diffForHumans() }}</p>
                    <p><strong>Status</strong> - {{ $question->is_active === '1'  ? 'Active' : 'Not Active' }}</p>
                    <p>By {{ $question->user->name}}</p>
                    
                    <div class="d-flex flex-wrap align-items-center px-0 pt-0">
                        @auth
                            <form action="{{ route('users.updatetopics',  $question-> id) }}" method="post" class="mr-1">
                            @csrf
                                <button type="submit" class="btn btn-light">Delete</button>
                            </form>
                            <!-- END DELETE TOPICS -->
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-6">
                @foreach($answers as $answer)
                <tr class="hover:bg-green-200">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $answer->answer}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="@if($answer->is_checked === '1') bg-secondary p-1 text-white rounded-xl @endif justify-center mx-auto text-xs font-extrabold  "> {{ $answer->is_checked === '1'  ? 'Correct' : 'Wrong' }}</div>
                    </td>
                </tr>
                @endforeach
            </div>
        </div>
    </div>
</div>

    

@endsection