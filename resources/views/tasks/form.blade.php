@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          
            <form class="form-ad" action="{{ $form }}" method="{{ $method }}">
                @csrf

                <div class="form-group">
                    <label for="title">{{ __('Title') }}</label>
                    <input id="title" class="form-control form-control-lg @error('title') is-invalid @enderror" name="title" value="{{ $task->title ?? '' }}" required autofocus>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">{{ __('Description') }}</label>
                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5" required>{{ $task->description ?? '' }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="expired_at">{{ __('Expired at') }}</label>
                            <input id="expired_at" type="datetime-local" class="form-control form-control-sm @error('expired_at') is-invalid @enderror" value="{{ $task->expired_at ?? '' }}" name="expired_at" value="" required> 
                            @error('expired_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="user_id">{{ __('User assigned') }}</label>
                            <select class="form-control form-control-sm" id="user_id">
                                <option>Select...</option>
                                @foreach($users as $user)
                                <option :value="$user->id">
                                    {{ $user->name }}
                                </option>
                                @endforeach  

                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr />
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">
                        @if($method == "post")  
                        {{ __('Register') }}
                        @else
                        {{ __('Update') }}
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection