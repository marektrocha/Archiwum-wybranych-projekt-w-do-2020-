@extends('doctors/template')

@section('title')
    @if (isset($title))
     | {{ $title }}
    @endif
@endsection

@section('content')
<div class="conteiner">
    <div class="card-body" style="background:white; margin-left:5%; margin-right:5%;">
        <div class="text-center"><img src="../img/fullmed.png"></div>
        <h2>Dodanie pacjenta</h2>

    <form action="{{ action('App\Http\Controllers\PatientController@store') }}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
            <label for="name">Imię i nazwisko pacjenta</label>
            <input type="text" class="form-control" name="name" />
        </div>

        <div class="form-group">
            <label for="email">E-mail pacjenta</label>
            <input type="text" class="form-control" name="email" />
        </div>

        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" name="password" />
        </div>

        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="phone" class="form-control" name="phone" />
        </div>

        <div class="form-group">
            <label for="address">Adres</label>
            <input type="address" class="form-control" name="address" />
        </div>

        <div class="form-group">
            <label for="pesel">PESEL</label>
            <input type="text" class="form-control" name="pesel" />
        </div>

        <input type="submit" value="Dodaj pacjenta" class="btn btn-primary" />
    </form>

</div>
@endsection('content')
