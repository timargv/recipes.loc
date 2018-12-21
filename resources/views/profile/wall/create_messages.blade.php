<div class="card my-3">
    <div class="card-header bg-transparent">
        {{ $title_wall }}
    </div>

    <div class="card-body">
        <form action="{{ route('profile.wall.messages.store', $user) }}" method="POST">
            @csrf

            <div class="form-group">
                <input id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required>
                @if ($errors->has('title'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('title') }}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="3" required>{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('description') }}</strong></span>
                @endif
            </div>
            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary btn-sm">Добавить</button>
            </div>
        </form>
    </div>
</div>
