
function InserirSetor() {

    $.post("assets/ajax/gerenciar_setor_ajax.php",
            {
                nome: $("#nome").val().trim(),
                acao: 'I'

            }, function (ret) {

        $("#msg").html(ret);
        $("nome").val('');
    });



    $.post("assets/ajax/gerenciar_setor_ajax.php",
            {
                acao: 'C'

            }, function (ret) {
             
             alert(ret);

    });






}


