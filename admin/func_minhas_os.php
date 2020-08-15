<?php

$situacao = '';


if(isset($_POST['btnProcurar'])){
    $situacao = $POST['situacao'];
    
    
    
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
                            <h2>Consulte minhas OS</h2>   
                        </div>
                    </div>

                    <hr />

                    <form method="post" action="func_minhas_os.php">

                        <div class="form-group" id="divModelo">2

                            <select class="form-control" name="situacao">
                                <option value="0"><?= $situacao == 0 ? 'selected' : '' ?></option>
                                <option value="1"><?= $situacao == 1 ? 'selected' : '' ?></option>
                                <option value="2"><?= $situacao == 2 ? 'selected' : '' ?></option>
                                <option value="3"><?= $situacao == 3 ? 'selected' : '' ?></option>
                                
                            </select>

                        </div>
                        
                        <label id="val_modelo" class="Validar"></label>

                        <center><button type="info" class="btn btn-info"  name="btnProcurar">Procurar</button></center>
                        <hr/>

                    </form>

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
                                                <th>Abertura</th>
                                                <th>Equipamento</th>
                                                <th>Problema</th>
                                                <th>Situacao Abertura</th>
                                                <th>Técnico Atendimento </th>
                                                <th>Atendimento</th>
                                                <th>Laudo</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>Equipamento Solicitado</td>
                                                <td>Status Abertura</td>
                                                <td>Técnico Atendimento </td>
                                                <td>Encerramento</td>
                                                <td>Laudo</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>

                </div>

            </div>

        </div>

    </body>
</html>
