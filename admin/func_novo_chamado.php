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
<htm3l xmlns="http://www.w3.org/1999/xhtml">
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
                            <h5>Aqui você poderá abrir novo chamado.</h5>
                        </div>
                    </div>

                    <hr />
                    <form method="POST" action="func_novo_chamado.php">

                        <div class="form-group">
                            <label>Equipamento</label>

                            <select class="form-control" name="equip">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($eqs); $i++) { ?>
                                    <option value="<?= $eqs[$i]['id_equipamento'] ?>">
                                        <?= $eqs[$i]['identificacao_equipamento'] ?> / <?= $eqs[$i]['descricao_equipamento'] ?>
                                    </option>

                                <?php } ?>     
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Descreva o seu problema</label>
                            <textarea class="form-control" placeholder="Digite o endereço" name="descricao"></textarea>
                        </div>

                        <center><button type="submit" class="btn btn-success" name="btnFinalizar">Finalizar</button></center>

                    </form>
                </div>

            </div>

        </div>
 

    </body>
</html>
