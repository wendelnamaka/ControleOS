<?php
require_once '../CONTROLLER/ChamadaCtrl.php';
require_once '../CONTROLLER/UtilCtrl.php';

$situacao = '';


if (isset($_POST['btnPesquisar'])) {
$crtl = new ChamadaCtrl();

$situacao = $_POST['situacao'];

$chamados = $crtl->FiltrarChamadosTecnicos($situacao);
}
?>﻿
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
                            <h2>Consultar Chamados</h2>   
                        </div>
                    </div>

                    <hr />

                    <form method="post" action="tec_consultar_chamados.php">

                        <div class="form-group" id="divModelo">

                            <select class="form-control" name="situacao">
                                <option value="0"<?= $situacao == 0 ? 'selected' : '' ?>>Todos</option>
                                <option value="1"<?= $situacao == 1 ? 'selected' : '' ?>>Aguardando atendimento</option>
                                <option value="2"<?= $situacao == 2 ? 'selected' : '' ?>>Em atendimento</option>
                                <option value="3"<?= $situacao == 3 ? 'selected' : '' ?>>Finalizado</option>

                            </select>

                        </div>

                        <label id="val_modelo" class="Validar"></label>

                        <center><button type="info" class="btn btn-info"  name="btnPesquisar">Procurar</button></center>

                    </form>
                    <hr/>

                    <?php if (isset($chamados)) { ?>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Cadastrados
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Abertura</th>
                                                    <th>Equipamento</th>
                                                    <th>Problema</th>
                                                    <th>Situacao Abertura</th>
                                                    <th>Técnico Atendimento </th>
                                                    <th>Atendimento</th>
                                                    <th>Laudo</th>
                                                    <th>Ação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i = 0;
                                                $i<count($chamados);
                                                $i++){ ?>

                                                <tr class="odd gradeX">
                                                    <td><?= UtilCtrl::MostrarData($chamados[$i]['data_abertura']) ?> <small>ás</small> <?= UtilCtrl::MostrarHora($chamados[$i]['hora_abertura']) ?></td>
                                                    <td><?= $chamados[$i]['identificacao_equipamento'] ?> / <?= $chamados[$i]['descricao_equipamento'] ?></td>
                                                    <td><?= $chamados[$i]['descricao_problema'] ?></td>
                                                    <td><?= UtilCtrl::RetornaSituacao($chamados[$i]['situacao']) ?></td>
                                                    <td><?= $chamados[$i]['nome_tecnico'] == '' ? '---' : $chamados[$i]['nome_tecnico'] ?></td>
                                                    <td><?= $chamados[$i]['data_atendimento'] == '' ? '---' : UtilCtrl::MostrarData($chamados[$i]['data_atendimento']) . 'small>ás</small>' . UtilCtrl::MostrarHora($chamados[$i]['hora_atendimento']) ?></td>
                                                    <td><?= $chamados[$i]['laudo_atendimento'] == '' ? '---' : $chamados[$i]['laudo_atendimento'] ?></td></td>
                                                    <td>
                                                        <?php if($chamados[$i]['situacao'] == 3){ ?>
                                                        <?= UtilCtrl::RetornaSituacao($chamados[$i]['situacao']) ?>
                                                        <?php } else if($chamados[$i]['situacao'] == 1) {?>
                                                        <a href="tec_atender_chamado.php?cod=<?= $chamados[$i]['id_chamado'] ?>" class="btn btn-warning btn-xs">Atender</a> 
                                                        <?php } else if($chamados[$i]['situacao'] == 2) {?>
                                                        <a href="tec_atender_chamado.php?cod=<?= $chamados[$i]['id_chamado'] ?>" class="btn btn-success btn-xs">Finalizar</a> 
                                                        <?php } ?>
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
<?php } ?>
                </div>
            </div>


    </body>
</html>
