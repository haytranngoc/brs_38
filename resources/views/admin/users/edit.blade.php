@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        @include('layouts.session')
        <div class="row">
            <div class="col-sm-4">
                @include('common.errors')
                {{ Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'PUT']) }}
                    <div class="form-group">
                        {!! Form::label('name', trans('messages.name')) !!}
                        <div class="form-controls">
                            {{ Form::text('name', $user->name, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', trans('messages.email')) !!}
                        <div class="form-controls">
                            {{ Form::text('email', $user->email, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', trans('messages.password')) !!}
                        <div class="form-controls">
                            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block text-warning">{{ $errors->first('password') }}</span>
                    @endif
                    {{ Form::submit(trans('messages.update'), ['class'=>'btn btn-primary']) }}
                    <a href="{{ route('admin.users.index')}}">@lang('messages.cancel')</a>
                {{Form::close()}}
            </div>
            
        </div>
    </div>
@endsection
