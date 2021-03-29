@extends('frontend.master-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    <form action="{{ route('get-product') }}" method="get" role="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ürünler Tablosu</h3>
                <a href="{{ route ('get-product-new') }}" class="btn btn-success"
                   style="margin-left: 96%;margin-top: -38px">Ekle</a>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ürün Kodu</th>
                        <th>Ürün Adı</th>
                        <th>Ürün Birim Fiyatı</th>
                        <th>Ürün Miktarı</th>
                        <th style="width: 40px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $number = 1 ;?>
                    @foreach($product as $products )
                        @if(!empty($products->status))
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $products->product_code }}</td>
                                <td>{{ $products->product_name }}</td>
                                <td>{{ $products->product_unitprice }}</td>
                                <td>{{ $products->product_quantity }}</td>
                                <td><a href="{{ route('get-product-arrangement',[$products->id]) }}"
                                       class="btn btn-primary btn-sm fa fa-refresh">Düzenle</a></td>
                                <td><a href="{{ route('get-delete-product', [$products->id] )}}"
                                       class="btn btn-danger btn-sm fa fa-trash"
                                       onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{ $product->links() }}
    </form>
    </body>
@endsection
