@extends('layout.index')

@section('content')

<form action="{{ route('departments.store') }}" method="POST" role="form">
	@csrf
	<legend>{{ trans('title.add_new_d') }}</legend>

	<div class="form-group">
		<label for="name_de">{{ trans('title.name') }}</label>
		@error('name')
			<span class="error">{{ trans($message) }}</span>
		@enderror
		<input type="text" class="form-control" id="name_de" name="name" value="{{ old('name') }}" placeholder="{{ trans('title.name_of_d') }}">
	</div>

	<button type="submit" class="btn btn-primary">{{ trans('title.save') }}</button>
</form>

@endsection
