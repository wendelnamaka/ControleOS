<?php
require_once '../VO/ModeloVO.php';
require_once '../CONTROLLER/ModeloCtrl.php';
require_once '../CONTROLLER/UtilCtrl.php';

require_once './_msg.php';

$ctrl = new ModeloCtrl();
UtilCtrl::VerTipoPermissao(1);

if (isset($_POST['btnSalvar'])) {

    $nome_modelo = $_POST['nome'];
    $vo = new ModeloVO();

    $vo->setNome($nome_modelo);
    $ret = $ctrl->InserirModelo($vo);
} else if (isset($_POST['btnAlterar'])) {

    $vo = new ModeloVO();
    $vo->setId_modelo($_POST['cod']);
    $vo->setNome($_POST['nome_alt']);

    $ret = $ctrl->AlterarModelo($vo);
} else if (isset($_POST['btnExcluir'])) {

    $id = $_POST['cod'];
    $ret = $ctrl->ExcluirModelo($id);
}

$modelo = $ctrl->ConsultarModelo();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include_once '_head.php';
        ?>
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
                            <?php
                            if (isset($ret)) {

                                ExibirMsg($ret);
                            }
                            ?>   
                            <h2>Novo Modelo</h2>   
                            <h5>Gerencie todos os modelos nesta página</h5>

                        </div>
                    </div>

                    <hr />

                    <form method="post" action="adm_modelo_gerenciar.php">
                        <div class="form-group" id="divModelo">
                            <label>Nome do modelo</label>
                            <input class="form-control" placeholder="Digite aqui......." name="nome" id="nome"/>
                            <label class="Validar"id="val_setor"></label>
                        </div>

                        <center><button type="submit" class="btn btn-success" name="btnSalvar" onclick="return Validar(4)">Salvar</button></center>

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
                                            <?php for ($i = 0; $i < count($modelo); $i++) { ?>

                                                <tr class="odd gradeX">
                                                    <td><?= $modelo[$i]['nome'] ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalAlterar" onclick="return AlterarDados('<?= $modelo[$i]['nome'] ?>', <?= $modelo[$i]['id_modelo'] ?>)">Alterar</a>
                                                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modExcluir" onclick="return CarregarDadosExclusao('<?= $modelo[$i]['nome'] ?>', <?= $modelo[$i]['id_modelo'] ?>)">Excluir</a>
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
                        <h4 class="modal-title" id="myModalLabel">Alterar modelo</h4>
                    </div>
                    <form method="post" action="adm_modelo_gerenciar.php">
                        <div class="modal-body">
                            <div class="form-group" id="divNome">
                                <input type="hidden" name="cod" id="cod" />
                                <label>Nome do modelo</label>
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
        <form method="post" action="adm_modelo_gerenciar.php">
            <?php
            include_once '_modal_exclusao.php';
            ?>
        </form>

        <script>

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
