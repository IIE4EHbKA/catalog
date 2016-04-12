@extends('layouts.app')
@section('title', 'Вход')
@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-heading">Вход в админ панель</div>
                <div class="panel-body">

                    @if (session('status'))
                        <div class="col-md-6 col-md-offset-4">
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Логин</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Логин">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Пароль</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="Пароль">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-log-in"></i> Вход
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection