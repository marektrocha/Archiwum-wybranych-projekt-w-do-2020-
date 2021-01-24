@extends('doctors/template')

@section('title')
    @if (isset($title))
     | {{ $title }}
    @endif
@endsection

@section('content')
    <div class="card-body" style="background:white; margin-left:5%; margin-right:5%;">
        <div class="text-center"><img src="img/fullmed.png"></div>
        <h2>Lekarze</h2>

    <a href="{{ URL::to('doctors/create') }}">Dodaj nowego lekarza</a>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID lekarza</th>
            <th scope="col">Lekarz</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefon</th>
            <th scope="col">Specjalizacja</th>
            <th scope="col">Status</th>
            <th scope="col">Operacje</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($doctorsList as $doctor)
          <tr>
            <th scope="row">{{ $doctor->id }}</th>
          <td><a href="{{ URL::to('doctors/' . $doctor->id) }}">{{ $doctor->name }}</a></td>
            <td>{{ $doctor->email }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>
                <ul>
                @foreach ($doctor->specialisations as $specialisation)
                    <li>{{ $specialisation->name }}</li>
                @endforeach
                </ul>
            </td>
            <td>{{ $doctor->status }}</td>
            <td>
                <a href="{{ URL::to('doctors/delete/' . $doctor->id) }}" onclick="return confirm('Czy na pewno usunąć?')">Usuń lekarza</a><BR />
                <a href="{{ URL::to('doctors/edit/' . $doctor->id) }}">Edytuj lekarza</a>
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>

      @foreach ($statistics as $stat)
          @if ($stat->status == "Active")
            Liczba lekarzy dostępnych: {{ $stat->user_count }}<br/>
          @endif
          @if ($stat->status == "Inactive")
            Liczba lekarzy Niedostępnych: {{ $stat->user_count }}
          @endif
      @endforeach

    </div>
@endsection('content')
