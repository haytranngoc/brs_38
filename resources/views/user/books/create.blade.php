@extends('layouts.profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                @include('common.errors')
                {{ Form::open(['route' => 'books.store', 'files' => true]) }}
                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('images', 'Images') !!}
                            <div class="form-controls">
                                {{ Form::file(('images'), null, ['class'=>'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', trans('messages.title')) !!}
                        <div class="form-controls">
                            {{ Form::text('title', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('number_pages', trans('messages.number_of_pages')) !!}
                        <div class="form-controls">
                            {{ Form::text('number_pages', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('publish_date', trans('messages.publish_date')) !!}
                        <div class="form-controls">
                            {{ Form::date('publish_date', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('author', trans('messages.author')) !!}
                        <div class="form-controls">
                            {{ Form::text('author', null, ['class'=>'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', trans('messages.categories')) !!}
                        <div class="form-controls">
                            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
                    <a href="{{ route('books.index') }}">@lang('messages.cancel')</a>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
