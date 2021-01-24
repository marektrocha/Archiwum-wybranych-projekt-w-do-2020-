@extends('doctors/template')

@section('title')
    @if (isset($title))
     | {{ $title }}
    @endif
@endsection

@section('content')
<div class="card-body" style="background:white; margin-left:5%; margin-right:5%;">
    <div class="text-center"><img src="img/fullmed.png"></div>
    <h2>Pacjenci</h2>

       <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Lekarz</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefon</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($patientsList as $patient)
          <tr>
            <th scope="row">{{ $patient->id }}</th>
          <td><a href="{{ URL::to('patients/' . $patient->id) }}">{{ $patient->name }}</a></td>
            <td>{{ $patient->email }}</td>
            <td>{{ $patient->phone }}</td>
          </tr>
        @endforeach

        </tbody>
      </table>
    </div>
@endsection('content')
