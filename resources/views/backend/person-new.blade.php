@extends('frontend.master-template')
@section('content')
    <body class="hold-transition sidebar-mini">
    <form method="post"
          action="{{ $entry->id > 0 ? route('post-person-created', [ $entry->id ]) : route('post-person-created', [ 'id' => 0 ])  }}">
        <input type="hidden" value="id">
        @csrf
        <div class="card-body">
            <h3> {{ $entry->id > 0 ? "Personel'i Güncelle":"Personel Ekle" }}</h3>
            <div class="form-group">
                <label for="inputId"> {{ __('Personel ID') }}</label>
                <input type="text" class="form-control" style="width: 30%" name="id" disabled
                       value="{{ $entry->id  }}">
            </div>

            <div class="form-group">
                <label for="inputId"> {{ __('İsim Soyisim') }}</label>
                <input type="text" class="form-control" style="width: 30%" name="name"
                       value=" {{ $entry->id > 0 ? $entry->name : "" }} ">
            </div>
            <div>
                <label for="phone">{{ __('Telefon Numarası') }}</label><br>
                <input type="tel" id="phone" class="form-control" style="width: 30%" name="phone" placeholder="555-555-55-55"
                       pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" required value="{{ $entry->phone }}">
            </div>
            <div>
                <label for="email">{{__('Email')}}</label><br>
                <input type="email" id="email" name="email" class="form-control" style="width: 30%" value="{{ $entry->email }}">
            </div>
            <div class="form-group">
                <label for="inputName">{{__('Adres')}}</label>
                <textarea class="form-control"  style="width: 30%" rows="5" id="comment" required
                          name="address">{{ $entry->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">{{$entry->id > 0 ? "Güncelle" : "Kaydet"}}</button>
        </div>

    </form>
    </body>
@endsection




