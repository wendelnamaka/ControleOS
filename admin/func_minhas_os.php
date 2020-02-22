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

                    <?php
                    
                    include_once '_combo_fixa_situacao.php';
                    
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
                                                <th>Equipamento Solicitado</th>
                                                <th>Status Abertura</th>
                                                <th>Técnico Atendimento </th>
                                                <th>Encerramento</th>
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
