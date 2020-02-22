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
                    <?php
                    include_once '_combo_fixa_tipo.php';
                    ?>


                    <div class="form-group">
                        <label>Tipo</label>
                        <select class="form-control">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Modelo</label>
                        <select class="form-control">
                            <option value="">Selecione</option>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label>Identificaçao</label>
                        <input class="form-control" placeholder="Digite o endereço" />
                    </div>
                    <div class="form-group">
                        <label>Identificaçao</label>
                        <textArea class="form-control" placeholder="Digite o endereço" ></textarea>
                    </div>

                    <center><button type="submit" class="btn btn-success">Salvar</button></center>

                </div>

            </div>

        </div>

    </body>
</html>
