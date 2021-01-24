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
                {{ $doctor->name }}
            </div>


        <div class="card-body">

            <table class="table">
                <tr>
                    <td>Name:</td>
                    <td>{{ $doctor->name }}</td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td>{{ $doctor->email }}</td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td>{{ $doctor->phone }}</td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>{{ $doctor->addres }}</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td>{{ $doctor->status }}</td>
                </tr>
                <tr>
                    <td>Specjalizacja(e)</td>
                    <td>
                        <ul>
                        @foreach ($doctor->specialisations as $specialisation)
                            <li>{{ $specialisation->name }}</li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
            </table>

        </div>
    </div>
</div>
@endsection('content')
