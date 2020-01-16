@extends('layouts.app')
@section('content')
@include('layouts.headers.cards-form')
<div class="container p-2">
    <div class="row">
        <div class="col-xl-8 mb-4 mb-xl-0">
            <div class="card card-profile  shadow">
                <div class="card-header bg-transparent">
                    <strong>
                        <h2>Dados da Proposta:</h2>
                    </strong>
                    <p>Valor solicitado: <strong>{{ $proposta->value }}</strong></p>
                    <p>Em: <strong>{{ $proposta->number_installments }}X</strong></p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Tomador') }}</h6>
                            <p>Nome: <strong> {{ $proposta->customer_name }}</strong> </p>
                            <p>CPF: <strong> {{ $proposta->customer_cpf }}</strong> </p>
                            <p>Salário mensal:<strong>R$ {{ $proposta->customer_monthly_salary }}</strong> </p>
                        </div>
                        <div class="col-6">
                            <h6 class="heading-small text-muted mb-4">{{ __('Informações do Avalista') }}</h6>
                            <p>Nome: <strong>{{ $proposta->guarantor_name }}</strong> </p>
                            <p>CPF: <strong>{{ $proposta->guarantor_cpf }}</strong> </p>
                            <p>Salário mensal: <strong>R$ {{ $proposta->guarantor_monthly_salary }}</strong> </p>
                        </div>
                        <label for="obs">Observação:</label>
                        <textarea class="form-control" name="obs" id="obs" cols="15" rows="2"></textarea>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <h6 class="heading-small text-muted mb-4">{{ __('Informações da companhia') }}</h6>
                            <p> Tipo:<strong> {{ $proposta->company_type }}</strong> </p>
                            <p> Razão Social:<strong> {{ $proposta->company_name }}</strong> </p>
                            <p> E-mail:<strong> {{ $proposta->company_replyemail }}</strong> </p>
                            <p> Cidade:<strong> {{ $proposta->company_city }}</strong> </p>
                        </div>
                        <div class="col-sm-6">
                            <p> Cadastrado em: <strong>{{ date("d/m/y", strtotime($proposta->created_at)) }} </strong></p>
                            <a class="btn btn-white" href="{{ route('download', $proposta) }}">Download do Documento <i class="fas fa-file-pdf"></i></a>
                            <div class="pt-4">
                                <a href="{{ route('formulario.edit', $proposta ) }}" class="btn btn-light">Editar</a>
                                @if($proposta->avaliable == true)
                                <a href="#" class="btn btn-success">Finalizar cadastro</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <h3 class="text-white float-right">Proposta: ID {{ $proposta->id }}</h3>
                    Status:
                </div>
                <div class="card-body">
                    <div class="text-white">
                        <p align="center" id="status" class="p-3">{{$proposta->status }}</p>
                    </div>
                    <hr>
                    @role('admin')
                    <form action="{{ route('alterProposal', $proposta) }}" method="POST">
                        {!! csrf_field() !!}

                        <div class="row text-white">
                            <label for="alterarStatus">Alterar Status:</label>
                            <select class="form-control" name="status" id="alterarStatus">
                                <option selected>...</option>
                                <option value="Aprovado">Aprovado</option>
                                <option value="Pré-aprovado">Pré-aprovado</option>
                                <option value="Em análise">Em análise</option>
                                <option value="Reprovado">Reprovado</option>
                            </select>
                        </div>
                        <div class="row pt-5">
                            <button class="btn btn-primary btn-lg btn-block">alterar</button>
                        </div>
                    </form>
                </div>
                @include('proposals.form.delete', ['proposta' => $proposta])
                @endrole
            </div>
        </div>
    </div>
    <script src="{{ url('js/AlterBgColorStatus.js') }}"></script>
    @endsection