<?php
require_once '../CONTROLLER/UsuarioFuncionarioCTRL.php';
require_once '../CONTROLLER/UtilCtrl.php';
require_once '../VO/FuncionarioVO.php';

UtilCtrl::VerTipoPermissao(2);
$ctrl = new UsuarioFuncionarioCTRL();

if (isset($_POST['btnSalvar'])) {
    $vo = new FuncionarioVO();
    $vo->setNome($_POST['nome']);
    $vo->setEmail_funcionario($_POST['email']);
    $vo->setTelefone_funcionario($_POST['telefone']);
    $vo->setEndereco_funcionario($_POST['endereco']);

    $crtl = new UsuarioFuncionarioCTRL();
    $ret = $ctrl->AlterarUsuarioFuncionario($vo);
}

$dados = $ctrl->CarregarDadosUsuario();
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
                            <?php
                            if (isset($ret)) {

                                ExibirMsg($ret);
                            }
                            ?> 
                            <h2>Meus dados</h2>   
                            <h5>Aqui você poderá manter seus dados atualizados.</h5>

                        </div>
                    </div>

                    <hr />

                    <form method="POST" action="func_meus_dados.php">

                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" placeholder="Digite o seu nome" name="nome" value="<?= $dados[0]['nome_usuario'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" placeholder="Digite o seu email" name="email" value="<?= $dados[0]['email_funcionario'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input class="form-control" placeholder="Digite o seu telefone" name="telefone" value="<?= $dados[0]['telefone_funcionario'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Endereco</label>
                            <input class="form-control" placeholder="Digite o seu  endereço" name="endereco" value="<?= $dados[0]['endereco_funcionario'] ?>"/>
                        </div>

                        <center><button type="submit" class="btn btn-success" name="btnSalvar">Salvar</button></center>

                    </form>    
                </div>

            </div>

        </div>

    </body>
</html>
