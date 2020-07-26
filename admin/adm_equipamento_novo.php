<?php
require_once '../CONTROLLER/TipoCtrl.php';
require_once '../CONTROLLER/EquipamentoCtrl.php';
require_once '../CONTROLLER/ModeloCtrl.php';
require_once '../VO/EquipamentoVO.php';


$ctrl = new EquipamentoCtrl();
$ctrl_mod = new ModeloCtrl();
$ctrl_tip = new TipoCTRL();

if (isset($_POST['btnSalvar'])) {

    $identificacao_equipamento = $_POST['identificacao'];
    $descricao_equipamento = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo']; 
    
    $vo = new EquipamentoVO();
    
    $vo->setId_modelo($modelo);
    $vo->setId_tipo($tipo);
    $vo->setIdentificacao_equipamento($identificacao_equipamento);
    $vo->setDescricao_equipamento($descricao_equipamento);
//echo "<pre>";
//print_r($vo);
//echo "</pre>";
    $ret = $ctrl->InserirEquipamento($vo);
}
$modelos = $ctrl_mod->ConsultarModelo();
$tipo = $ctrl_tip->ConsultarTipo();
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
                            <h2>Novo equipamento</h2>   
                            <h5>Cadastre um novo equipamento abaixo.</h5>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="POST" action="adm_equipamento_novo.php">
                        <div class="form-group" id="divTipo">
                            <label>Selecione o Tipo de Equipamento</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="">Selecione</option>
                                 <?php for ($i = 0; $i < count($tipo); $i++) { ?>

                                <option value="<?= $tipo[$i]['id_tipo']?>">
                                         
                                         <?=$tipo[$i]['nome_tipo']?>
                                
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

                                <option value="<?= $modelos[$i]['id_modelo']?>">
                                        
                                        <?=$modelos[$i]['nome']?>
                                
                                </option>

                                <?php } ?>
                            </select>
                            <label id="val_modelo" class="Validar"></label>
                        </div>  
                        <div class="form-group" id="divIdentificacao">
                            <label>Identificação</label>
                            <input class="form-control" placeholder="Digite aqui..."  name="identificacao" id="identificacao"/>
                            <label id="val_identificacao" class="Validar"></label>
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