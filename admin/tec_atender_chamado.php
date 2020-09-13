<?php
require_once '../CONTROLLER/ChamadaCtrl.php';
require_once '../VO/ChamadaVO.php';
require_once '../CONTROLLER/UtilCtrl.php';

$ctrl = new ChamadaCtrl();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $cod = $_GET['cod'];

    $dados = $ctrl->DetalharChamados($cod);

    if (count($dados) == 0) {

        header('location: tec_consultar_chamados.php');
    }
} 
else if(isset($_POST['btnAtender'])) {
    $cod = $_POST['cod'];
    $vo = new ChamadaVO();
    $vo->setId_chamado($cod);
    $ret = $ctrl->AtenderChamados($vo);
   header('location: tec_atender_chamados.php?cod='. $cod . '&ret=' . $ret);
}else if(isset($_POST['btnFinalizar'])){
    
    $cod = $_POST['cod'];
    $vo = new ChamadaVO();
    $vo->setId_chamado($cod);
    $vo->setLaudo_atendimento($_POST['laudo']);
    $ret = $ctrl->FinalizarChamado($vo);
    header('location: tec_atender_chamado.php?ret=' . $ret);
 
}else {
    
        header('location: tec_consultar_chamados.php');
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



                        <div class="col-md-6">  
                            <?php
                            if (isset($_GET['ret'])){
                                ExibirMsg($_GET['ret']);
                            }
                            ?>

                        </div> <h2>Atender Chamado</h2>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Data:</label>
                                <input value="<?= UtilCtrl::MostrarData($dados[0]['data_abertura']) ?>" class="form-control" name="data_mov" disabled/>
                            </div>

                            <div class="form-group">
                                <label>Funcionarios:</label>
                                <input value="<?= ($dados[0]['nome_func_setor']) ?>" class="form-control" name="func" disabled/>
                            </div>
                        </div>

                        <div class="col-md-6">  <div class="form-group">

                                <label>Setor:</label>
                                <input value="<?= ($dados[0]['nome_setor']) ?>" class="form-control" name="func" disabled/>
                            </div>

                            <div class="form-group">
                                <label>Equipamento:</label>
                                <input class="form-control" value="<?= $dados[0]['identificacao_equipamento']. '-' . $dados[0]['descricao_equipamento'] ?>" class="form-control" name="func" disabled/>
                            </div>

                        </div>   

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descrição</label>
                                <textArea class="form-control" name="obs" disabled><?= ($dados[0]['descricao_problema']) ?></textArea>
                                </textArea>
                            </div>
                        </div>
                        
                    <form method="post" action="tec_atender_chamado.php"> 
                        <input type="hidden" name="cod" value="<?= $dados[0]['id_chamado']?>" />
                        <?php if ($dados[0]['situacao'] != 1){?>
                          <div class="col-md-12">
                          <div class="form-group">
                            <label>Laudo</label>
                            <textArea class="form-control"<?=$dados[0]['situacao'] == 3 ? 'disabled' : ''?>  placeholder="Digite aqui" name="laudo"><?= $dados[0]['laudo_atendimento']?></textArea>
                          </div>
                         <?php }?>
                        
                        <?php if($dados[0]['situacao'] == 1){?>
                        <button class="btn btn-warning" name="btnAtender">Atender</button>
                        <?php } else if ($dados[0]['situacao'] == 2){?>
                          <button class="btn btn-success" name="btnFinalizar">Finalizar</button>
                          <?php
                          
                        } else{
                             ExibirMsg(5);
                          
                          }
                          ?>
                   </form>
            </div>
           </div>
        </div>
  
  
    </body>
</html>
