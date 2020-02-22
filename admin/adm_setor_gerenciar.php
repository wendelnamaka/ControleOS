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
                            <h2>Novo Setor</h2>   
                            <h5>Cadastre um novo setor nesta página.</h5>

                        </div>
                    </div>

                    <hr />

                    <div class="form-group">
                        <label>Nome do setor</label>
                        <input class="form-control" placeholder="Digite o nome do novo setor" />
                    </div>

                    <center><button type="submit" class="btn btn-success">Salvar</button></center>
                    <hr/>
                    
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Setores Cadastrados
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>Trident</td>
                                                <td
                                                    <a href="adm_setor_gerenciar.php" class="btn btn-warning btn-xs">Alterar</a>
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
