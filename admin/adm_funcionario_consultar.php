<?php
require_once '../CONTROLLER/SetorCtrl.php';
require_once '../CONTROLLER/UsuarioFuncionarioCTRL.php';
require_once '../CONTROLLER/UtilCtrl.php';
require_once '../VO/UsuarioVO.php';
require_once '../VO/FuncionarioVO.php';

$tipo = '';
$ctrl_set = new SetorCTRL();


if (isset($_POST['btnProcurar'])) {
    $tipo = $_POST['tipo'];
    $ctrl = new UsuarioFuncionarioCTRL();

    $usuarios = $ctrl->FiltrarUsuario($tipo);

    if ($usuarios == 0) {

        $ret = 0;
    }
} else if (isset($_POST['btnAlterarFunc'])) {


    $uservo = new UsuarioVO();
    $vofunc = new FuncionarioVO();

    $tipo = $_POST['tipo_filtro'];

    $uservo->setNome($_POST['nome_alt']);
    $uservo->setSobrenome($_POST['sobrenome']);
    $codigo = $uservo->setID($_POST['cod']);


    $vofunc->setEmail_funcionario($_POST['email']);
    $vofunc->setEndereco_funcionario($_POST['endereco']);
    $vofunc->setTelefone_funcionario($_POST['telefone']);
    $vofunc->setId_usuario_funcionario($_POST['cod']);
    $vofunc->setId_setor($_POST['setor']);



    $ctrl = new UsuarioFuncionarioCTRL();

    $ret = $ctrl->AlterarFuncionario($uservo, $vofunc);

    $usuarios = $ctrl->FiltrarUsuario($tipo);
} else if (isset($_POST['btnAlterarAdm'])) {

    $tipo = $_POST['tipo_filtro'];

    $ctrl = new UsuarioFuncionarioCTRL();

    $uservo = new UsuarioVO();

    $uservo->setID($_POST['cod']);
    $uservo->setNome($_POST['nome_alt_adm']);
    $uservo->setSobrenome($_POST['nome_alt_sobre']);
    $ret = $ctrl->AlterarAdminitrador($uservo);
    $usuarios = $ctrl->FiltrarUsuario($tipo);
}

$setor = $ctrl_set->ConsultarSetor();
?>
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
                            <h2>Consulte funcionario</h2>   
                            <h5>Consulte / Altere seus funcionarios nesta página</h5>
                        </div>
                    </div>

                    <hr />

                    <form method="POST" action="adm_funcionario_consultar.php">
                        <?php
                        include_once '_combo_fixa_tipo.php';
                        ?>

                        <center><button type="submit" class="btn btn-info" onclick="return Validar(8);" name="btnProcurar">Procurar</button></center>
                    </form>
                    <hr/>


                    <?php
                    if (isset($usuarios) && $usuarios != 0) {

                        if (count($usuarios) > 0) {
                            ?>    

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
                                                        <th>Nome</th>
                                                        <th>Tipo</th>
                                                        <th>Setor </th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for ($i = 0; $i < count($usuarios); $i++) { ?>
                                                        <tr class="odd gradeX">
                                                            <td><?= $usuarios[$i]['nome_usuario'] ?></td>
                                                            <td><?= UtilCtrl::RetornaTipoUsuario($usuarios[$i]['tipo_usuario']) ?></td>
                                                            <td><?= $usuarios[$i]['nome_setor'] ?></td>
                                                            <td>
                                                                <a href="#" class="btn btn-warning btn-xs" data-toggle="modal"  data-target="#<?= $usuarios[$i]['tipo_usuario'] == 1 ? 'modalAlterarAdm' : 'modAlterarFunc' ?>" 
                                                                   onclick="return CarregarModal
                                                                                               ('<?= $usuarios[$i]['tipo_usuario'] ?>',
                                                                                                       '<?= $usuarios[$i]['id_usuario'] ?>',
                                                                                                       '<?= $usuarios[$i]['nome_usuario'] ?>',
                                                                                                       '<?= $usuarios[$i]['sobrenome'] ?>',
                                                                                                       '<?= $usuarios[$i]['id_setor'] ?>',
                                                                                                       '<?= $usuarios[$i]['email_funcionario'] ?>',
                                                                                                       '<?= $usuarios[$i]['telefone_funcionario'] ?>',
                                                                                                       '<?= $usuarios[$i]['endereco_funcionario'] ?>')">Alterar</a>


                                                            </td>
                                                            <?php
                                                        }
                                                        ?>       
                                                    </tr>                 
                                                </tbody>
                                            </table>
                                            <?php
                                        } else {
                                            ExibirMsg(2);
                                        }
                                    }
                                    ?>    


                                    <div class="modal fade" id="modAlterarFunc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Alterar Funcionário</h4>
                                                </div>
                                                <form method="post" action="adm_funcionario_consultar.php">
                                                    <input type="hidden" name="tipo_filtro" value="<?= $tipo ?>" />

                                                    <div class="modal-body">
                                                        <input type="hidden" name="cod" id="cod_func_alt" />
                                                        <div class="form-group" id="divNome">
                                                            <label>Nome</label>
                                                            <input class="form-control" placeholder="Digite o nome" name="nome_alt" id="nome_alt"/>
                                                            <label class="Validar"id="val_nome"</label>
                                                        </div>
                                                        <div class="form-group" id="divNome">
                                                            <label>Sobrenome</label>
                                                            <input class="form-control" placeholder="Digite o seu sobrenome" id="sobrenome" name="sobrenome" />
                                                            <label id="val_nome" class="Validar"></label>
                                                        </div>

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
                                                            <input class="form-control" placeholder="Digite o seu email" id="email_alt_func" name="email" onchange="ValidarEmail(2)"/>
                                                            <label id="val_email" class="Validar"></label>
                                                        </div>

                                                        <div class="form-group" id="divTelefone">
                                                            <label>Telefone</label>
                                                            <input class="form-control" placeholder="Digite o seu telefone" id="telefone" name="telefone"/>
                                                            <label id="val_telefone" class="Validar"></label>
                                                        </div>

                                                        <div class="form-group" id="divEndereco">
                                                            <label>Endereço</label>
                                                            <input class="form-control" placeholder="Digite o endereço"  id="endereco" name="endereco"/>
                                                            <label id="val_endereco" class="Validar"></label>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                        <button class="btn btn-primary" name="btnAlterarFunc">Salvar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="modalAlterarAdm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Alterar Funcionário</h4>
                                                </div>
                                                <form method="post" action="adm_funcionario_consultar.php">
                                                    <input type="hidden" name="tipo_filtro" value="<?= $tipo ?>" />

                                                    <div class="modal-body">
                                                        <div class="form-group" id="divNome">
                                                            <input type="hidden" name="cod" id="cod_adm" />
                                                            <label>Nome</label>
                                                            <input class="form-control" placeholder="Digite o nome" name="nome_alt_adm" id="nome_alt_adm"/>
                                                            <label class="Validar"id="val_nome"</label>
                                                        </div>
                                                        <div class="form-group" id="divNome">
                                                            <label>Sobrenome</label>
                                                            <input class="form-control" placeholder="Digite o seu sobrenome" id="nome_alt_sobre" name="nome_alt_sobre" />
                                                            <label id="val_nome" class="Validar"></label>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                            <button class="btn btn-primary" name="btnAlterarAdm">Salvar</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <script>

            function CarregarModal(tipo, id, nome, sobrenome, setor, email, endereco, telefone) {

                if (tipo == 1) {
                    $("#nome_alt_adm").val(nome);
                    $("#nome_alt_sobre").val(sobrenome);
                    $("#cod_adm").val(id);


                } else {


                    $("#cod_func_alt").val(id);
                    $("#nome_alt").val(nome);
                    $("#sobrenome").val(sobrenome);
                    $("#setor").val(setor);
                    $("#email_alt_func").val(email);
                    $("#endereco").val(endereco);
                    $("#telefone").val(telefone);
                }
            }

        </script>   
    </body>
</html>
