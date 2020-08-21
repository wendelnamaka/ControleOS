<?php
require_once '../CONTROLLER/SetorCtrl.php';
require_once '../CONTROLLER/EquipamentoCtrl.php';
require_once '../VO/AlocarVO.php';
require_once '../CONTROLLER/UtilCtrl.php';

//UtilCtrl::VerificarPermissao(1);

$ctrl_set = new SetorCTRL();
$setor = '';

if (isset($_POST['btnProcurar'])) {

    $ctrl_equ = new EquipamentoCtrl();
    $setor = $_POST['setor'];
    $equipes = $ctrl_equ->FiltrarEquipamentoSetor($setor);
} else if (isset($_POST['btnRemover'])) {

    $vo = new AlocarVO();
    $ctrl_equ = new EquipamentoCtrl();

    $vo->setId_alocar($_POST['codAloc']);
    $ret = $ctrl_equ->RemoverEquipamento($vo);
}

$setores = $ctrl_set->ConsultarSetor();
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
                            <h2>Remover Equipamento</h2>   
                            <h5>Remova os equipamentos dos setores onde estão alocados.</h5>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                    <form method="post" action="adm_equipamento_remover.php">

                        <div class="form-group" id="divSetor">
                            <label>Setor</label>
                            <select class="form-control" id="setor" name="setor">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($setores); $i++) { ?>
                                    <option value="<?= $setores[$i]['id_setor'] ?>" <?= $setor == $setores[$i]['id_setor'] ? 'selected' : '' ?> >

                                        <?= $setores[$i]['nome_setor'] ?>

                                    </option>

                                    <?php
                                }
                                ?>
                            </select>
                            <label id="val_setor" class="Validar"></label>

                        </div>

                        <center><button type="submit" onclick="return Validar(10)" class="btn btn-info" name="btnProcurar">Procurar</button></center>
                    </form>

                    <hr />

                    <?php
                    if (isset($equipes)) {
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Advanced Tables -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Lista de equipamento e setor alocado
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Equipamento</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for ($i = 0; $i < count($equipes); $i++) { ?>

                                                        <tr class="odd gradeX">
                                                            <td><?= $equipes[$i]['identificacao_equipamento'] ?> - <?= $equipes[$i]['descricao_equipamento'] ?> </td>
                                                            <td>
                                                                <a href="#"class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modalRemover" onclick="AbrirRemover('<?= $equipes[$i]['identificacao_equipamento'] ?> - <?= $equipes[$i]['descricao_equipamento'] ?>', '<?= $equipes[$i]['id_alocar'] ?>')">Remover</a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>                                                
                                                </tbody>
                                            </table>
                                            <!-- começo modal -->


                                            <div class="modal fade" id="modalRemover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">Remover Equipamento</h4>
                                                        </div>
                                                        <form method="post" action="adm_equipamento_remover.php">
                                                            <div class="modal-body">
                                                                <div class="form-group" id="divNome">
                                                                    <input type="hidden" name="codAloc" id="codAloc" />
                                                                    <label>Deseja remover o equipamento:</label><b><label id="equip_remove"></label> ?</b>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                                <button class="btn btn-primary" name="btnRemover">Confimar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Fim modal -->

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </body>
</html>