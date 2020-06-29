<?php
require_once '../CONTROLLER/TipoCtrl.php';
require_once '../CONTROLLER/SetorCtrl.php';

$ctrl_tipo = new TipoCTRL();
$ctrl_set = new SetorCTRL();



$tipos = $ctrl_tipo->ConsultarTipo();
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
                            <h2>Equipamento Alterar </h2>   
                            <h5>Consulte / Altere seus equipamentos nesta página</h5>
                        </div>
                    </div>
                    <hr />

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
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="">Selecione</option>
                            <?php for ($i = 0; $i < count($tipos); $i++) { ?>

                                <option value="<?= $tipos[$i]['id_tipo'] ?>" >

                                    <?= $tipos[$i]['nome_tipo'] ?>

                                </option>

                            <?php } ?>
                        </select>
                        <label id="val_tipo" class="Validar"></label>
                    </div>   
                    <center><button type="submit" class="btn btn-success">Alocar</button></center>
                    <hr/>

                </div>

            </div>

        </div>

    </body>
</html>
