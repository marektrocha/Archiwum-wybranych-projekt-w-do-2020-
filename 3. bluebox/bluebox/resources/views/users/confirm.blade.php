@extends('template')

@section('title')
    @if (isset($title))
        | {{ $title }}
    @endif
@endsection

@section('content')
<h2 style="padding:20px;">Thank you for register :)</h2>
    <div class="comteiner" style="padding:20px; width:75%;">
        Na tym etapie należy skonfigurować zmienne środowiskowe i umieścić w nich dane do wysyłki wiadomości
        poprzez usługę poczty e-mail. Dla celów niniejszego zadania etap ten zostanie pominięty. Po potwierdzeniu
        e-maila, użytkownikowi otwiera się następujący widok: <a href="{{ URL::to('/products') }}">kliknij tutaj, aby go zobaczyć</a>.
    </div>
@endsection
