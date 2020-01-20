@extends('layouts.app')

@section('content')
@include('layouts.headers.cards-form')
<div class="container p-1">
    <div class="table-responsive">
        <table id="table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Tomador</th>
                    <th>Companhia</th>
                    <th>Status</th>
                    <th>E-mail</th>
                    <th>Data da solicitação</th>
                    <th>Valor R$</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($propostas as $p)
                    <tr>
                        <td>{{ $p->customer_name }} </td>
                        <td>{{ $p->company_name }}</td>
                        <td>{{ $p->status }}</td>
                        <td><a href="mailto:{{ $p->company_replyemail }}">{{ $p->company_replyemail }}</a> </td>
                        <td>{{ date("d/m/y", strtotime($p->created_at))  }} </td>
                        <td>{{ $p->value }}</td>
                        <td><a href="{{ route('formulario.show', $p) }}" class="btn btn-light">visualizar </a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Tomador</th>
                    <th>Companhia</th>
                    <th>Status</th>
                    <th>E-mail</th>
                    <th>Data da solicitão</th>
                    <th>Valor R$</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>


@endsection