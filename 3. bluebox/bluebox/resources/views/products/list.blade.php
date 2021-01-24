@extends('template')

@section('title')
    @if (isset($title))
        | {{ $title }}
    @endif
@endsection

@section('content')
<h2 style="padding-left:50px; padding-top:20px; padding-bottom:20px;">Products</h2>

<!-- TABLE -->

@if (Auth::user()->statusUser == 'admin')
    <div class="conteiner" style="padding-left:50px; padding-right:50px;">
        <table class="table" style="background-color: white;">
            <thead style="background-color: rgba(0, 0, 0, 0.01)">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name od prodact</th>
                    <th scope="col">Content</th>
                    <th scope="col">Amount

                        <select class="form" name="forma" onchange="location = this.value;">
                            <option value="#">-- Select --</option>
                            <option value="{{ action('App\Http\Controllers\ProductController@index') }}">All</option>
                            <option value="{{ action('App\Http\Controllers\ProductController@amountZero') }}">0</option>
                            <option value="{{ action('App\Http\Controllers\ProductController@amountFive') }}">More than 5</option>
                        </select>

                    </th>
                    <th scope="col">Price</th>
                    <th scope="col">Status of product

                        <select class="form" name="forma" onchange="location = this.value;">
                            <option value="#">-- Select --</option>
                            <option value="{{ action('App\Http\Controllers\ProductController@index') }}">All</option>
                            <option value="{{ action('App\Http\Controllers\ProductController@indexAvability') }}">Avability</option>
                            <option value="{{ action('App\Http\Controllers\ProductController@indexUnavability') }}">Unavability</option>
                        </select>

                    </th>
                    <th scope="col">Buy / download</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach($productsList as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->content }}</td>
                    <td>{{ $product->amount }}</td>
                    <td>{{ $product->price }} PLN</td>
                    <td>{{ $product->statusProduct }}</td>
                    <td>
                        @if (($product->amount != 0) && ($product->statusProduct == 'Avability'))
                            <form class="form-inline">
                                <a href="{{ URL::to('products/buy/' . $product->id) }}">
                                    <button class="btn btn-sm btn-outline-secondary" type="button">Buy / download</button>
                                </a>
                            </form>
                        @endif
                    </td>
                    <td><a href="{{ URL::to('products/edit/' . $product->id) }}">Edit</a></td>
                    <td><a href="{{ URL::to('products/delete/' . $product->id) }}" onclick="return confirm('Delete the product?')">Delete</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@else
    <div class="conteiner" style="padding-left:50px; padding-right:50px;">
        <table class="table" style="background-color: white;">
            <thead style="background-color: rgba(0, 0, 0, 0.01)">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name od prodact</th>
                    <th scope="col">Content</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status of product</th>
                    <th scope="col">Buy / download</th>
                </tr>
            </thead>
            <tbody>

                @foreach($productsList as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->content }}</td>
                    <td>
                        @if ($product->statusProduct == 'Avability')
                            {{ $product->amount }}
                        @endif
                    </td>
                    <td>{{ $product->price }} PLN</td>
                    <td>{{ $product->statusProduct }}</td>
                    <td>
                        @if (($product->amount != 0) && ($product->statusProduct == 'Avability'))
                            <form class="form-inline">
                                <a href="{{ URL::to('products/buy/' . $product->id) }}">
                                    <button class="btn btn-sm btn-outline-secondary" type="button">Buy / download</button>
                                </a>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endif

<!-- END TABLE -->

@endsection
