@extends('layouts.master')
@section('content')
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                </div>
        </div>
      </div>
    </header>
    <div class="container">

        <div class="row">
            <div class="col-sm-8">
                <h2 class="mt-4">@lang('messages.question1')</h2>
                <p>@lang('messages.answer1')</p>
                <h2 class="mt-4">@lang('messages.question2')</h2>
                <p>@lang('messages.answer2')</p>
            </div>
            <div class="col-sm-4">
                <h2 class="mt-4">@lang('messages.contact')</h2>
                <address>
                    <strong>@lang('messages.brs')</strong>
                    @lang('messages.address')
                    <br>
                </address>
                <address>
                    <abbr title="Phone">P:</abbr>
                    (+84) 1283572412
                    <br>
                    <abbr title="Email">E:</abbr>
                    <a href="mailto:#">bookreviewsytem@gmail.com</a>
                </address>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-sm-4 my-4">
                <div class="card">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">@lang('messages.title')</h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">@lang('messages.find_out_more')</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 my-4">
                <div class="card">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">@lang('messages.title')</h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">@lang('messages.find_out_more')</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 my-4">
                <div class="card">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">@lang('messages.title')</h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">@lang('messages.find_out_more')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
