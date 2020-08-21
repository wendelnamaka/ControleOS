<?php
require_once '../CONTROLLER/EquipamentoCtrl.php';
require_once '../CONTROLLER/ChamadaCtrl.php';
require_once '../VO/ChamadaVO.php';

$ctrl_equip = new EquipamentoCtrl();

if (isset($_POST['btnFinalizar'])) {
    $vo = new ChamadaVO();
    $ctrl_ch = new ChamadaCtrl();

    $vo->setId_equipamento($_POST['equip']);
    $vo->setDescricao_problema($_POST['descricao']);

    $ret = $ctrl_ch->AbrirChamado($vo);
}

$eqs = $ctrl_equip->FiltrarEquipamentoSetorChamado();
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
                            <?php
                            if (isset($ret)) {

                                ExibirMsg($ret);
                            }
                            ?>   
                            <h2>Novo Chamado</h2>   
                            <h5>Aqui você poderá abrir novo chamado..</h5>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="POST" action="func_novo_chamado.php">
                        <div class="form-group" id="divTipo">
                            <label>Selecione o Tipo de Equipamento</label>
                            <select class="form-control" name="equip">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($eqs); $i++) { ?>
                                    <option value="<?= $eqs[$i]['id_equipamento'] ?>">
                                        <?= $eqs[$i]['identificacao_equipamento'] ?> / <?= $eqs[$i]['descricao_equipamento'] ?>
                                    </option>

                                <?php } ?>     
                            </select>  
                            <label id="val_tipo" class="Validar"></label>
                        </div>                    

                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" rows="4" placeholder="Digite aqui..." name="descricao" id="descricao"></textarea>
                            <label id="val_descricao" class="Validar"></label>
                        </div>

                        <center><button class="btn btn-success" name="btnSalvar" onclick="return Validar(5)">Salvar</button></center>

                    </form>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </body>
</html>