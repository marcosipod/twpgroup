<div class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <small class="mb-1">{{ $log->user->name }}</small>
      <small>{{ $log->created_at }}</small>
    </div>
    <p class="lead mb-1">{{ $log->comment }}</small>
</div>