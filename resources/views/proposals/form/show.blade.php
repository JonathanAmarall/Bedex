@extends('layouts.app')
@section('content')
@include('layouts.headers.cards-form')
<div class="container p-2">

    <div class="row">
        <div class="col-sm-8 mb-3 mb-sm-0 pt-3">
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
        </div>

        <div class="col-xl-8 mb-4 mb-xl-0">
            <div class="card card-profile shadow">
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
                    @include('proposals.form.delete', ['proposta' => $proposta])
                    @endrole
                </div>
            </div>
        </div>

        <div class="col-xl-8 mb-4 mb-xl-0">
            <div class="accordion" id="accordion">
                <div class="card shadow">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h3>Observações <i class="fas fa-sort-down"></i></h3>
                            </button>
                            <button class="btn btn-link float-right" data-toggle="modal" data-target="#Modal"><i class="fas fa-plus-circle text-success fa-2x"></i></button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table ">
                                    <tbody>
                                        @foreach($obs as $o)
                                        <tr>
                                            <td>{{ date("d/m/y", strtotime($o->created_at)) }}</td>
                                            <td>{{ $o->obs }}</td>
                                            <form action="{{  route('obsDestroy', [$proposta, $o]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td> <button class="btn btn-link"><i class="fas fa-times text-danger"></i></button></td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal add obs -->
                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Adicionar observação:</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('obsStore', $proposta) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="proposal_id" value="{{ $proposta->id }}">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Observação:</label>
                                        <textarea name="obs" class="form-control" rows="5" id="message-text"></textarea>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection