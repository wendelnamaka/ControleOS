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
                            <h2>Novo Chamado</h2>
                            <h5>Aqui você poderá abrir novo chamado.</h5>
                        </div>
                    </div>

                    <hr />
                <label>Equipamento</label>
                    <?php
                    include_once '_combo_fixa_situacao.php';
                    ?>
                    <div class="form-group">
                        <label>Descreva o seu problema</label>
                        <textArea class="form-control" placeholder="Digite o endereço" ></textarea>
                    </div>

                    <center><button type="submit" class="btn btn-success">Salvar</button></center>


                </div>

            </div>

        </div>

    </body>
</html>
