@extends("layout.index")

@section('content')
    @if (session('message'))
      <div class="alert alert-success noti col-md-3 col-md-push-9">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>{{ session('message') }}</strong>
      </div>
    @endif
    <h1 class="page-header">{{ trans('title.department') }}
    <small>{{ trans('title.list') }}</small>
    </h1>
    <div>
        <a type="button" href="{{ route('departments.create') }}" class="btn btn-info" >{{ trans('title.add') }}</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('title.id') }}</th>
                    <th>{{ trans('title.name') }}</th>
                    <th>{{ trans('title.edit') }}</th>
                    <th>{{ trans('title.delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 0; @endphp
                @foreach ($data as $item)
                <tr>
                    <td>{{ ++$count }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('departments.edit', $item->id) }}">{{ trans('title.edit') }}</a></td>
                    <td>
                    <form action="{{ route('departments.destroy', $item->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn_delete" ><i class="fa fa-trash-o  fa-fw btnDelete"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
