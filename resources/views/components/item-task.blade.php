<a href="{{ route('tasks.show', $task->id) }}"class="list-group-item list-group-item-action flex-column align-items-start ">
	<div class="d-flex w-100 justify-content-between">
		<h3 class="mb-1">{{ $task->title }}</h3>		
		
		{{-- Expiration Date --}}
		@if($task->is_expired)
			<small class="text-danger">Expired</small>
		@else
			<small>{{ $task->expired_at }}</small>
		@endif
		{{-- End Expiration Date --}}	
	</div>
	<p class="mb-1">{{ $task->description }}</p>

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
</a>