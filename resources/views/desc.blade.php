<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">{{$product['name']}}</h4>
</div>
<div class="modal-body">

    <div class="row">
        <div class="col-xs-5">
            <img src="{{$product['image']}}"
                 class="img-responsive col-xs-12"/>
        </div>
        <div class="col-xs-7">
            <div class="table-responsive">
                <table class="table table-striped table-condensed">
                    <tbody>
                    <tr>
                        <td>Название</td>
                        <td><strong>{{$product['name']}}</strong></td>
                    </tr>
                    <tr>
                        <td>Цена</td>
                        <td><strong>{{$product['price']}}</strong></td>
                    </tr>
                    <tr>
                        <td>Размер</td>
                        <td>{{$product['size']}}</td>
                    </tr>
                    <tr>
                        <td>Кол-во штук в м<sup>2</sup></td>
                        <td>{{$product['pkg']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>