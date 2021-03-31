var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},

spOptions = {
    onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
};

$(".maskCep").mask("00000-000");
$(".maskCnpj").mask("00.000.000/0000-00");
$(".maskCpf").mask("000.000.000-00");
$('.maskTel').mask(SPMaskBehavior, spOptions);
$('.maskNumber').mask("##0", {reverse: true});
$('.maskStock').mask("##0.00", {reverse: true});
$('.maskMoney3').mask("##0,00", {reverse: true});
$('.maskMoney2').mask("##0.00", {reverse: true});
$('.maskMoney').mask('000.000.000,00', {reverse: true});

function somenteNumeros(num) {

    var er = /[^0-9.]/;
    er.lastIndex = 0;
    var campo = num;
    
    if (er.test(campo.value)) {
        campo.value = "";
    }

}