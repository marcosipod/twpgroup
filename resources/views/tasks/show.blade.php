@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 

            <div @class([
                'alert',
                'alert-danger' => $task->is_expired,
            ])>
                <div class="d-flex w-100 justify-content-between">
                    <h1 class="mb-1">{{ $task->title }}</h1>		
                    
                    {{-- Expiration Date --}}
                    @if ($task->is_expired)
                        <small>Expired</small>
                    @else
                        <small>{{ $task->expired_at }}</small>
                    @endif
                    {{-- End Expiration Date --}}	
                </div>
                <p class="lead">
                    {{ $task->description }}
                </p>
                <div class="mt-1">
                    {{-- Status Task --}}
                    @if ($task->completed)
                        <span class="badge badge-pill badge-primary mr-2">Completed</span>
                    @else
                        <span class="badge badge-pill badge-secondary mr-2">Pending</span>
                    @endif
                    {{-- End Status Task --}}

                    <span class="mr-2">
                        <strong>user assigned:</strong> 
                        @if ($task->user)
                            {{ $task->user->name }}
                        @else
                            {{ "unassigned" }}
                        @endif
                    </span>
                </div>
                @if ($task->user_id === auth()->user()->id)
                    @if (!$task->is_expired)
                    <hr />
                    <div class="mb-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('tasks.destroy', $task->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                    @endif
                @endif
            </div>

            <hr />
            @if ($task->user_id === auth()->user()->id)
                <div class="my-4">
                    <x-add-comment :task="$task"></x-add-comment>
                </div>
            @endif
                        
            @if ($task->logs->count())
                <div class="list-group">
                    @foreach($task->logs as $log)
                      <x-item-comment :log="$log"></x-item-comment>  
                    @endforeach     
                </div>               
            @else
                <x-alert message="No registered logs" type="info" />
            @endif
            
        </div>
    </div>
</div>

@endsection