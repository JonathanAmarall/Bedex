$(document).ready(function() {
    var texto = $("#status").text();

    let reprovado = "Reprovado";
    let pre_aprovado = "Pré-aprovado";
    let aprovado = "Aprovado";
    let em_analise = "Em análise";

    if (texto == em_analise) {
        $("#status").removeClass();
        $("#status").addClass('bg-info p-3')
    }
    if (texto == reprovado) {
        $("#status").removeClass();
        $("#status").addClass('bg-danger p-3')
    }
    if (texto == aprovado) {
        $("#status").removeClass();
        $("#status").addClass('bg-success p-3')
    }
    if (texto == pre_aprovado) {
        $("#status").removeClass();
        $("#status").addClass('bg-primary p-3')
    }
});