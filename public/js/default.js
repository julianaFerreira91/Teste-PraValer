$(document).ready(function() {
    $('input[name="cpf"]').mask('000.000.000-00', {reverse: true});
    $('input[name="cnpj"]').mask('00.000.000/0000-00', {reverse: true});
    $('input[name="cellphone"]').mask('00000-0000');
});