@extends('template')

@section('title')
    @if (isset($title))
        | {{ $title }}
    @endif
@endsection

@section('content')
<h2 style="padding:20px;">Customers</h2>

    <!-- TABLE -->

    <table class="table">
        <thead style="background-color: rgba(0, 0, 0, 0.01)">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">E-mail</th>
                <th scope="col">Product(s)</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>Zakupione produkty</td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <!-- END TABLE -->

@endsection
