@extends('layouts.app')
@section('content')
@include('layouts.headers.cards-form')

<div class="container p-1">

    <div class="card shadow">
        <div class="card-header">
            <div class="card-title">
                <h2>Nova proposta</h2>
            </div>
            <!-- errors -->
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    @if( isset($errors) && count(($errors)) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error )
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('formulario.update', $proposta) }}" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                @method('PUT')
                <input type="hidden" value="{{ auth()->user()->idate }}">
                <h3 class="">Estabelecimento:</h3>
                <div class="row p-3">
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="company_type" id="radio1" value="correspondente" checked>
                        <label class="form-check-label" for="radio1">
                            Correspondente
                        </label>
                    </div>
                    <div class="form-check form-check-inline col ">
                        <input class="form-check-input" type="radio" name="company_type" id="radio2" value="franquia">
                        <label class="form-check-label" for="radio2">
                            Franquia
                        </label>
                    </div>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="company_type" id="radio3" value="propria">
                        <label class="form-check-label" for="radio3">
                            Própria
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <label for="razaoSocial">Razão Social: *</label>
                        <input type="text" id="razaoSocial" name="company_name" class="form-control" value="{{ $proposta->company_name }}" required>
                    </div>
                    <div class="col-sm">
                        <label for="cidade">Cidade: *</label>
                        <input type="text" id="cidade" name="company_city" class="form-control" value="{{ $proposta->company_city }}" required>
                    </div>
                    <div class="col-sm">
                        <label for="emailResposta">E-mail para resposta: *</label>
                        <input type="email" id="emailResposta" name="company_replyemail" class="form-control" value="{{ $proposta->company_replyemail }}" required>
                    </div>
                </div>

                <h3 class="pt-1">Tomador:</h3>
                <div class="row pt-3">
                    <div class="col-sm col-md-4">
                        <label for="nomeTomador">Nome: *</label>
                        <input type="text" id="nomeTomador" name="customer_name" class="form-control" value="{{ $proposta->customer_name }}" required>
                    </div>
                    <div class="col-sm col-md-4">
                        <label for="cpfTomador">CPF: *</label>
                        <input type="text" id="cpfTomador" name="customer_cpf" class="form-control cpf" value="{{ $proposta->customer_cpf }}" required>
                    </div>
                    <div class="col-sm col-md-4">
                        <label for="salarioTomador">Salário mensal R$: *</label>
                        <input type="text" id="salarioTomador" name="customer_monthly_salary" class="form-control money" value="{{ $proposta->customer_monthly_salary }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="valorSolicitado">Valor do empréstimo R$:</label> 
                        <input type="text" class="form-control money" name="value" id="valorSolicitado" value="{{ $proposta->value }}" required>
                    </div>
                    <div class="col-sm-6">
                       <label for="nParcelas"> Número de parcelas: x </label>
                        <input type="number" class="form-control" id="nParcelas" name="number_installments" value="{{ $proposta->number_installments }}" required>
                    </div>
                </div>

                <h3 class="pt-1">Avalista:</h3>
                <div class="form-row pt-2">
                    <div class="col-md-4">
                        <label for="nomeAvalista">Nome: *</label>
                        <input type="text" id="nomeAvalista" name="guarantor_name" class="form-control" value="{{ $proposta->guarantor_name }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="cpfAvalista">CPF: *</label>
                        <input type="text" id="cpfAvalista" name="guarantor_cpf" class="form-control cpf" value="{{ $proposta->guarantor_cpf }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="salarioAvalista">Salário mensal R$: *</label>
                        <input type="text" id="salarioAvalista" name="guarantor_monthly_salary" class="form-control money" value="{{ $proposta->guarantor_monthly_salary }}" required>
                    </div>
                </div>
                <div class="row-form">
                    <label for="termoConsulta">Termo para consulta:</label>
                    <input type="file" class="form-control" id="termoConsulta" name="documents" value="{{ $proposta->documents ?? '' }}">
                </div>
                <div class="row justify-content-center pt-3">
                    <input type="submit" class="btn btn-primary" value="Salvar">
                    <input type="reset" class="btn btn-danger" value="Limpar campos">
                </div>

            </form>
        </div>
    </div>

</div>
@endsection