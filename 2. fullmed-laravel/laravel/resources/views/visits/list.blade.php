@extends('doctors/template')

@section('title')
    @if (isset($title))
     | {{ $title }}
    @endif
@endsection

@section('content')
<div class="card-body" style="background:white; margin-left:5%; margin-right:5%;">
    <div class="text-center"><img src="img/fullmed.png"></div>
    <h2>Wizyty</h2>

    <a href="{{ URL::to('visits/create') }}">Dodaj wizytę</a>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Pacjent</th>
            <th scope="col">Lekarz</th>
            <th scope="col">Data</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($visits as $visit)
          <tr>
            <th scope="row">{{ $visit->id }}</th>
            <td>{{ $visit->patient->name }} <span style="color:gray">(PESEL: {{ $visit->patient->pesel }})</span></td>
            <td>{{ $visit->doctor->name }}</td>
            <td>{{ $visit->data }}</td>
          </tr>
        @endforeach

        </tbody>
      </table>
    </div>
@endsection('content')
