@extends('layouts.master')

@section('content')

    <div class="container">

          <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">@lang('messages.title'):
            <small>
                <a href="#">{{ $book->title }}</a>
            </small>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">@lang('messages.borrow_book')</button>
        </h1>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @lang('messages.question3')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.close')</button>
                        {!! Form::open(['route' => ['books.suggests', 'id' => $book->id]]) !!}
                            {{ Form::submit(trans('messages.submit'), ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-10">
              <!-- Preview Image -->
                <img class="img-fluid rounded" src="{{ $book->images }}" alt="">
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
                    <h5 class="card-header">@lang('messages.review_comment')</h5>
                    <hr>
                    <div class="container">
                        {!! Form::open(['route' => ['books.review', 'id' => $book->id]]) !!}
                            <div class="form-group">
                                {{ Form::textarea('content', null, ['class' => 'form-control', 'required', 'placeholder' => '.......']) }}
                            </div>
                            {{ Form::submit(trans('messages.submit'), ['class' => 'btn btn-primary']) }}
                        {!! Form::close() !!}
                    </div>
                    <br>

              <!-- Comment with nested comments -->
                    <div class="container">
                        @foreach($book->bookReviews as $review)
                            <div class="media mb-4">
                                <img class="d-flex mr-3 img-thumbnail" src="http://placehold.it/50x50" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $review->user->name }}</h5>
                                    <p>{{ $review->content }}</p>
                                    <span><small>{{ $review->created_at }}</small></span>
                                    
                                    @foreach($review->commentReviews as $comment)
                                        <div class="media mt-4">
                                            <img class="d-flex mr-3 img-thumbnail" src="http://placehold.it/50x50" alt="">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                                                <p>{{ $comment->content }}</p>
                                                <span><small>{{ $comment->created_at }}</small></span>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if (Auth::check())
                                        <div class="container">
                                            {!! Form::open(['route' => 'comments.store']) !!}
                                                <div class="form-group">
                                                    {{ Form::text('content', null, ['class' => 'form-control', 'required', 'placeholder' => '.......']) }}
                                                    {{ Form::hidden('user_id', Auth::user()->id) }}
                                                    {{ Form::hidden('review_id', $review->id) }}
                                                </div>
                                                {{ Form::submit(trans('messages.submit'), ['class' => 'btn btn-primary']) }}
                                            {!! Form::close() !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
