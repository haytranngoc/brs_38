@extends('layouts.profile')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            @include('layouts.session')
        </div>
        <div class="col-sm-12">
            <h1><strong>@lang('messages.all_suggest')</strong></h1>
            <div class="row">
                @foreach($books as $book)
                    <div class="col-sm-3 my-4">
                        <div class="card">
                            <a href="{{ route('books.show', $book->id) }}"><img class="card-img-top" src="{{ config('setting.images_path') . '/' . $book->images }}"></a>
                            <div class="card-body">
                                <p><strong>@lang('messages.title'): </strong>{{ $book->title }}</p>
                                <p><strong>@lang('messages.posted_on'): </strong>{{ $book->publish_date }}</p>
                                <p><strong>@lang('messages.author'): </strong>{{ $book->author }}</p>
                                <p><strong>@lang('messages.number_of_pages'): </strong>{{ $book->number_pages }}</p>
                                {!! Form::open(['route' => ['suggests.acceptSuggest', 'id' => $book->suggest_id]]) !!}
                                    {{ Form::submit(trans('messages.submit'), ['class' => 'btn btn-primary']) }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($confirms as $confirm)
                    <div class="col-sm-3 my-4">
                        <div class="card">
                            <a href="{{ route('books.show', $confirm->book->id) }}"><img class="card-img-top" src="{{ $confirm->book->images }}"></a>
                            <div class="card-body">
                                <p><strong>@lang('messages.title'): </strong>{{ $confirm->book->title }}</p>
                                <p><strong>@lang('messages.posted_on'): </strong>{{ $confirm->book->publish_date }}</p>
                                <p><strong>@lang('messages.author'): </strong>{{ $confirm->book->author }}</p>
                                <p><strong>@lang('messages.number_of_pages'): </strong>{{ $confirm->book->number_pages }}</p>
                                <p class="text-center text-danger">@lang('messages.question4')</p>
                                {!! Form::open(['route' => ['suggests.confirm', 'id' => $confirm->id]]) !!}
                                    {{ Form::submit(trans('messages.confirm'), ['class' => 'btn btn-danger']) }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
