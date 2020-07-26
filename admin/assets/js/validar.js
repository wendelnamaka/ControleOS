function Validar(tela) {

    var ret = true;

    switch (tela) {

        case 1: // adm_setor_gerenciar

            //NOME 
            if ($("#nome").val().trim() == '') {
                $("#val_nome").show().html("Preencher o campo NOME");
                $("#divNome").addClass("has-error");
                ret = false;
            } else {
                $("#val_nome").hide();
                $("#divNome").removeClass("has-error");
            }

            //EMAIL 
            if ($("#email").val().trim() == '') {
                $("#val_email").show().html("Preencha o seu email :");
                $("#divEmail").addClass("has-error");
                ret = false;
            } else {
                $("#val_email").hide();
                $("#divEmail").removeClass("has-error");
            }


            //TELEFONE

            if ($("#telefone").val().trim() == '') {
                $("#val_tel").show().html("Preencha o seu telefone:");
                $("#divTelefone").addClass("has-error");
                ret = false;
            } else {
                $("#val_tel").hide();
                $("#divTelefone").removeClass("has-error");
            }

            //ENDERECO

            if ($("#endereco").val().trim() == '') {
                $("#val_end").show().html("Preencha o seu endereço:");
                $("#divEndereco").removeClass("has-error");
                ret = false;
            } else {

                $("#val_end").hide();
                $("#divEndereco").removeClass("has-error");

            }

            //TIPO

            if ($("#tipo").val().trim() == '') {

                $("#val_tipo").show().html("Selecione o tipo de equipamento:");
                $("#divTipo").removeClass("has-error");

                ret = false;
            } else {

                $("#val_tipo").hide();
                $("#divTipo").removeClass("has-error");

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
            if ($("#sobrenome").val().trim() == '') {
                $("#val_nome_sobrenome").show().html("Preencher o campo SOBRENOME");
                $("#divNome_sobrenome").addClass("has-error");
                ret = false;
            } else {
                $("#val_nome_sobrenome").hide();
                $("#divNome_sobrenome").removeClass("has-error");
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

            // adm_modelo_gerenciar
        case 4:

            if ($("#nome").val().trim() == '') {
                $("#val_nome").show().html("Preeencha o campo do nom do modelo");
                $("#divModelo").addClass("has-error");
                ret = false;
            } else {
                $("#val_nome").hide();
                $("#divModelo").removeClass("has-error");
            }
            break;


            // adm_equipamento_novo && adm_equipamento_consultar

        case 5:
            // TIPO

            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Selecione o tipo de equipamento");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").removeClass("has-error");
            }

            // MODELO

            if ($("#modelo").val().trim() == '') {
                $("#val_modelo").show().html("Selecione o tipo de modelo");
                $("#divModelo").addClass("has-error");
                ret = false;
            } else {
                $("#val_modelo").hide();
                $("#divModelo").removeClass("has-error");
            }

            // IDENTIFICACAO

            if ($("#identificacao").val().trim() == '') {
                $("#val_identificacao").show().html("Preeencha o campo identificacao");
                $("#divIdentificacao").addClass("has-error");
                ret = false;
            } else {
                $("#val_identificacao").hide();
                $("#divIdentificacao").removeClass("has-error");
            }
            // DESCRICAO

            if ($("#descricao").val().trim() == '') {
                $("#val_descricao").show().html("Preeencha o campo descricao");
                $("#divDescricao").addClass("has-error");
                ret = false;
            } else {
                $("#val_descricao").hide();
                $("#divDescricao").removeClass("has-error");
            }

            break;


        case 6:
            // NOME_MODELO
            if ($("#nome_modelo").val().trim() == '') {
                $("#val_nome_modelo").show().html("Selecione o modelo do equipamento");
                $("#divModelo").addClass("has-error");
                ret = false;
            } else {
                $("#val_nome_modelo").hide();
                $("#divModelo").removeClass("has-error");
            }


            break;


        case 7:
            //adm_setor_gerenciar
            // NOME_SETOR
            if ($("#nome").val().trim() == '') {
                $("#val_nome_setor").show().html("Por favor digite nome do setor");
                $("#divNomeSetor").addClass("has-error");
                ret = false;
            } else {
                $("#nome").hide();
                $("#divNomeSetor").removeClass("has-error");
            }


            break;
            
        case 8:
            //adm_funcionario_consultar
            if ($("#tipo").val().trim() == '') {
                $("#val_tipo").show().html("Por favor o selecione o tipo");
                $("#divTipo").addClass("has-error");
                ret = false;
            } else {
                $("#val_tipo").hide();
                $("#divTipo").removeClass("has-error");
            }

            break;
            
        case 9:
            //adm_funcionario_consultar
            if ($("#modelo").val().trim() == '') {
                $("#val_modelo").show().html("Por favor o selecione o modelo");
                $("#divModelo").addClass("has-error");
                ret = false;
            } else {
                $("#val_modelo").hide();
                $("#divModelo").removeClass("has-error");
            }

            break;
   
        case 10:
            //adm_funcionario_consultar
            if ($("#setor").val().trim() == '') {
                $("#val_setor").show().html("Por favor o selecione o setor");
                $("#divSetor").addClass("has-error");
                ret = false;
            } else {
                $("#val_setor").hide();
                $("#divSetor").removeClass("has-error");
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