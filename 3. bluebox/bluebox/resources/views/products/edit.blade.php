@extends('template')

@section('title')
    @if (isset($title))
        | {{ $title }}
    @endif
@endsection

@section('content')
<h2 style="padding-left:50px; padding-top:20px; padding-bottom:20px;">Add Product</h2>

<div class="conteiner" style="padding-left:50px; padding-right:50px;">
    <form action="{{ action('App\Http\Controllers\ProductController@editStore') }}" method="POST" role="form">

        <!-- Zabezpieczenie przed wysyłką poza formularzem -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <input type="hidden" name="id" value="{{ $product->id }}" />
        <div class="form-group">

            <label for="name">Name of product</label>
            <input style="width:80%;" type="text" class="form-control" name="name" value="{{ $product->name }}"/>

            <label for="content">Content</label>
            <input style="width:80%;" type="text" class="form-control" name="content" value="{{ $product->content }}"/>

            <label for="amount">Amount</label>
            <input style="width:220px;" type="text" class="form-control" name="amount" value="{{ $product->amount }}"/>

            <label for="price">Price <span style="color:rgba(0, 0, 0, 0.4)">(for example: 9.99)</a></label>
            <input style="width:220px;" type="text" class="form-control" name="price" value="{{ $product->price }}"/><br/>

            <label for="statusProduct">Status of product</label>
            <select style="width:220px;" class="form-control" name="statusProduct">
                <option>Avability</option>
                <option>Unavability</option>
            </select>
        </div>
        <input type="submit" value="Edit product" class="btn btn-primary"/>
    </form>
<div>

@endsection
