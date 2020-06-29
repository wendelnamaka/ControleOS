<?php
require_once '../CONTROLLER/ModeloCtrl.php';
require_once '../CONTROLLER/EquipamentoCtrl.php';

$ctrl_mod = new ModeloCtrl();

$mod = '';

if (isset($_POST['btnProcurar'])) {

    $ctrl_equ = new EquipamentoCtrl();
    $mod = $_POST['modelo'];
    $equipes = $ctrl_equ->FiltrarEquipamento($mod);
}


$modelos = $ctrl_mod->ConsultarModelo();
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
                            <h2>Equipamento Consultar</h2>   
                            <h5>Consulte / Altere seus equipamentos nesta página</h5>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="adm_equipamento_consultar.php">

                        <div class="form-group" id="divModelo">
                            <label>Selecione o Modelo do Equipamento</label>
                            <select class="form-control" id="modelo" name="modelo">
                                <option value="">Selecione</option>
                                <?php
                                for ($i = 0; $i < count($modelos); $i++) {
                                    ?>

                                    <option value="<?= $modelos[$i]['id_modelo'] ?>" <?= $mod == $modelos[$i]['id_modelo'] ? 'selected' : '' ?> >

                                        <?= $modelos[$i]['nome'] ?>

                                    </option>

                                <?php } ?>
                            </select>
                            <label id="val_modelo" class="Validar"></label>
                        </div>         

                        <center><button type="submit" onclick="return Validar(5)" class="btn btn-info" name="btnProcurar">Procurar</button></center>
                    </form>
                    <hr/>


                    <?php
                    if (isset($equipes)) {
                        if (count($equipes) > 0) {
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
                                                            <th>Tipo</th>
                                                            <th>Modelo</th>
                                                            <th>Identificação</th>
                                                            <th>Descrição</th>
                                                            <th>Ação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php for ($i = 0; $i < count($equipes); $i++) { ?>
                                                            <tr class="odd gradeX">
                                                                <td><?= $equipes[$i]['nome_tipo'] ?></td>
                                                                <td><?= $equipes[$i]['nome'] ?></td>    
                                                                <td><?= $equipes[$i]['identificacao_equipamento'] ?></td>
                                                                <td><?= $equipes[$i]['descricao_equipamento'] ?></td>
                                                                <td><a href="adm_equipamento_alterar.php?cod=<?= $equipes[$i]['id_equipamento']?>" class="btn btn-warning btn-xs"  data-target="#">Alterar</a></td>
                                                            </tr>   
                                                        <?php } ?>
                                                    </tbody>
                                                </table>

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
    </body>

</html>
