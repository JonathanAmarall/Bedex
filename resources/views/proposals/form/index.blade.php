@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<div class="container p-5">
    Minhas propostas


    <table id="example" class="display" style="width:100%">
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
                <td>{{ $p->reaplyemail }} </td>
                <td>{{ date("d/m/y", strtotime($p->created_at))  }} </td>
                <td>{{ number_format($p->value, 2,',', '')  }}</td>
                <td><a href="#">visualizar</a></td>
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "Exibir _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - desculpe",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtered from _MAX_ total de registros)"
            }
        });
    });
</script>

@endsection