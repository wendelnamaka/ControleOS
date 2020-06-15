function Validar(tela) {

    var ret = true;

    switch (tela) {

        case 1: // adm_setor_gerenciar

            if ($("#nome").val().trim() == '') {

                $("#val_nome").show().html("Preencha o campo Nome:");
                ret = false;
            } else {
                $("#val_nome").hide();

            }

            if ($("#email").val().trim() == '')
            {
                $("#val_email").show().html("Preencha o seu email :");
                ret = false;

            } else
            {
                $("#val_email").hide();
                $("#divEmail").removeClass("has-error");
            }

            if ($("#telefone").val().trim() == '') {

                $("#val_tel").show().html("Preencha o seu telefone:");
                ret = false;
            } else {

                $("#val_tel").hide();
            }
            if ($("#endereco").val().trim() == '') {

                $("#val_end").show().html("Preencha o seu endereço:");
                ret = false;
            } else {

                $("#val_end").hide();
            }
            if ($("#setor").val().trim() == '') {

                $("#val_setor").show().html("Selecione o seu setor");
                ret = false;

            } else {

                $("#val_setor").hide();

            }
            if ($("#tipo").val().trim() == '') {

                $("#val_tipo").show().html("Selecione o tipo de equipamento");
                ret = false;
            } else {

                $("#val_tipo").hide();
            }
            break;

// adm_funcionario_novo
        case 2:
            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Selecionar o campo TIPO");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").removeClass("has-error");
            }

            if ($("#nome").val().trim() == '') {
                $("#val_nome").show().html("Preencher o campo NOME");
                $("#divNome").addClass("has-error");
                ret = false;
            } else {
                $("#val_nome").hide();
                $("#divNome").removeClass("has-error");
            }


            if ($("#tipo").val().trim() != 1) {


                if ($("#setor").val().trim() == '') {
                    $("#val_setor").show().html("Selecionar o campo SETOR");
                    $("#divSetor").addClass("has-error");
                    ret = false;
                } else {
                    $("#val_setor").hide();
                    $("#divSetor").removeClass("has-error");
                }

                if ($("#email").val().trim() == '') {
                    $("#val_email").show().html("Prencher o campo E-MAIL");
                    $("#divEmail").addClass("has-error");
                } else {
                    $("#val_email").hide();
                    $("#divEmail").removeClass("has-error");
                }

                $.post("assets/ajax/validar_email.php", {email_user: email, acao: 'I'}, function (ret) {

                    if (ret == '1') {
                        $("#val_email").show().html("Email já existente");
                        $("#divEmail").addClass("has-error");
                        ret = false;
                    } else {
                        $("#val_email").hide();
                        $("#divEmail").removeClass("has-error");
                    }
                });


                if ($("#telefone").val().trim() == '') {
                    $("#val_tel").show().html("Preencher o campo TELEFONE");
                    $("#divTelefone").addClass("has-error");
                    ret = false;
                } else {
                    $("#val_tel").hide();
                    $("#divTelefone").removeClass("has-error");
                }

                if ($("#endereco").val().trim() == '') {
                    $("#val_end").show().html("Preencher o campo ENDEREÇO");
                    $("#divEndereco").addClass("has-error");
                    ret = false;
                } else {
                    $("#val_endereco").hide();
                    $("#divEndereco").removeClass("has-error");
                }
            }
            break;

// adm_tipo_gerenciar
        case 3:
            if ($("#nome_tipo").val().trim() == '') {
                $("#val_nome_tipo").show().html("Preeencha o campo");
                $("#divNomeTipo").addClass("has-error");
                ret = false;
            } else {
                $("#nome_tipo").hide();
                $("#divNomeTipo").removeClass("has-error");
            }


            break;
    }

    return ret;

}

function ExibirTipo(tipo) {

    // Verifica se p tipo é ADM 
    if (tipo == 1) {
        $("#divNomeFunc").show();
        $("#divGeral").hide();
        $("#val_nome").hide();

    } else if (tipo == 2 || tipo == 3) { //Caso contrário mostra os demais campos
        $("#divNomeFunc").show();
        $("#divGeral").show();
        $("#val_nome, #val_setor, #val_email, #val_tel, #val_end").hide();
    } else {
        $("#divNomeFunc").hide();
        $("#divGeral").hide();
    }

}

function ValidarEmail(acao) {


    if (acao == 1) {
        var email = $("#email").val().trim();

        $.post("assets/ajax/validar_email.php", {
            email_user: email,
            acao: 'I'

        }, function (ret) {
            if (ret == '1') {
                $("#val_email").show().html("Email já existente");
                $("#divEmail").addClass("has-error");
                ret = false;
            } else {
                $("#val_email").hide();
                $("#divEmail").removeClass("has-error");
            }


        });

    } else if (acao == 2) {
        
        $.post("assets/ajax/validar_email.php", {
            email_user: $("#email_alt_func").val(),
            idUser: $("#cod_func_alt").val(),
            acao: 'A'
        }, function (ret) {

            if (ret == '1') {
                $("#val_email").show().html("Email já existente");
                $("#divEmail").addClass("has-error");
                ret = false;
            } else {
                $("#val_email").hide();
                $("#divEmail").removeClass("has-error");
            }
        });
    }
}