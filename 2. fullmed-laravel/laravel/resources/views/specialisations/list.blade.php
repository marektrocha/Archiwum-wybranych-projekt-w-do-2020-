@extends('doctors/template')

@section('title')
    @if (isset($title))
     | {{ $title }}
    @endif
@endsection

@section('content')
<div class="card-body" style="background:white; margin-left:5%; margin-right:5%;">
    <div class="text-center"><img src="../img/fullmed.png"></div>
    <h2>Specjalizacje</h2>

    <a href="{{ URL::to('specialisations/create') }}">Dodaj nową specjaliację</a>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID Specjalizacji</th>
            <th scope="col">Nazwa</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($specialisations as $specialisation)
          <tr>
            <th scope="row">{{ $specialisation->id }}</th>
            <td><a href="{{ URL::to('doctors/specialisations/' .$specialisation->id) }}">{{ $specialisation->name }}</a></td>
          </tr>
        @endforeach

        </tbody>
      </table>
    </div>
@endsection('content')
