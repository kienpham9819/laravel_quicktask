<div class="btn-group">
    <a class="btn btn-default" href="{{ route('departments.index') }}" role="button">{{ trans('title.department') }}</a>
    <a class="btn btn-default" href="{{ route('staffs.index') }}" role="button">{{ trans('title.staff') }}</a>
</div>
<div class="col-md-4 ">
    <a href="{{ route('lang', ['en']) }}">{{ trans('title.en') }}</a>
    <span>|</span>
    <a href="{{ route('lang', ['vi']) }}">{{ trans('title.vi') }}</a>
</div>
