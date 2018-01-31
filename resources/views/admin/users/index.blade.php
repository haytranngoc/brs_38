@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('layouts.session')
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                    <thead>
                        <tr>
                            <th>@lang('messages.no')</th>
                            <th>@lang('messages.name')</th>
                            <th>@lang('messages.email')</th>
                            <th>@lang('messages.role')</th>
                            <th colspan="2">@lang('messages.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $user->name }}</th>
                            <th>{{ $user->email }}</th>
                            <th>{{ $user->role ? trans('messages.admin') : trans('messages.user')}}</th>
                            <th>
                                @if (Auth::user()->id != $user->id)
                                    {{ Form::open(['route' => ['admin.users.destroy', $user->id], 'method'  => 'delete']) }}
                                        {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit','class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                @endif
                            </th>
                            <th>
                                @if (Auth::user()->id != $user->id)
                                    {{ Form::open(['route' => ['admin.users.edit', $user->id], 'method' => 'GET']) }}
                                        {{ Form::button('<i class="fa fa-pencil"></i> ', ['type' => 'submit', 'class' => 'btn btn-info']) }}
                                    {{ Form::close() }}
                                @endif
                            </th>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
