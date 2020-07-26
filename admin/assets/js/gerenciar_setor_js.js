
function InserirSetor() {

$.post("assets/ajax/gerenciar_setor_ajax.php",
        {
        nome: $("#nome").val().trim(),
                acao: 'I'

                }, function (ret) {

        $("#msg").html(ret);
        $("nome_setor").val('');
        
                
        $.post("assets/ajax/gerenciar_setor_ajax.php",
                {
                acao: 'C'
                }, function (ret) {

        $("#tabSetores").html(ret);
        };

        });


}




