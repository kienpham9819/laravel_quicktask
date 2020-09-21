@extends("layout.index")

@section('content')
    @if (session('message'))
      <div class="alert alert-success noti col-md-3 col-md-push-9">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <strong>{{ session('message') }}</strong>
      </div>
    @endif

    <h1 class="page-header">{{ trans('title.staff') }}
      <small>{{ trans('title.list') }}</small>
    </h1>
    <div>
        <a  type="button" href="{{ route('staffs.create') }}" class="btn btn-info">{{ trans('title.add') }}</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('title.fullname') }}</th>
                    <th>{{ trans('title.avatar') }}</th>
                    <th>{{ trans('title.detail') }}</th>
                    <th>{{ trans('title.edit') }}</th>
                    <th>{{ trans('title.delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 0; @endphp
                @foreach ($data as $item)
                <tr>
                    <td>{{ ++$count }}</td>
                    <td>{{ $item->fullname }}</td>
                    <td><img src="{{ $item->avatar }}" alt=""></td>
                    <td><a  data-toggle="modal" href='#{{ $item->id }}'>{{ trans('title.detail') }}</a></td>
                    <td><i class="fa fa-pencil fa-fw"></i> <a href="{{ route('staffs.edit', $item->id) }}">{{ trans('title.edit') }}</a></td>
                    <td>
                    <form action="{{ route('staffs.destroy', $item->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn_delete" ><i class="fa fa-trash-o  fa-fw btnDelete"></i></button>
                    </form>
                    </td>
                    <div class="modal fade" id="{{ $item->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title"> {{ trans('title.infor_d') }}</h4>
                              </div>
                              <div class="modal-body">
                              <label for="">{{ trans('title.id') }} : </label>
                              <span>{{ $item->id }}</span>
                              <hr>
                              <label for="">{{ trans('title.fullname') }} : </label>
                              <span>{{ $item->fullname }}</span>
                              <hr>
                              <label for="">{{ trans('title.avatar') }} : </label>
                              <span><img src="{{ $item->avatar }}" alt=""></span>
                              <hr>
                              <label for="">{{ trans('title.gender') }} : </label>
                              <span>{{ $item->gender==config('gender.male') ? "Male" : "Female" }}</span>
                              <hr>
                              <label for="">{{ trans('title.birthday') }} : </label>
                              <span>{{ $item->birthday }}</span>
                              <hr>
                              <label for="">{{ trans('title.address') }} : </label>
                              <span>{{ $item->address }}</span>
                              <hr>
                              <label for="">{{ trans('title.work_at') }} : </label>
                              <span>{{ $item->department->name }}</span>

                              </div>
                              <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('title.close') }}</button>
                            </div>
                          </div>
                      </div>
                </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $data->links() !!}
@endsection
