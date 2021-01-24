@extends('doctors/template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <div class="text-center"><img src="img/fullmed.png"><BR><BR>
                    <h5>Rejestracja Pacjenta</h5>
                </div>

                <form action="{{ action('App\Http\Controllers\PatientController@store') }}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group">
                            <label for="name">Imię i nazwisko Pacjenta</label>
                            <input type="text" class="form-control" name="name" />
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" />
                        </div>

                        <div class="form-group">
                            <label for="password">Hasło</label>
                            <input type="password" class="form-control" name="password" />
                        </div>

                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="phone" class="form-control" name="phone" />
                        </div>

                        <div class="form-group">
                            <label for="address">Adres (opcjonalnie)</label>
                            <input type="address" class="form-control" name="address" />
                        </div>

                        <div class="form-group">
                            <label for="pesel">PESEL</label>
                            <input type="text" class="form-control" name="pesel" />
                        </div>

                        <input type="hidden" name="status" value="Active" />

                        <input type="submit" value="Rejestracja Pacjenta" class="btn btn-primary" />
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
