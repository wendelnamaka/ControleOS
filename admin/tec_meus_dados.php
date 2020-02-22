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
                            <h2>Meus dados</h2>   
                            <h5>Aqui você poderá manter seus dados atualizados.</h5>

                        </div>
                    </div>

                    <hr />

                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" placeholder="Digite o seu nome" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" placeholder="Digite o seu email" />
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input class="form-control" placeholder="Digite o seu telefone" />
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço" />
                    </div>

                    <center><button type="submit" class="btn btn-success">Salvar</button></center>

                </div>

            </div>

        </div>

    </body>
</html>
