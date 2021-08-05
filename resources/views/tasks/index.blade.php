@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session()->has('alert'))
                <x-alert :message="$alert->message" :type="$alert->type" />
            @endif

            <div class="list-group my-4">
                @if ($tasks->count())
                    @foreach($tasks as $task)
                        <x-item-task :task="$task"/>
                    @endforeach                    
                @else
                    <x-alert message="No registered tasks" type="info" />
                @endif
            </div>

            {{ $tasks->onEachSide(5)->links() }}
        </div>
    </div>
</div>

@endsection