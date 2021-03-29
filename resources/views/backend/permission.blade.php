@extends('frontend.master-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    <form action="{{ route('get-permission') }}" method="get" role="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ürünler Tablosu</h3>
                <a href="{{ route ('get-permission-new') }}" class="btn btn-success"
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

                    </tbody>
                </table>
            </div>
        </div>

    </form>
    </body>
@endsection
