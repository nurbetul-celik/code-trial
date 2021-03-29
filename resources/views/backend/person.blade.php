@extends('frontend.master-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    <form action="{{ route('get-person') }}" method="get" role="form">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Personel Tablosu</h3>
                <a href="{{ route ('get-person-new') }}" class="btn btn-success"
                   style="margin-left: 96%;margin-top: -38px">Ekle</a>
            </div>
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Personel ID</th>
                        <th>İsim Soyisim</th>
                        <th>Telefon</th>
                        <th>Email</th>
                        <th>Adres</th>
                        <th style="width: 40px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($person as $persons )
                        @if(!empty($persons->status))
                            <tr>
                                <td>{{$persons->id }}</td>
                                <td>{{$persons->name }}</td>
                                <td>{{$persons->phone }}</td>
                                <td>{{$persons->email }}</td>
                                <td>{{$persons->address }}</td>
                                <td><a href="{{ route('get-person-arrangement',[$persons->id]) }}"
                                       class="btn btn-primary btn-sm fa fa-refresh">Düzenle</a></td>
                                <td><a href="{{ route('get-delete-person', [$persons->id] )}}"
                                       class="btn btn-danger btn-sm fa fa-trash"
                                       onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</a></td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{ $person->links() }}
    </form>
    </body>
@endsection
