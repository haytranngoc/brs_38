@extends('layouts.master')

@section('content')

<div class="container">

      <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">@lang('messages.title'):
        <small>
            <a href="#">{{ $book->title }}</a>
        </small>
    </h1>

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
          <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ $book->images_path }}" alt="">
            <hr>
            
            <p>@lang('messages.posted_on'): {{ $book->publish_date }}</p>
            <p>@lang('messages.author'): {{ $book->author }}</p>
            <p>@lang('messages.number_of_pages'): {{ $book->number_pages }}</p>
            <p>@lang('messages.categories'): <a href="{{ route('category.show', $book->category->id) }}">{{ $book->category->name }}</a> </p>
            <p>@lang('messages.owners'):</p>
            @foreach($book->owners as $owner)
                <strong><a href="{{ route('users.show', $owner->id) }}"> {{ $owner->name }}</a></strong>
            @endforeach

            <hr>

          <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header"></h5>
                <div class="card-body">
                    {!! Form::open() !!}
                        <div class="form-group">
                            {{ Form::textarea('', null, ['class' => 'form-control']) }}
                        </div>
                        {{ Form::submit(trans('messages.submit'), ['class' => 'btn btn-primary']) }}
                    {!! Form::close() !!}
                </div>

          <!-- Comment with nested comments -->
            @foreach($book->bookReviews as $review)
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $review->user->name }}</h5>
                        <p>{{ $review->content }}</p>
                        
                        @foreach($review->commentReviews as $comment)
                            <div class="media mt-4">
                                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $comment->user->name }}</h5>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>

        </div>

    </div>

</div>
@endsection
