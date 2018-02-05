@extends('layouts.profile')

@section('content')
    
<div class="container">
    @include('layouts.session')
    <div class="row">
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
                            </div>
                            {!! Form::open(['route' => ['suggests.accept', 'id' => $book->suggest_id]]) !!}
                                {{ Form::submit(trans('messages.submit'), ['class' => 'btn btn-primary']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection
