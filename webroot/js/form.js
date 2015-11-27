(function($) {
    "use strict";

    /*
    * AJAX FORM
    */
    jQuery('.ajax-form').submit(function() {

        var $valid = jQuery(this).valid();
        if(!$valid) return false;

        var form          = jQuery(this);
        var data          = form.serializeJSON();
        var type          = 'GET';
        var callback      = '';

        if(data._method)   {type = data._method; delete data._method;}
        if(data._callback) {callback = data._callback; delete data._callback;}

        jQuery.ajax({
            type: type,
            url: form.attr('action'),
            data: JSON.stringify(data),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            xhrFields: {withCredentials: true},
            beforeSend: function (request) {
                form.find('.loading').removeClass('hide');
            },
            success: function (data, status, jqXHR) {
                if(callback) {
                    eval(callback + '(data, form, status, jqXHR);')
                }
                form.find('.loading').addClass('hide');
                form.find('input[type="submit"]').prop( "disabled", false );
            },
            error: function (jqXHR, status) {
                if(callback) {
                    eval(callback + '(JSON.parse(jqXHR.responseText), form, status, jqXHR);')
                }
                form.find('.loading').addClass('hide');
                form.find('input[type="submit"]').prop( "disabled", false );
            }
        });
        return false;
    });

    /*
    * VALIDATE
    */
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo &eacute; obrigatório.",
        remote: "Por favor, corrija este campo.",
        email: "Por favor, forne&ccedil;a um endere&ccedil;o eletr&ocirc;nico v&aacute;lido.",
        url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
        date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
        dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
        dateDE: "Bitte geben Sie ein gültiges Datum ein.",
        number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lida.",
        numberDE: "Bitte geben Sie eine Nummer ein.",
        digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
        creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
        equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
        accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
        maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
        range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
        max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
        min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
    });

    var formValid = {
        errorPlacement: function(label, element) {
                jQuery('<span class="arrow"></span>').insertBefore(element);
                jQuery('<span class="error"></span>').insertAfter(element).append(label)
            }
    };
    jQuery("form.validate").validate(formValid);
    jQuery("form.validate-dois").validate(formValid);
    jQuery("form.validate-tres").validate(formValid);

    jQuery.validator.addMethod("dateBR", function (value, element) {
        //contando chars
        if (value.length != 10) return (this.optional(element) || false);
        // verificando data
        var data = value;
        var dia = data.substr(0, 2);
        var barra1 = data.substr(2, 1);
        var mes = data.substr(3, 2);
        var barra2 = data.substr(5, 1);
        var ano = data.substr(6, 4);
        if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return (this.optional(element) || false);
        if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return (this.optional(element) || false);
        if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return (this.optional(element) || false);
        if (ano < 1900) return (this.optional(element) || false);
        return (this.optional(element) || true);
    }, "Informe uma data válida");

    jQuery.validator.addMethod("datetimeBR", function (value, element) {
        //contando chars
        if (value.length != 16) return (this.optional(element) || false);
        // dividindo data e hora
        if (value.substr(10, 1) != ' ') return (this.optional(element) || false); // verificando se hÃ¡ espaÃ§o
        var arrOpcoes = value.split(' ');
        if (arrOpcoes.length != 2) return (this.optional(element) || false); // verificando a divisÃ£o de data e hora
        // verificando data
        var data = arrOpcoes[0];
        var dia = data.substr(0, 2);
        var barra1 = data.substr(2, 1);
        var mes = data.substr(3, 2);
        var barra2 = data.substr(5, 1);
        var ano = data.substr(6, 4);
        if (data.length != 10 || barra1 != "/" || barra2 != "/" || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) return (this.optional(element) || false);
        if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) return (this.optional(element) || false);
        if (mes == 2 && (dia > 29 || (dia == 29 && ano % 4 != 0))) return (this.optional(element) || false);
        // verificando hora
        var horario = arrOpcoes[1];
        var hora = horario.substr(0, 2);
        var doispontos = horario.substr(2, 1);
        var minuto = horario.substr(3, 2);
        if (horario.length != 5 || isNaN(hora) || isNaN(minuto) || hora > 23 || minuto > 59 || doispontos != ":") return (this.optional(element) || false);
        return this.optional(element) || true;
    }, "Informe uma data e uma hora válida");

    jQuery.validator.addMethod("time", function (value, element) {
        if (value.replace("__:__", "").replace("_", "").replace(":", "").length == 0) return true;
        if (value.length != 5) return false;
          var data = value;
              var hor = data.substr(0, 2);
              var se1 = data.substr(2, 1);
              var min = data.substr(3, 2);
              //var se2 = data.substr(5, 1);
              //var seg = data.substr(6, 2);
          if (data.length != 5 || se1 != ':' || isNaN(hor) || isNaN(min)){
            return false;
          }
          if (!((hor>=0 && hor<=23) && (min>=0 && min<=59))){
            return false;
          }
          return true;
    }, "Por favor, uma hora válida");

    jQuery.validator.addMethod("cpf", function (value, element) {
        value = jQuery.trim(value);

        value = value.replace('.', '');
        value = value.replace('.', '');
        cpf = value.replace('-', '');
        while (cpf.length < 11) cpf = "0" + cpf;
        var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
        var a = [];
        var b = new Number;
        var c = 11;
        for (var i = 0; i < 11; i++) {
            a[i] = cpf.charAt(i);
            if (i < 9) b += (a[i] * --c);
        }
        if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
        b = 0;
        c = 11;
        for (y = 0; y < 10; y++) b += (a[y] * c--);
        if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return this.optional(element) || false;
        return this.optional(element) || true;
    }, "Informe um CPF válido.");

    jQuery.validator.addMethod("cnpj", function (cnpj, element) {
        cnpj = jQuery.trim(cnpj);

        // DEIXA APENAS OS NÃšMEROS
        cnpj = cnpj.replace('/', '');
        cnpj = cnpj.replace('.', '');
        cnpj = cnpj.replace('.', '');
        cnpj = cnpj.replace('-', '');

        var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
        digitos_iguais = 1;

        if (cnpj.length < 14 && cnpj.length < 15) {
            return this.optional(element) || false;
        }
        for (i = 0; i < cnpj.length - 1; i++) {
            if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {
                digitos_iguais = 0;
                break;
            }
        }

        if (!digitos_iguais) {
            tamanho = cnpj.length - 2
            numeros = cnpj.substring(0, tamanho);
            digitos = cnpj.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;

            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2) {
                    pos = 9;
                }
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0)) {
                return this.optional(element) || false;
            }
            tamanho = tamanho + 1;
            numeros = cnpj.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2) {
                    pos = 9;
                }
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1)) {
                return this.optional(element) || false;
            }
            return this.optional(element) || true;
        } else {
            return this.optional(element) || false;
        }
    }, "Informe um CNPJ válido.");

    jQuery.validator.addMethod("phone", function (value, element) {
        value = value.replace("(", "");
        value = value.replace(")", "");
        value = value.replace("-", "");
        value = value.replace("_", "");
        value = value.replace(" ", "");
        return this.optional(element) || /[0-9]{10}/.test(value);
    }, "Por favor, um telefone válido");

    jQuery.validator.addMethod("mobile", function (value, element) {
        value = value.replace("(", "");
        value = value.replace(")", "");
        value = value.replace("-", "");
        value = value.replace("_", "");
        value = value.replace(" ", "");
        return this.optional(element) || /[0-9]{10}/.test(value) || /[0-9]{11}/.test(value);
    }, "Informe um celular válido.");

    jQuery.validator.addMethod("cep",function(e,t){
        return this.optional(t)||/^\d{5}-\d{3}?$/.test(e)
    }, "Informe um CEP válido.");

    jQuery.validator.addMethod("compare", function( value, element ) {
        var element2 = jQuery(element).attr('rel');
        if (value != jQuery('#'+element2).val()) {
                return false;
        }
        return true;
    }, "Valor inválido. Deve ser igual.");

    jQuery.validator.addMethod("one-decimal",function(e,t){
        return this.optional(t)||/^(\d)+(\.\d)?$/.test(e)
    }, "Informe um Número válido.");

    $.validator.addMethod("site", function(value, element) {
        if(value.substr(0,7) != 'http://'){
            value = 'http://' + value;
        }
        if(value.substr(value.length-1, 1) != '/'){
            value = value + '/';
        }
        return this.optional(element) || /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(value); 
    }, "Informe uma URL v&aacute;lida.");

    $(".site").change(function() {
        if($(this).valid()) {
            value = $(this).val();
            if(value.substr(0,7) != 'http://'){
                value = 'http://' + value;
            }
            if(value.substr(value.length-1, 1) != '/'){
                value = value + '/';
            }
            $(this).val(value);
        }
    });

    //auto trim
    $("input, textarea").change(function() {
        $(this).val( $.trim($(this).val()) );
    });

    /*
    * Mask
    */
    jQuery(document).ready(function() {
        init_masks();
    })

    /*
    * CEP
    */
    jQuery(".cep, .zip").keyup(function(e) {
        var v = jQuery(this).val().replace('_','').replace('_','');
        if(v.length >= 8) {
            jQuery('.loading-cep').show();
            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+jQuery(".cep, .zip").val(), function(){
                if(resultadoCEP["tipo_logradouro"]){
                    jQuery(".endereco, .address").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
                    jQuery(".bairro, .neighborhood").val(unescape(resultadoCEP["bairro"]));
                    if(jQuery(".cidade, .city").is("input")) {
                        jQuery(".cidade, .city").val(unescape(resultadoCEP["cidade"]));
                    } else {
                        jQuery('.cidade, .city').find('option[text="'+unescape(resultadoCEP["cidade"])+'"]').attr('selected', 'selected');
                    }
                    if(jQuery(".estado, .state").is("input")) {
                        jQuery(".estado, .state").val(unescape(resultadoCEP["uf"]));
                    } else {
                        jQuery('.estado, .state').find('option[text="'+unescape(resultadoCEP["uf"])+'"]').attr('selected', 'selected');
                    }
                    jQuery(".pais, .country").val('Brasil');
                }
                jQuery('.loading-cep').hide();
            });
        }
    });

    /*
    * ToolTip
    */
    jQuery('[data-toggle="tooltip"]').tooltip({container: 'body'});
    if(jQuery().qtip) {
        $('[data-toggle="qtip"]').qtip({
            content: {
                attr: 'data-original-title'
            },
            style: {
                classes: 'qtip-dark qtip-shadow'
            },
            position: {
                my: 'bottom left',
                at: 'top right',
                target: 'mouse'
            }
        });
    }

    /*
     * Contadores TextAreas
     */
    if(jQuery().maxlength) {
        $('.maxlength').maxlength({
            alwaysShow: true,
            warningClass: "label label-info",
            limitReachedClass: "label label-warning",
            placement: 'bottom',
            message: 'Quantidade Restante de Caracteres: %charsTyped% de %charsTotal%.'
        });
    }

    /*
     * Date Range Picker
     */
    if(jQuery().daterangepicker) {
        $('.daterangepick').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY',
                daysOfWeek: [
                    'Dom',
                    'Seg',
                    'Ter',
                    'Qua',
                    'Qui',
                    'Sex',
                    'Sab'
                ],
                monthNames: [
                    'Janeiro',
                    'Fevereiro',
                    'Março',
                    'Abril',
                    'Maio',
                    'Junho',
                    'Julho',
                    'Augosto',
                    'Setembro',
                    'Outubro',
                    'Novembro',
                    'Dezembro'
                ],
            },
            autoApply: true,
        });
    }

    /*
     * iCheck
     */
    if ($(".icheck-me").length > 0) {
        $(".icheck-me").each(function () {
            var $el = $(this);
            var skin = ($el.attr('data-skin') !== undefined) ? "_" + $el.attr('data-skin') : "",
                color = ($el.attr('data-color') !== undefined) ? "-" + $el.attr('data-color') : "";

            var opt = {
                checkboxClass: 'icheckbox' + skin + color,
                radioClass   : 'iradio' + skin + color,
                increaseArea : "10%"
            }

            $el.iCheck(opt);
        });
    }

    /*
     * Sliders Numbers
     */
    if(jQuery().slider) {
        $('.slider-number, .slider-pixel').slider({
            formatter: function(value) {
                return value;
            }
        });
        $('.slider-number').on("slide", function(slideEvt) {
            var rel = $(this).attr('rel');
            $("#"+rel).text(slideEvt.value);
        });
        $('.slider-pixel').on("slide", function(slideEvt) {
            var rel = $(this).attr('rel');
            $("#"+rel).text(slideEvt.value+'px');
        });
    }

    /*
    * Editor
    */
    if(jQuery().wysihtml5) {
        $('.text-editor').wysihtml5();
    } if(jQuery().summernote) {
        $('.text-editor-summernote').summernote({
            height: "500px",
            lang: 'pt-BR',
            toolbar: [
                ['place', ['placeholders']],
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['icons', ['fontawesomes']],
                ['view', ['fullscreen']],
                ['code', ['codeview']]
            ],
            colors: [
                ['#FF5E00', '#003A65', '#76ACD5', '#FEFEED', '#f5f5e4', '#F8F8F8', '#202020', '#666666'],
                ['#000000', '#424242', '#636363', '#9C9C94', '#CEC6CE', '#EFEFEF', '#F7F7F7', '#FFFFFF'],
                ['#FF0000', '#FF9C00', '#FFFF00', '#00FF00', '#00FFFF', '#0000FF', '#9C00FF', '#FF00FF'],
                ['#F7C6CE', '#FFE7CE', '#FFEFC6', '#D6EFD6', '#CEDEE7', '#CEE7F7', '#D6D6E7', '#E7D6DE'],
                ['#E79C9C', '#FFC69C', '#FFE79C', '#B5D6A5', '#A5C6CE', '#9CC6EF', '#B5A5D6', '#D6A5BD'],
                ['#E76363', '#F7AD6B', '#FFD663', '#94BD7B', '#73A5AD', '#6BADDE', '#8C7BC6', '#C67BA5'],
                ['#CE0000', '#E79439', '#EFC631', '#6BA54A', '#4A7B8C', '#3984C6', '#634AA5', '#A54A7B'],
                ['#9C0000', '#B56308', '#BD9400', '#397B21', '#104A5A', '#085294', '#311873', '#731842'],
                ['#630000', '#7B3900', '#846300', '#295218', '#083139', '#003163', '#21104A', '#4A1031']
            ],
            onpaste: function (e) {
                //the normal browser paste function removes all formatting:
                var clpData = ((e.originalEvent || e).clipboardData || window.clipboardData);
                if (clpData) {
                    var bufferText = clpData.getData('text/plain');
                    e.preventDefault();
                    window.setTimeout(function() {
                        document.execCommand('insertText', false, bufferText);
                    }, 0);
                }
            }
        });
        $('.form-editor-summernote').submit(function( event ) {
            $('.text-editor-summernote').html($('.text-editor-summernote').code());
            //event.preventDefault();
        });
    }

})(jQuery);

/*
* Mask
*/
function init_masks() {
    jQuery(".date, .dateBR").mask("99/99/9999", {autoclear: 0});
    jQuery(".hour, .time").mask("99:99");
    jQuery(".cep, .zip").mask("99999-999", {autoclear: 0});
    jQuery(".cpf").mask("999.999.999-99");
    jQuery(".cnpj").mask("99.999.999/9999-99");
    jQuery(".alphanumeric1").mask("*",{placeholder:''});
    jQuery(".alphanumeric2").mask("*?*",{placeholder:''});
    jQuery(".alphanumeric3").mask("*?**",{placeholder:''});
    jQuery(".phone").mask("(99) 9999-9999",{placeholder:''});
    jQuery('.currency').autoNumeric('init', {aSep: '.', aDec: ',', mDec: '2', aSign: '', aPad: true });
    jQuery('.decimal').autoNumeric('init', {aSep: '.', aDec: ',', mDec: '2', aSign: '', aPad: true });
    jQuery('.mobile').focusout(function(){
        var phone, element;
        element = jQuery(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if(phone.length > 10) {
            element.mask("(99) 99999-999?9",{placeholder:''});
        } else {
            element.mask("(99) 9999-9999?9",{placeholder:''});
        }
    });
    jQuery('.mobile').blur();
    jQuery('.thousand').keyup(function(){
        var value, element;
        element = jQuery(this);
        value = element.val().replace(/\D/g, '');
        value = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
        element.val(value);
    });
    jQuery('.numeric').keyup(function(){
        var value, element;
        element = jQuery(this);
        value = element.val().replace(/\D/g, '');
        element.val(value);
    });
    jQuery('.numeric-dot').keyup(function(){
        var value, element;
        element = jQuery(this);
        value = element.val().replace(',', '.');
        value = value.replace(/[^0-9\.]/g, '');
        element.val(value);
    });
    jQuery('.address-number').keyup(function(){
        var value, element;
        element = jQuery(this);
        value = element.val();
        if(value.charAt(0)=='s' || value.charAt(0)=='S') {
            element.val('s/n');
        } else {
            value = value.replace(/\D/g, '');
            value = value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
            element.val(value);
        }
    });
    jQuery('.currency').focusout(function(){
        var value, element;
        element = jQuery(this);
        value = element.val();
        if((value.indexOf(',') == -1) && value) {
            element.val(value+',00');
        } else if(value) {
            var dec = value.split(',');
            if(dec.length>1) {
                var dec = dec[1].length;
                if(dec==1) {
                    element.val(value+'0');
                }
            }
        }
    });
    jQuery('.currency').blur();
    jQuery('.decimal').focusout(function(){
        var value, element;
        element = jQuery(this);
        value = element.val();
        if(value) {
            var dec = value.split(',');
            if(dec.length>1) {
                var dec = dec[1].length;
                if(dec==1) {
                    element.val(value+'0');
                }
            }
        }
    });
    jQuery('.decimal').blur();
    if(jQuery().capitalize) {
        jQuery('.capitalize').capitalize();
    }
}