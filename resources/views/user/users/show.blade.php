@extends('layouts.profile')

@section('content')
    
<div class="container">
    
    <div class="row">
        <div class="col-sm-12">
            <h1><strong>@lang('messages.all_book')</strong></h1>
            <button class="btn btn-primary"><a href="{{ route('books.create') }}">@lang('messages.add_book')</a></button>
            <div class="row">
                @foreach($user->owners as $book)
                    <div class="col-sm-3 my-4">
                        <div class="card">
                            <a href="{{ route('books.show', $book->id) }}"><img class="card-img-top" src="{{ $book->images_path }}" alt=""></a>
                            <div class="card-body">
                                <p><strong>@lang('messages.title'): </strong>{{ $book->title }}</p>
                                <p><strong>@lang('messages.posted_on'): </strong>{{ $book->publish_date }}</p>
                                <p><strong>@lang('messages.author'): </strong>{{ $book->author }}</p>
                                <p><strong>@lang('messages.number_of_pages'): </strong>{{ $book->number_pages }}</p>
                                <p><strong>@lang('messages.categories'): </strong><a href="{{ route('category.show', $book->category->id) }}">{{ $book->category->name }}</a></p>
                                <p><strong>@lang('messages.owners'): </strong>{{ $user->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>
@endsection
