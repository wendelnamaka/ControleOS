<?php
require_once '../CONTROLLER/ChamadaCtrl.php';
require_once '../CONTROLLER/EquipamentoCtrl.php';
require_once '../CONTROLLER/UtilCtrl.php';

UtilCtrl::VerTipoPermissao(1);
$crtl_equip = new EquipamentoCtrl();
$idEquip = '';
if(isset($_POST['btnProcurar'])){
    $idEquip = $_POST['equip'];
    $ctrl_chamado = new ChamadaCtrl();
    $res = $ctrl_chamado->DetalharHistoricoChamados($idEquip);
}


$equipamentos = $crtl_equip->ConsultarEquipamento();

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
                            <h2>Historico de chamados do equipamento</h2>   
                            <h5>Aqui você poder consultar e gerar um PDF dos chamados de um determinado equipamento</h5>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="adm_historico_equipamento.php">
                        
                      <div class="form-group" id="divTipo">
                            <label>Equipamento</label>
                            <select class="form-control" id="tipo" name="equipamento">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($equipamentos); $i++) { ?>

                                    <option value="<?= $equipamentos[$i]['id_equipamento'] ?>"<?= $idEquip == $equipamentos[$i]['id_equipamento'] ? 'selected' : '' ?> >

                                        <?= $equipamentos[$i]['identificacao_equipamento'] ?> / <?= $equipamentos[$i]['descricao_equipamento'] ?>

                                    </option>

                                <?php } ?>
                            </select>
                            <label id="val_tipo" class="Validar"></label>
                        </div>        

                        <center><button type="submit" onclick="return Validar(9)" class="btn btn-info" name="btnProcurar">Procurar</button></center>
                    </form>
                    <hr/>


                    <?php
                    if (isset($res)) {
                        if (count($res) > 0) {
                            ?>

                            <div class="row">

                                <div class="col-md-12">
                                    <!-- Advanced Tables -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Funcionarios Cadastrados
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Atendimento</th>
                                                            <th>Abertura</th>
                                                            <th>Problema</th>
                                                            <th>Situação</th>
                                                            <th>Equipamento</th>
                                                            <th>Laudo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php for ($i = 0; $i < count($res); $i++) { ?>
                                                            <tr class="odd gradeX">
                                                                <td><?= UtilCtrl::MostrarData($res[$i]['hora_abertura']) ?></td>
                                                                <td><?= UtilCtrl::RetornaSituacao($res[$i]['situacao_chamado']) ?></td>    
                                                                <td><?= $res[$i]['data_atendimento'] == '' ? '' : UtilCtrl::MostrarData($res) ?></td>
                                                                <td><?= $res[$i]['identificacao_equipamento'] ?> / <?= $res[$i]['descricao_equipamento'] ?></td>
                                                                <td><?= $res[$i]['laudo_atendimento'] ?></td>
                                                                <td><?= $res[$i]['laudo_atendimento'] ?></td>
                                                                <td><a target="_blank" href="adm_equipamento_alterar.php?cod=<?= $res[$i]['id_equipamento'] ?>" class="btn btn-warning btn-xs"  data-target="#">Alterar</a></td>
                                                            </tr>   
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                
                                                <a href="adm_historico_equipamento_imprimir.php?">

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        } else
                            ExibirMsg(2);
                        ?>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>

</html>
