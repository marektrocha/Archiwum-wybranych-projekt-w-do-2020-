@extends('doctors/template')

@section('title')
    @if (isset($title))
     | {{ $title }}
    @endif
@endsection

@section('content')
<div class="conteinter">
    <div class="card-body">
        <div class="card-body" style="background:white; margin-left:5%; margin-right:5%;">
            <div class="text-center"><img src="../img/fullmed.png"></div>
            <div class="card-header">
                {{ $patient->name }}
            </div>

        <div class="card-body">

            <table class="table">
                <tr>
                    <td>Imię i nazwisko:</td>
                    <td>{{ $patient->name }}</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>{{ $patient->email }}</td>
                </tr>
                <tr>
                    <td>Telefon:</td>
                    <td>{{ $patient->phone }}</td>
                </tr>
                <tr>
                    <td>Adres:</td>
                    <td>{{ $patient->addres }}</td>
                </tr>
                <tr>
                    <td>PESEL:</td>
                    <td>{{ $patient->pesel }}</td>
                </tr>
            </table>

        </div>
    </div>
</div>
@endsection('content')
