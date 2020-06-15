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
                            if (isset($ret))
                                ExibirMsg($ret);
                            ?>
                           

                        </div> <h2>Atender Chamado</h2>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                    <div class="col-md-6">
                        <form method="post" action="realizar_movimento.php">  
                            <div class="form-group">
                                <label>Data:</label>
                                <input type="date" class="form-control" name="data_mov" disabled/>
                            </div>

                            <div class="form-group">
                                <label>Funcionarios:</label>
                                <input type="text"class="form-control" placeholder="Digite aqui" name="valor" disabled/>
                            </div>
                    </div>

                    <div class="col-md-6">  <div class="form-group">

                            <label>Setor:</label>
                            <input type="text"class="form-control" placeholder="Digite aqui" name="valor" disabled/>
                        </div>

                        <div class="form-group">
                            <label>Equipamento:</label>
                            <input type="text"class="form-control" placeholder="Digite aqui" name="valor" disabled/>
                        </div>

                    </div>   

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Descrição</label>
                            <textArea class="form-control" name="obs" disabled></textArea>
                            
                </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Laudo</label>
                            <textArea class="form-control" name="obs"></textArea>
                            
                </div>
                    </div>
                  
                        <left>
                            <button type="submit" class="btn btn-success" name="btnSalvar">Salvar</button>
                        </left>
                        <hr />
                    </form>
            </div>
         
        </div>
  
  
    </body>
</html>
