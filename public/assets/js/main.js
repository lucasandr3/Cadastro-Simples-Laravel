$(document).ready(function ($) {
    /* =========== MASK FIELDS + VALIDATION ======== */
    /* == PHONE MASK == */
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 0 0000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.phone').mask(SPMaskBehavior, spOptions);


    // == CPF AND CNPJ MASK ==
    var CpfCnpjMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
    },
        cpfCnpjpOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
            }
        };
    $('.cpf_cnpj').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    /* === END MASK FIELDS === */

    $('.cpf').mask('000.000.000-00', { reverse: true });
    $('.cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('.data_nascimento').mask('00/00/0000');
    $('.rg').mask('00.000.000');
});

$('.cpf_cnpj').keyup(function(e) {
    if($(this).val().length === 14) {
        document.querySelector('.pessoa_fisica').style.display = "flex"
    } else {
        document.querySelector('.pessoa_fisica').style.display = "none"
    }
});