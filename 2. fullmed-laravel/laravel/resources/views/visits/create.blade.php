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
        <h2>Dodaj wizytę</h2>

    <form action="{{ action('App\Http\Controllers\VisitController@store') }}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">
            <label for="name">Lekarz</label>
            <select name="doctor">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Pacjent</label>
            <select name="patient">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Data wizyty</label>
            <input type="date" style="width:200px;" class="form-control" name="date" />
        </div>

        <input type="submit" value="Dodaj wizytę" class="btn btn-primary" />
    </form>

</div>
@endsection('content')
