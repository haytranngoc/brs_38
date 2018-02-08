@extends('layouts.profile')

@section('content')
    
<div class="container">
    @include('layouts.session')
    <div class="row">
        <div class="col-sm-12">
            <h1><strong>@lang('messages.all_book_borrowed')</strong></h1>
            <div class="row">
                @foreach($giveBacks as $giveBack)
                    <div class="col-sm-3 my-4">
                        <div class="card">
                            <a href="{{ route('books.show', $giveBack->id) }}"><img class="card-img-top" src="{{ $giveBack->book->images }}"></a>
                            <div class="card-body">
                                <p><strong>@lang('messages.title'): </strong>{{ $giveBack->book->title }}</p>
                                <p><strong>@lang('messages.posted_on'): </strong>{{ $giveBack->book->publish_date }}</p>
                                <p><strong>@lang('messages.author'): </strong>{{ $giveBack->book->author }}</p>
                                <p><strong>@lang('messages.number_of_pages'): </strong>{{ $giveBack->book->number_pages }}</p>
                                {!! Form::open(['route' => ['suggests.giveBack', 'id' => $giveBack->id]]) !!}
                                    {{ Form::submit(trans('messages.give_back'), ['class' => 'btn btn-primary']) }}
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
