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

                    <div class="form-group">
                        <label>Setor</label>
                        <select class="form-control">
                            <option value="">Selecione</option>
                            <option value="1">Administrador</option>
                            <option value="2">Setor</option>
                            <option value="3">Técnico</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Equipamento</label>
                        <select class="form-control">
                            <option value="">Selecione</option>
                            <option value="1">Administrador</option>
                            <option value="2">Setor</option>
                            <option value="3">Técnico</option>
                        </select>
                    </div>

                      <center><button type="submit" class="btn btn-success">Alocar</button></center>
                    <hr/>

                </div>

            </div>

        </div>

    </body>
</html>
