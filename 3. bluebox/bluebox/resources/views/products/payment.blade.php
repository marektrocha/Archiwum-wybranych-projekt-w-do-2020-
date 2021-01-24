@extends('template')

@section('title')
    @if (isset($title))
        | {{ $title }}
    @endif
@endsection

@section('content')
<h2 style="padding-left:50px; padding-top:20px; padding-bottom:20px;">Payment</h2>

<div class="card" style="padding-left:50px; padding-right:50px;">

    <br/>
    W tym miejscu następuje obsługa płatności przez zewnętrznego dostawcę.<br/>
    Proces ten zostaje pominięty.<br/><br/>
    <form class="form-inline">
        <a href="{{ URL::to('products') }}">
            <button class="btn btn-sm btn-outline-secondary" type="button">Next</button>
        </a>
    </form>
<div>

@endsection
