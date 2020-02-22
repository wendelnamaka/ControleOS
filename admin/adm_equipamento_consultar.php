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
                            <h2>Equipamento Consultar</h2>   
                            <h5>Consulte / Altere seus equipamentos nesta página</h5>
                        </div>
                    </div>

                    <hr />

                    <?php
                    
                    include_once '_combo_fixa_tipo.php';
                    
                    ?>

                    <center><button type="info" class="btn btn-info">Procurar</button></center>
                    <hr/>

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
                                                <th>identificaçao </th>
                                                <th>Descriçao</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>Trident</td>
                                                <td>Tipo</td>
                                                <td>Setor</td>
                                                <td>
                                                    <a href="adm_equipamento_alterar.php" class="btn btn-warning btn-xs">Alterar</a>
                                                </td>
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
