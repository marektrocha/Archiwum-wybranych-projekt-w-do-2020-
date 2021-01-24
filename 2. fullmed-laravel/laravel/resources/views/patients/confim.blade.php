@extends('doctors/template')

@section('title')
    @if (isset($title))
     | {{ $title }}
    @endif
@endsection

@section('content')
<div class="text-center">
    <div class="text-center"><img src="../img/fullmed.png"><BR><BR>
        <h5>Rejestracja zakończona pomyślnie</h5>
    </div>
</div>
@endsection('content')
