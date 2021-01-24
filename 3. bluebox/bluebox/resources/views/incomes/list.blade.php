@extends('template')

@section('title')
    @if (isset($title))
        | {{ $title }}
    @endif
@endsection

@section('content')
<h2 style="padding-left:50px; padding-top:20px; padding-bottom:20px;">Customers</h2>

<!-- TABLE -->

<div class="conteiner" style="padding-left:50px; padding-right:50px;">
    <table class="table" style="background-color: white;">
        <thead style="background-color: rgba(0, 0, 0, 0.01)">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Customer</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>

            @foreach($incomes as $income)
            <tr>
                <th scope="row">{{ $income->id }}</th>
                <td>{{ $income->user->name }} {{ $income->user->surname }}</td>
                <td>{{ $income->product->name }}</td>
                <td>{{ $income->product->price }} PLN</td>
                <td>{{ $income->created_at }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

<!-- END TABLE -->

@endsection
