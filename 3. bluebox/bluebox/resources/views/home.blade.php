@extends('template')

@section('content')
<br/>

<div class="conteiner" style="padding-left:20px; padding-right:20px; float:left;">
    <div class="card" style="width: 18rem;">
        <a href="{{ URL::to('/products') }}">
            <img class="card-img-top" src="/images/products.png" alt="Card image cap">
        </a>
        <div class="card-body">
        <h5 class="card-title">Products</h5>
        <a href="{{ URL::to('/products') }}" class="btn btn-primary">Show</a>
        </div>
    </div>
</div>

@if (Auth::user()->statusUser == 'client')

    <div class="conteiner" style="padding-left:20px; padding-right:20px; float:left;">
        <div class="card" style="width: 18rem;">
            <a href="{{ URL::to('/incomes/show') }}">
                <img class="card-img-top" src="/images/your_products.png" alt="Card image cap">
            </a>
            <div class="card-body">
            <h5 class="card-title">Your Product(s)</h5>
            <a href="{{ URL::to('/incomes/show') }}" class="btn btn-primary">Show</a>
            </div>
        </div>
    </div>

@else

<div class="conteiner" style="padding-left:20px; padding-right:20px; float:left;">
    <div class="card" style="width: 18rem;">
        <a href="{{ URL::to('/incomes') }}">
            <img class="card-img-top" src="/images/incomes.png" alt="Card image cap">
        </a>
        <div class="card-body">
        <h5 class="card-title">Customers and Incomes</h5>
        <a href="{{ URL::to('/incomes') }}" class="btn btn-primary">Show</a>
        </div>
    </div>
</div>

@endif

@endsection
