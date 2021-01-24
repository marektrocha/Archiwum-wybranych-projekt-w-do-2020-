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
        <h2>Dodaj specjalizację</h2>

    <form action="{{ action('App\Http\Controllers\SpecialisationController@store') }}" method="POST" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="form-group">
            <label for="name">Nazwa specjalizacji:</label>
            <input type="text" class="form-control" name="name" />
        </div>
        <input type="submit" value="Dodaj specjalizację" class="btn btn-primary" />
    </form>

</div>
@endsection('content')
