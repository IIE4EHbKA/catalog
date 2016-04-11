<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>
    <link href="/public/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="menu">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logo-link" href="/">
                    <img class="logo" src="/public/images/sitename.png">
                </a>
            </div>


            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-large">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span>Каталог</span>
                            <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-large row">
                            <li class="col-sm-4">
                                <ul>
                                    <li><a href="/category/1">Тротуарная плитка</a></li>
                                    <li><a href="/category/6">Облицовочные плиты</a></li>
                                    <li><a href="/category/3">Тактильные плиты для слепых</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/category/2">Бордюры</a></li>
                                    <li><a href="/category/4">Накладные проступи, подоконники, бордюры, водостоки</a></li>
                                    <li><a href="/category/5">Бетонопаркет</a></li>

                                </ul>
                            </li>
                            <li class="col-sm-4">
                                <ul>
                                    <li><a href="/category/8">Заборные секции, парапеты, навершия, крышки на столбы, столбы</a></li>
                                    <li class="divider"></li>
                                    <li><a href="/category/7">Ландшафтно-архитектурные строения</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-4">
                                <ul>
                                    <li><a href="/category/9">Прочее</a></li>
                                </ul>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="/about"><span>О компании</span></a>
                    </li>
                </ul>
                <div class="nav navbar-nav navbar-right">
                    <div class="tel">
                        <div><i class="glyphicon glyphicon-earphone"></i> 8 (930) 284-19-73</div>
                        <div><a href="#" data-toggle="modal" data-target="#map"><span
                                        class="map">Как проехать?</span></a></div>
                    </div>
                </div>
                <div class="nav navbar-nav navbar-right">
                    <div class="open-time">
                        <div><i class="glyphicon glyphicon-time"></i> Время работы</div>
                        <div>Пн. - Пт., 8:00-16:00</div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
</div>
<div class="content clearfix">
    <div class="container">
        @yield('content')
    </div>
</div>
<div class="footer clearfix">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <p>&copy; {{date('Y')}} ООО «СТРОЙПЛИТКА НН» - Производство тротуарной плитки качественно и в срок. </p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="map" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <button type="button" class="close modalclose" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        <iframe width="600" height="450" frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJe3Xf7OQpTkER5J8NfzsmSZk&key=AIzaSyAt47BOZCE2nwQ3NpMIFkRVBZ1ovLrC7lk"
                allowfullscreen></iframe>
    </div>
</div>

<div class="modal fade" id="fullstory" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="fullstory-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="/public/js/scripts.js"></script>
</body>
</html>