@extends('layouts.app')
@section('content')
@include('layouts.headers.cards-form')
<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('simulatorUpdate') }}">
        <div class="card shadow">
            <div class="card-header">
                <h2>Configurações das taxas:</h2>
            </div>
            <div class="card-body">
                <div class=" row form-group">
                    <div class="col-sm-3">
                        <label for="txtJuros">Taxa de Juros:</label>
                        <input type="text" class="form-control" value="{{ $config->interestRate }}" name="interestRate" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Tarifa de cobrança:</label>
                        <input type="text" class="form-control" value="{{ $config->collectionFee }}" name="collectionFee" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Tarifa de cadastro:</label>
                        <input type="text" class="form-control" value="{{ $config->registrationFee }}" name="registrationFee" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Tarifa de consulta:</label>
                        <input type="text" class="form-control" value="{{ $config->consultationFee }}" name="consultationFee" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <h2>Configurações do campo "valor do empréstimo":</h2>
            </div>
            <div class="card-body">
                <div class=" row form-group">
                    <div class="col-sm-3">
                        <label for="txtJuros">Valor inicial:</label>
                        <input type="text" class="form-control" value="{{ $config->inputRangeLoanVal }}" name="inputRangeLoanVal" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Valor do salto:</label>
                        <input type="number" class="form-control" value="{{ $config->inputRangeLoanStep }}" name="inputRangeLoanStep" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Valor mínimo:</label>
                        <input type="number" class="form-control" value="{{ $config->inputRangeLoanMin }}" name="inputRangeLoanMin" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Valor máximo:</label>
                        <input type="number" class="form-control" value="{{ $config->inputRangeLoanMax }}" name="inputRangeLoanMax" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <h2>Configurações do campo "Quantas vezes":</h2>
            </div>
            <div class="card-body">
                <div class=" row form-group">
                    <div class="col-sm-3">
                        <label for="txtJuros">Valor inicial:</label>
                        <input type="number" class="form-control" value="{{ $config->inputRangeTimesVal }}" name="inputRangeTimesVal" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Valor do salto:</label>
                        <input type="number" class="form-control" value="{{ $config->inputRangeTimesStep }}" name="inputRangeTimesStep" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Valor mínimo:</label>
                        <input type="number" class="form-control" value="{{ $config->inputRangeTimesMin }}" name="inputRangeTimesMin" required>
                    </div>
                    <div class="col-sm-3">
                        <label for="txtJuros">Valor máximo:</label>
                        <input type="number" class="form-control" value="{{ $config->inputRangeTimesMax }}" name="inputRangeTimesMax" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pb-3">
                <input type="submit" class="btn btn-primary" value="Salvar">
                <input type="reset" class="btn btn-danger" value="Limpar">
            </div>
        </div>
    </form>
</div>
@endsection