<?php
require_once '../VO/FuncionarioVO.php';
require_once '../VO/UsuarioVO.php';
require_once '../VO/SetorVO.php';
require_once '../CONTROLLER/UsuarioFuncionarioCTRL.php';
require_once '../CONTROLLER/SetorCtrl.php';
require_once '../CONTROLLER/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);


$ctrl = new UsuarioFuncionarioCTRL();
$crtl_setor = new SetorCtrl();


if (isset($_POST['btnSalvar'])) {

    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];

    $uservo = new UsuarioVO();

    $uservo->setNome($nome);
    $uservo->setSobrenome($sobrenome);
    $uservo->setTipoUsuario($tipo);


    if ($tipo == 1) {
        $ret = $ctrl->InserirAdministrador($uservo);
    } else {
        $setor = $_POST['setor'];
        $email_funcionario = $_POST['email'];
        $endereco_funcionario = $_POST['endereco'];
        $telefone_funcionario = $_POST['telefone'];


        $vofunc = new FuncionarioVO();

        $vofunc->setId_setor($setor);
        $vofunc->setEmail_funcionario($email_funcionario);
        $vofunc->setEndereco_funcionario($endereco_funcionario);
        $vofunc->setTelefone_funcionario($telefone_funcionario);

        $ret = $ctrl->InserirFuncionario($uservo, $vofunc);

        if ($ret == 1) {
            $tipo = '';
        }
    }
}
$setor = $crtl_setor->ConsultarSetor();
?>
﻿<!DOCTYPE html>
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
                            <h2>Novo Funcionario</h2>   
                            <h5>Cadastre um novo funcionario nesta página.</h5>

                        </div>
                    </div>

                    <hr />

                    <form method="post" action="adm_funcionario_novo.php"> 
                        <?php
                        include_once '_combo_fixa_tipo.php';
                        ?>

                        <div id="divNomeFunc" style="display: none">

                            <div class="form-group" id="divNome">
                                <label>Nome</label>
                                <input class="form-control" placeholder="Digite o seu nome" id="nome" name="nome" />
                                <label id="val_nome" class="Validar"></label>
                            </div>
                            <div class="form-group" id="divNome_sobrenome">
                                <label>Sobrenome</label>
                                <input class="form-control" placeholder="Digite o seu sobrenome" id="sobrenome" name="sobrenome" />
                                <label id="val_nome_sobrenome" class="Validar"></label>
                            </div>
                        </div>

                        <div id="divGeral" style="display: none">

                            <div class="form-group" id="divSetor">
                                <label>Escolha o setor</label>
                                <select class="form-control" name="setor" id="setor">
                                    <option value="">Selecione</option>
                                    <?php for ($i = 0; $i < count($setor); $i++) { ?>
                                        <option value="<?= $setor[$i]['id_setor'] ?>">

                                            <?= $setor[$i]['nome_setor'] ?>

                                        </option>

                                        <?php
                                    }
                                    ?>
                                </select>
                                <label id="val_setor" class="Validar"></label>
                            </div>

                            <div class="form-group" id="divEmail">
                                <label>Email</label>
                                <input class="form-control" placeholder="Digite o seu email" id="email" name="email" onchange="ValidarEmail(1)"/>
                                <label id="val_email" class="Validar"></label>
                            </div>
                            <div class="form-group" id="divTelefone">
                                <label>Telefone</label>
                                <input class="form-control" placeholder="Digite o seu telefone" id="telefone" name="telefone"/>
                                <label id="val_tel" class="Validar"></label>
                            </div>
                            <div class="form-group" id="divEndereco">
                                <label>Endereço</label>
                                <input class="form-control" placeholder="Digite o endereço"  id="endereco" name="endereco"/>
                                <label id="val_end" class="Validar"></label>
                            </div>  

                        </div>
                        <button class="btn btn-success" name="btnSalvar" onclick="return Validar(2)">Salvar</button>

                    </form> 

                </div>

            </div>

        </div>
    </body>
</html>
