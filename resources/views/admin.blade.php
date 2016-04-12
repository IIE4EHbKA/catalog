@extends('layouts.app')
@section('title', 'Админ панель')
@section('content')

    <div class="col-md-10 col-md-offset-1">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="panel panel-default panel-table">
            <div class="panel-heading">
                <div class="row">
                    <div class="col col-xs-6">
                        <h3 class="panel-title">Товары</h3>
                    </div>
                    <div class="col col-xs-6 text-right">
                        <button type="button" data-toggle="modal" data-target="#addproduct"
                                class="btn btn-sm btn-primary btn-create">Добавить
                        </button>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                @if(!$products->isEmpty())
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th><i class="glyphicon glyphicon-cog"></i></th>
                            <th class="hidden-xs">ID</th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th>Размер</th>
                            <th>В пачке</th>
                            <th>Категория</th>
                            <th>Изображение</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td align="center">
                                    <a href="/admin/delete/{{$product->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                                <td class="hidden-xs">{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->pkg}}</td>
                                <td>{{$product->category}}</td>
                                <td><img src="{{$product->image}}" class="img-responsive"/></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="col-xs-12 clearfix" style="margin-top: 20px;">
                        <div class="alert alert-danger">Ничего нет!</div>
                    </div>
                @endif

            </div>
            @if($products->lastPage() !== 0)
                <div class="panel-footer">
                    <div class="row">
                        <div class="col col-xs-4">Страница {!! $products->currentPage() !!}
                            из {!! $products->lastPage() !!}
                        </div>
                        <div class="col col-xs-8">
                            {!! $products->render() !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>

    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Добавление</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" method="post" action="admin/add" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Название</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Название">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Цена</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control" id="price" placeholder="Цена">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="size" class="col-sm-2 control-label">Размер</label>
                            <div class="col-sm-10">
                                <input type="text" name="size" class="form-control" id="size" placeholder="Размер">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pkg" class="col-sm-2 control-label">В пачке</label>
                            <div class="col-sm-10">
                                <input type="text" name="pkg" class="form-control" id="pkg" placeholder="В пачке">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-sm-2 control-label">Категория</label>
                            <div class="col-sm-10">
                                <select name="category" id="category" class="form-control">
                                    <option disabled selected>Выбрать категорию</option>
                                    @if(!$categories->isEmpty())
                                        @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['category']}}</option>
                                        @endforeach
                                    @else
                                        <option value="9" selected>Прочее</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Изображение</label>
                            <div class="col-sm-10">
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Добавить</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection