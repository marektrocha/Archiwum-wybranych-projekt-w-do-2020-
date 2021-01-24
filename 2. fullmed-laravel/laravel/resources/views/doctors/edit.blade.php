@extends('doctors/template')

@section('title')
    @if (isset($title))
     | {{ $title }}
    @endif
@endsection

@section('content')
<div class="conteiner">
    <div class="card-body" style="background:white; margin-left:5%; margin-right:5%;">
        <div class="text-center"><img src="../../img/fullmed.png"></div>
        <h2>Edycja lekarza</h2>

    <form action="{{ action('App\Http\Controllers\DoctorController@editStore') }}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="id" value="{{ $doctor->id }}" />                     <!-- ABY MOŻNA BYŁO WIEDZIEĆ, JAKIEGO LEKARZA AKTUALIZUJEMY -->

        <div class="form-group">
            <label for="name">Imię i nazwisko lekarza</label>
            <input type="text" class="form-control" name="name" value="{{ $doctor->name }}"/>
        </div>

        <div class="form-group">
            <label for="email">E-mail lekarza</label>
            <input type="text" class="form-control" name="email" value="{{ $doctor->email }}"/>
        </div>

        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="phone" class="form-control" name="phone" value="{{ $doctor->phone }}"/>
        </div>

        <div class="form-group">
            <label for="address">Adres</label>
            <input type="address" class="form-control" name="address" value="{{ $doctor->addres }}"/>
        </div>

        <div class="form-group">
            <label for="pesel">PESEL</label>
            <input type="text" class="form-control" name="pesel"  value="{{ $doctor->pesel }}"/>
        </div>

        <div class="form-group">
            <label for="pesel">Specjalizacja</label>

            @foreach ($specialisations as $specialisation)
                @if($doctor->specialisations->contains($specialisation->id))
                    <input type="checkbox" class="form-control" name="specialisations[]" value="{{ $specialisation->id }}" checked/>{{ $specialisation->name }}
                @else
                    <input type="checkbox" class="form-control" name="specialisations[]" value="{{ $specialisation->id }}" />{{ $specialisation->name }}
                @endif
            @endforeach

        </div>

        <div class="form-group">
            <label for="pesel">Status</label>
            @if($doctor->status == "Active")
                Aktywny: <input type="radio" class="form-control" name="status"  value="Active" checked="checked"/>
                Nieaktywny: <input type="radio" class="form-control" name="status"  value="Inactive"/>
            @else
                Aktywny: <input type="radio" class="form-control" name="status"  value="Active"/>
                Nieaktywny: <input type="radio" class="form-control" name="status"  value="Inactive" checked="checked"/>
            @endif
        </div>

        <input type="submit" value="Edytuj lekarza" class="btn btn-primary" />
    </form>

</div>
@endsection('content')
