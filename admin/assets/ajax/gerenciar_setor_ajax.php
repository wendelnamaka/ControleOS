<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/VO/SetorVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/CONTROLLER/SetorCtrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/admin/_msg.php';



if (isset($_POST['nome']) && $_POST['acao'] == 'I') {

    $ctrl = new SetorCTRL();
    $nome_setor = $POST['nome'];
    $vo = new SetorVO();

    $vo->setNome_setor($nome_setor);
    $ret = $ctrl->InserirSetor($vo);
    
    echo $ret;
}
else if ($_POST['acao'] === 'C') {

    $ctrl = new SetorCTRL();
    $setores = $crtl->ConsultarSetor();
    ?>
    <table class="table table-striped table-bordered table-hover" id="tabSetores">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($setores); $i++) { ?>

                <tr class="odd gradeX">
                    <td><?= $setores[$i]['nome_setor'] ?></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modalAlterar" onclick="return AlterarDados('<?= $setores[$i]['nome_setor'] ?>', <?= $setores[$i]['id_setor'] ?>)">Alterar</a>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modExcluir" onclick="return CarregarDadosExclusao('<?= $setores[$i]['nome_setor'] ?>', <?= $setores[$i]['id_setor'] ?>)">Excluir</a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <?php
    }
?>

