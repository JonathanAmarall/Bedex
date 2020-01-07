@extends('layouts.app')

@section('content')

<div class="container p-5">

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

            <form class="form" action="{{ route('formulario.store') }}" method="POST">
                {!! csrf_field() !!}

                <h3 class="">Estabelecimento:</h3>
                <div class="form-row p-3">
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="company_type" id="radio1" value="correspondente" checked>
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

                <div class="form-row">
                    <div class="col">
                        <label for="razaoSocial">Razão Social: *</label>
                        <input type="text" id="razaoSocial" name="company_name" class="form-control" placeholder="Razão social" required>
                    </div>
                    <div class="col">
                        <label for="razaoSocial">Cidade: *</label>
                        <input type="text" id="razaoSocial" name="company_city" class="form-control" placeholder="cidade" required>
                    </div>
                    <div class="col">
                        <label for="emailResposta">E-mail para resposta: *</label>
                        <input type="email" id="emailResposta" name="company_replyemail" class="form-control" placeholder="exemplo@mail.com" required>
                    </div>
                </div>

                <h3 class="p-1">Tomador:</h3>
                <div class="form-row p-3">
                    <div class="col">
                        <label for="nomeTomador">Nome: *</label>
                        <input type="text" id="nomeTomador" name="customer_name" class="form-control" placeholder="Fulano de tal" required>
                    </div>
                    <div class="col">
                        <label for="cpfTomador">CPF: *</label>
                        <input type="text" id="emailResposta" name="customer_cpf" class="form-control" placeholder="000.000.000-00" required>
                    </div>
                    <div class="col">
                        <label for="salarioTomador">Salário Líquido mensal R$: *</label>
                        <input type="number" id="salarioTomador" name="customer_monthly_salary" class="form-control" placeholder="1500,00" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label for="valorSolicitado">Valor solicitado para empréstimo R$:</label>
                        <input type="number" class="form-control" name="value" id="valorSolicitado" required>
                    </div>
                    <div class="col">
                        <label for="valorSolicitado">Número de parcelas:</label>
                        <input type="number" class="form-control" name="number_installments" id="valorSolicitado" required>
                    </div>
                </div>

                <h3 class="p-1">Avalista:</h3>
                <div class="form-row p-2">
                    <div class="col">
                        <label for="nomeAvalista">Nome: *</label>
                        <input type="text" id="nomeAvalista" name="guarantor_name" class="form-control" placeholder="Fulano de tal" required>
                    </div>
                    <div class="col">
                        <label for="cpfAvalista">CPF: *</label>
                        <input type="text" id="cpfAvalista" name="guarantor_cpf" class="form-control" placeholder="000.000.000-00" required>
                    </div>
                    <div class="col">
                        <label for="salarioAvalista">Salário Líquido mensal R$: *</label>
                        <input type="number" id="salarioAvalista" name="guarantor_monthly_salary" class="form-control" placeholder="1500,00" required>
                    </div>
                </div>
                <div class="row-form">
                    <label for="termoConsulta">Termo para consulta:</label>
                    <input type="file" class="form-control" id="termoConsulta" name="documents">
                </div>
                <div class="row justify-content-center p-3">
                    <input type="submit" class="btn btn-primary" value="Enviar proposta">
                    <input type="reset" class="btn btn-danger" value="Limpar campos">
                </div>

            </form>


        </div>
    </div>

</div>
@endsection