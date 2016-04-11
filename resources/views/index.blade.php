@extends('layouts.app')
@section('title', 'Главная страница')
@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">

            <div class="col-sm-12 col-md-8">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="category">
                    Каталог
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-4 product">
                        <div class="img-box">
                            <img src="http://placemi.com/xruzn/600x700" class="img-responsive">
                        </div>
                        <h1>Christopher Di</h1>
                        <h2>Co-founder/ Projects</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-xs-6 col-sm-4 product">
                        <div class="img-box">
                            <img src="http://placemi.com/wctme/600x700" class="img-responsive">
                        </div>
                        <h1>Heather H</h1>
                        <h2>Co-founder/ Marketing</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-xs-6 col-sm-4 product">
                        <div class="img-box">
                            <img src="http://placemi.com/wctme/600x700" class="img-responsive">
                        </div>
                        <h1>Heather H</h1>
                        <h2>Co-founder/ Marketing</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                    <div class="col-xs-6 col-sm-4 product">
                        <div class="img-box">
                            <img src="http://placemi.com/wctme/600x700" class="img-responsive">
                        </div>
                        <h1>Heather H</h1>
                        <h2>Co-founder/ Marketing</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 col-md-4">

                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-red">Связаться с нами</div>
                    <div class="panel-body">
                        @if (session('send'))
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    {{ session('send') }}
                                </div>
                            </div>
                        @endif
                        <form action="/feedback" method="post" id="feedback">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Ваше имя" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Ваш e-mail"
                                       required>
                            </div>
                            <div class="form-group">
                                <textarea name="text" name="message" class="form-control" rows="10"
                                          placeholder="Ваше сообщение" required></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-block btn-danger">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>

@endsection