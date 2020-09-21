@extends('layout.index')

@section('content')
    <form action="{{ route('staffs.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <legend>{{ trans('title.add_new_s') }}</legend>

        <div class="form-group">
            <label for="name_st">{{ trans('title.fullname') }}</label>
            @error('fullname')
            <span class="error">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control" id="name_st" name="fullname" value="{{ old('fullname') }}" placeholder="{{ trans('title.name_of_s') }}">
        </div>

        <div class="form-group">
            <label for="address_st">{{ trans('title.address') }}</label>
            @error('address')
            <span class="error">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control" id="address_st" name="address" value="{{ old('address') }}" placeholder="{{ trans('title.addr_of_s') }}">
        </div>

        <div class="form-group">
            <label for="birthday_st">{{ trans('title.birthday') }}</label>
            @error('birthday')
            <span class="error">{{ $message }}</span>
            @enderror
            <input type="date" class="form-control" id="birthday_st" name="birthday" value="{{ old('birthday') }}">
        </div>

        <div class="form-group">
            <label for="gender_st">{{ trans('title.gender') }}</label><br>
            @error('gender')
            <span class="error">{{ $message }}</span>
            @enderror
            <input type="radio" id="male" name="gender" value="{{ config('gender.male') }}" checked="">
            <label for="male">{{ trans('title.male') }}</label>
            <input type="radio" id="female" name="gender" value="{{ config('gender.female') }}">
            <label for="female">{{ trans('title.female') }}</label>
        </div>

        <div class="form-group">
            <label for="avatar_st">{{ trans('title.avatar') }}</label>
            @error('avatar')
            <span class="error">{{ $message }}</span>
            @enderror
            <input type="file" class="form-control" id="avatar_st" name="avatar">
        </div>

        <div class="form-group">
            <label for="name_st">{{ trans('title.department') }}</label>
            @error('department_id')
            <span class="error">{{ $message }}</span>
            @enderror

            <select class="form-control" name="department_id" id="">
                @foreach ($deps as $department)
                <option value="{{ $department->id }}" {{ $department->name=="security" ? "selected" : "" }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ trans('title.save') }}</button>
    </form>
@endsection
