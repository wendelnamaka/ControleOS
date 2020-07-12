<?php
require_once '../CONTROLLER/EquipamentoCtrl.php';
require_once '../CONTROLLER/SetorCtrl.php';
require_once '../VO/EquipamentoVO.php';
require_once '../VO/AlocarVO.php';

$ctrl_equ = new EquipamentoCtrl;
$ctrl_set = new SetorCTRL();


if (isset($_POST['btnAlocar'])) {


    $equipamento = $_POST['equipamento'];
    $setor = $_POST['setor'];

    $vo = new AlocarVO();

    $vo->setId_Equipamento($equipamento);
    $vo->setId_setor($setor);

    $ret = $ctrl_equ->AlocarEquipamento($vo);
}

$equipamentos = $ctrl_equ->FiltrarEquipamentoDisponivel();
$setor = $ctrl_set->ConsultarSetor();
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
                            <h2>Equipamento Alterar </h2>   
                            <h5>Consulte / Altere seus equipamentos nesta página</h5>
                        </div>
                    </div>
                    <hr />  
                    <form method="POST" action="adm_equipamento_alocar.php">
                        <div class="form-group" id="divSetor">
                            <label>Escolha o setor</label>
                            <select class="form-control" name="setor" id="setor">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($setor); $i++) { ?>
                                    <option value="<?= $setor[$i]['id_setor'] ?>">

                                        <?= $setor[$i]['nome_setor'] ?>

                                    </option>

                                    <?php
                                }
                                ?>
                            </select>
                            <label id="val_setor" class="Validar"></label>
                        </div>

                        <div class="form-group" id="divTipo">
                            <label>Equipamento</label>
                            <select class="form-control" id="tipo" name="equipamento">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($equipamentos); $i++) { ?>

                                    <option value="<?= $equipamentos[$i]['id_equipamento'] ?>" >

                                        <?= $equipamentos[$i]['identificacao_equipamento'] ?> / <?= $equipamentos[$i]['descricao_equipamento'] ?>

                                    </option>

                                <?php } ?>
                            </select>
                            <label id="val_tipo" class="Validar"></label>
                        </div>   

                        <center><button class="btn btn-success" name="btnAlocar" onclick="return Validar(5)">Salvar</button></center>

                    </form> 
                    <hr/>

                </div>

            </div>

        </div>

    </body>
</html>
