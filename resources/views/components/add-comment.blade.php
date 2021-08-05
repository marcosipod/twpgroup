<form class="form-ad" action="{{ route('tasks.logs.store', $task->id) }}" method="post">
    @csrf
    <input id="task_id" name="task_id" type="hidden" value="{{ $task->id }}">
    <div class="form-group">
        <textarea id="comment" class="form-control @error('comment') is-invalid @enderror" name="comment" rows="5" required></textarea>
        @error('comment')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="text-right">
        <button type="submit" class="btn btn-primary"> 
            {{ __('Comment') }}
        </button>
    </div>
</form>
