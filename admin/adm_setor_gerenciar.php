<?php
require_once '../VO/SetorVO.php';
require_once '../CONTROLLER/SetorCtrl.php';
require_once './_msg.php';

$ctrl = new SetorCTRL();

if (isset($_POST['btnSalvar'])) {

    $nome_setor = $_POST['nome'];
    $vo = new SetorVO();

    $vo->setNome_setor($nome_setor);
    $ret = $ctrl->InserirSetor($vo);
    
} else if (isset($_POST['btnAlterar'])) {

    $vo = new SetorVO();
    echo '<pre>', print_r($_POST['btnAlterar']), '</pre>';

    $vo->setId_setor($_POST['cod']);
    $vo->setNome_setor($_POST['nome_alt']);

    $ret = $ctrl->AlterarSetor($vo);
} else if (isset($_POST['btnExcluir'])) {

    $id = $_POST['cod'];
    $ret = $ctrl->ExcluirSetor($id);
}

$setores = $ctrl->ConsultarSetor();
//echo '<pre>',print_r($setores),'</pre>';
//echo  '<prev>';
  //print_r($setores);
//echo  '</prev>';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include_once '_head.php';
        ?>
        <script src="assets/js/gerenciar_setor_js.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wrapper">
            <?php
            include_once '_topo.php';
            include_once '_menu.php';
            ?>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="msg">
                            <?php
                            if (isset($ret)) {

                                ExibirMsg($ret);
                            }
                            ?>
                            </div>
                            <h2>Novo Setor</h2>   
                            <h5>Cadastre um novo setor nesta página.</h5>

                        </div>
                    </div>

                    <hr />

                    <form method="post" action="adm_setor_gerenciar.php">

                        <div class="form-group" id="divNomeSetor">
                            <label>Nome do setor</label>
                            <input class="form-control" placeholder="Digite o nome do novo setor" name="nome" id="nome"/>
                            <label class="Validar"id="val_nome_setor"</label>
                        </div>

                        <center><button type="submit" class="btn btn-success" name="btnSalvar" onclick="return InserirSetorAjax()">Salvar</button></center>

                    </form>

                    <hr/>
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Setores Cadastrados
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 0; $i < count($setores); $i++) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $setores[$i]['nome_setor'] ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalAlterar" onclick="return AlterarDados('<?= $setores[$i]['nome_setor'] ?>', <?= $setores[$i]['id_setor'] ?>)">Alterar</a>
                                                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modExcluir" onclick="return CarregarDadosExclusao('<?= $setores[$i]['nome_setor'] ?>', <?= $setores[$i]['id_setor'] ?>)">Excluir</a>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Alterar setor</h4>
                    </div>
                    <form method="post" action="adm_setor_gerenciar.php">
                        <div class="modal-body">
                            <div class="form-group" id="divNome">
                                <input type="hidden" name="cod" id="cod" />
                                <label>Nome do setor</label>
                                <input class="form-control" placeholder="Digite o nome do novo setor" name="nome_alt" id="nome_alt"/>
                                <label class="Validar"id="val_nome"</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button class="btn btn-primary" name="btnAlterar">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <form method="post" action="adm_setor_gerenciar.php">
            <?php
            include_once '_modal_exclusao.php';
            ?>
        </form>

        <script>

            function InserirSetorAjax() {

            if (Validar(7) == true){

            InserirSetor();
                
            }

            return false;
            }

            function AlterarDados(nome, id) {

                $("#nome_alt").val(nome);
                $("#cod").val(id);

            }

            function ValidarCampos() {

                if ($("#nome").val().trim == '') {

                    alert("Preeencher o nome campo");
                    return false;
                }
            }
        </script>

    </body>
</html>
