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
                            <h2>Novo equipamento</h2>   
                            <h5>Cadastre um novo equipamento abaixo.</h5>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="form-group">
                        <label>Tipo</label>
                        <select class="form-control" id="tipo">
                            <option value="">Selecione</option> 
                            <option value="1">RH</option> 
                        </select>
                        <label id="val_tipo" class="Validar"></label>
                    </div>                    
                    <div class="form-group">
                        <label>Modelo</label>
                        <select class="form-control" id="modelo">
                            <option value="">Selecione</option>                            
                        </select>
                    </div>                    
                    <div class="form-group">
                        <label>Identificação</label>
                        <input class="form-control" placeholder="Digite aqui..." id="setor"/>
                        <label id="val_setor" class="Validar"></label>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea class="form-control" rows="4" placeholder="Digite aqui..."></textarea>
                    </div>

                    <center><button type="submit" class="btn btn-success" name="btnSalvar" onclick="return Validar(1)">Salvar</button></center>

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </body>
</html>