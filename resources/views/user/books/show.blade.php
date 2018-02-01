@extends('layouts.master')

@section('content')

<div class="container">

      <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">
        <small>
            <a href="#"></a>
        </small>
    </h1>

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

            <hr>
            <p></p>
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

          <!-- Single Comment -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0"></h5>
                </div>
            </div>

          <!-- Comment with nested comments -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
              

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                          <h5 class="mt-0"></h5>
                          
                        </div>
                    </div>

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0"></h5>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection
