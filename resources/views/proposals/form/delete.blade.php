<form class="p-3" action="{{ route('formulario.destroy', $proposta) }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger">Excluir</button>
</form>