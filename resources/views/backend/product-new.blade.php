@extends('frontend.master-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    <form method="post"
          action="{{ $entryProduct->id > 0 ? route('post-product-created', [ $entryProduct->id ]) : route('post-product-created', [ 'id' => 0 ])  }}">
        <input type="hidden" value="id">
        @csrf
        <div class="card-body">
            <h3>{{ $entryProduct->id > 0 ? "Ürün'ü Güncelle":"Ürün Ekle" }}</h3>
            <div class="form-group">
                <label> {{ __('Ürün Kodu') }}</label>
                <input type="text" class="form-control" style="width: 30%" name="product_code"
                       value=" {{ $entryProduct->id > 0 ? $entryProduct->product_code : "" }} ">
            </div>
            <div class="form-group">
                <label>{{ __('Ürün Adı') }}</label><br>
                <input type="text" class="form-control" style="width: 30%" id="product_name" name="product_name"
                       required value="{{ $entryProduct->product_name }}">
            </div>
            <div class="form-group">
                <label>{{ __('Ürün Birim Fiyatı') }}</label><br>
                <input type="number" step="0.01" class="form-control" style="width: 30%" id="product_unitprice"
                       name="product_unitprice"
                       required value="{{ $entryProduct->product_unitprice }}">
            </div>
            <div class="form-group">
                <label>{{ __('Ürün Miktarı') }}</label><br>
                <input type="number" class="form-control" style="width: 30%" id="product_quantity"
                       name="product_quantity"
                       required value="{{ $entryProduct->product_quantity }}">
            </div>
            <button type="submit" class="btn btn-success">{{$entryProduct->id > 0 ? "Güncelle" : "Kaydet"}}</button>
        </div>
    </form>
    </body>
@endsection





