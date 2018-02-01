@extends('layouts.master')

@section('content')

<div class="container">
    <h1 class="my-4">{{ $category->name }}</h1>
    <div class="row">
        @foreach($category->books as $book)
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item">
            <div class="card h-100">
                <a href="{{ route('books.show', $book->id) }}"><img class="card-img-top" src="{{ $book->images_path }}" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">{{ $book->title }}</h4>
                    <p class="card-text">{{ $book->author }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
