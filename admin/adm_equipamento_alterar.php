<?php
require_once '../CONTROLLER/EquipamentoCtrl.php';
require_once '../CONTROLLER/TipoCtrl.php';
require_once '../CONTROLLER/ModeloCtrl.php';
require_once '../VO/EquipamentoVO.php';

$ctrl_tipo = new TipoCTRL();
$ctrl_modelo = new ModeloCtrl();
$ctrl_equipamento = new EquipamentoCtrl();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $cod = $_GET['cod'];

    $dados = $ctrl_equipamento->DetalharEquipamento($cod);

    if (count($dados) == 0) {
        header('location: adm_equipamento_consultar.php');
    }
} else if (isset($_POST['btnAlterar'])) {

    $vo = new EquipamentoVO();
    $vo->setIdentificacao_equipamento($_POST['identificacao_equipamento']);
    $vo->setDescricao_equipamento($_POST['descricao_equipamento']);
    $vo->setId_modelo($_POST['modelo']);
    $vo->setId_tipo($_POST['tipo']);
    $vo->setId_equipamento($_POST['id']);


    $ret = $ctrl_equipamento->AlterarEquipamento($vo);
    header('location: adm_equipamento_alterar.php?cod=' . $_POST['id'] . '&ret=' . $ret);
} else {    

    header('location: adm_equipamento_consultar.php');
}
$tipos = $ctrl_tipo->ConsultarTipo();
$modelos = $ctrl_modelo->ConsultarModelo();
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
                            if (isset($_GET['ret'])) {

                                ExibirMsg($_GET['ret']);
                            }
                            ?>
                            <h2>Equipamento Alterar </h2>   
                            <h5>Consulte / Altere seus equipamentos nesta página</h5>
                        </div>
                    </div>
                    <hr />

                    <form method="POST" action="adm_equipamento_alterar.php">
                        <input type="hidden" name="id" value="<?= $dados[0]['id_equipamento'] ?>" />

                        <div class="form-group" id="divTipo">
                            <label>Selecione o Tipo de Equipamento</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($tipos); $i++) { ?>

                                    <option value="<?= $tipos[$i]['id_tipo'] ?>"<?= $tipos[$i]['id_tipo'] == $dados[0]['id_tipo'] ? 'selected' : '' ?>   >

                                        <?= $tipos[$i]['nome_tipo'] ?>

                                    </option>

                                <?php } ?>
                            </select>
                            <label id="val_tipo" class="Validar"></label>
                        </div>                    
                        <div class="form-group" id="divModelo">
                            <label>Modelo</label>
                            <select class="form-control" id="modelo" name="modelo">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($modelos); $i++) { ?>

                                    <option value="<?= $modelos[$i]['id_modelo'] ?>" <?= $modelos[$i]['id_modelo'] == $dados[0]['id_modelo'] ? 'selected' : '' ?>>

                                        <?= $modelos[$i]['nome'] ?>

                                    </option>

                                <?php } ?>
                            </select>
                            <label id="val_modelo" class="Validar"></label>
                        </div>  
                        <div class="form-group" id="divIdentificacao">
                            <label>Identificação</label>
                            <input class="form-control" placeholder="Digite aqui..." name="identificacao_equipamento" value="<?= $dados[0]['identificacao_equipamento'] ?>"/>
                            <label id="val_identificacao" class="Validar"></label>
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea class="form-control" rows="4" placeholder="Digite aqui..." name="descricao_equipamento"><?= $dados[0]['descricao_equipamento'] ?>"</textarea>
                            <label id="val_descricao" class="Validar"></label>
                        </div>

                        <center><button class="btn btn-success" name="btnAlterar" onclick="return Validar(5)">Salvar</button></center>

                    </form>

                </div>

            </div>

        </div>

    </body>
</html>
