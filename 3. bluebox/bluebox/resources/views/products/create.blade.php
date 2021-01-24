@extends('template')

@section('title')
    @if (isset($title))
        | {{ $title }}
    @endif
@endsection

@section('content')
<h2 style="padding-left:50px; padding-top:20px; padding-bottom:20px;">Edit Product</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="conteiner" style="padding-left:50px; padding-right:50px;">
    <form action="{{ action('App\Http\Controllers\ProductController@store') }}" method="POST" role="form">

        <!-- Zabezpieczenie przed wysyłką poza formularzem -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <div class="form-group">

            <label for="name">Name of product</label>
            <input style="width:80%;" type="text" class="form-control" name="name" />

            <label for="content">Content</label>
            <input style="width:80%;" type="text" class="form-control" name="content" />

            <label for="amount">Amount</label>
            <input style="width:80%;" type="text" class="form-control" name="amount" />

            <label for="price">Price <span style="color:rgba(0, 0, 0, 0.4)">(for example: 9.99)</a></label>
            <input style="width:80%;" type="text" class="form-control" name="price" /><br/>

            <label for="statusProduct">Status of product</label>
            <select style="width:150px;" class="form-control" name="statusProduct">
                <option>Avability</option>
                <option>Unavability</option>
            </select>
        </div>
        <input type="submit" value="Add product" class="btn btn-primary"/>
    </form>
<div>

@endsection
