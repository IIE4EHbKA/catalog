@extends('layouts.app')
@section('title', $title)
@section('content')

    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">

            <div class="col-sm-12 col-md-8">

                <div class="category">
                    @if(!empty($cid))
                        Категория: {{$name}}

                    @else
                        Каталог
                    @endif
                </div>
                <div class="row">

                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(!$products->isEmpty())
                        @foreach($products as $product)
                            <div class="col-xs-6 col-sm-4 product" data-id="{{$product['id']}}">
                                <div class="img-box">
                                    <img src="{{$product['image']}}"
                                         class="img-responsive">
                                </div>
                                <h2 class="name">{{$product['name']}}</h2>
                                <h2>Размер: {{$product['size']}}</h2>
                                <h2>В пачке: {{$product['pkg']}}</h2>
                                <div class="price">{{$product['price']}}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger">Ничего нет!</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="pag">{!! $products->render() !!}</div>
                    </div>
                </div>


            </div>
            <div class="col-sm-12 col-md-4">

                <div class="panel panel-default">
                    <div class="panel-heading panel-heading-red">Связаться с нами</div>
                    <div class="panel-body">
                        @if (session('send'))
                            <div class="form-group">
                                <div class="alert alert-success">
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