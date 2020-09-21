@extends('layout.index')

@section('content')
    <form action="{{ route('departments.update', [$data->id]) }}" method="POST" role="form">
        @csrf
        @method('PATCH')
        <legend>{{ trans('title.edit') }}</legend>

        <div class="form-group">
            <label for="name_de_e">{{ trans('title.name') }}</label>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror

            <input type="text" class="form-control" id="name_de_e" name="name" value="{{ old('name', $data->name) ?? "" }}" placeholder="{{ trans('title.name_of_d') }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ trans('title.save') }}</button>

    </form>
@endsection
