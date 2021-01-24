@extends('template')

@section('title')
    @if (isset($title))
        | {{ $title }}
    @endif
@endsection

@section('content')
<h2 style="padding-left:50px; padding-top:20px; padding-bottom:20px;">{{ $productBuy->name }}</h2>

<div class="card" style="padding-left:50px; padding-right:50px;">

    <br/>
    <strong>Content</strong>{{ $productBuy->content }}<br/><br/>
    <strong>Price</strong>{{ $productBuy->price }} PLN<br/><br/>
    <strong>Amount</strong>{{ $productBuy->amount }}<br/><br/>

    <form action="{{ action('App\Http\Controllers\ProductController@buystore') }}" method="POST" role="form">

        <!-- Zabezpieczenie przed wysyłką poza formularzem -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="id" value="{{ $productBuy->id }}" />

        <input style="width:100px;" type="submit" value="Buy" class="btn btn-primary"/>
    </form>
<div>

@endsection
