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
        <h2>Dodaj nowego lekarza</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ action('App\Http\Controllers\DoctorController@store') }}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
            <label for="name">Imię i nazwisko lekarza</label>
            <input type="text" class="form-control" name="name" />
        </div>

        <div class="form-group">
            <label for="email">E-mail lekarza</label>
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
            <label for="address">Adres (opcjonalnie)</label>
            <input type="address" class="form-control" name="address" />
        </div>

        <div class="form-group">
            <label for="pesel">PESEL</label>
            <input type="text" class="form-control" name="pesel" />
        </div>

        <div class="form-group">
            <label for="pesel">Specjalizacja</label>

            @foreach ($specialisations as $specialisation)
                <input type="checkbox" class="form-control" name="specialisations[]" value="{{ $specialisation->id }}" />{{ $specialisation->name }}
            @endforeach

        </div>

        <input type="hidden" name="status" value="Active" />

        <input type="submit" value="Dodaj lekarza" class="btn btn-primary" />
    </form>

</div>
@endsection('content')
