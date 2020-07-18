<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/CONTROLLER/VO/SetorVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/CONTROLLER/VO/SetorCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/admin/_msg.php';



if (isset($_POST['nome']) && $_POST['acao'] == 'I') {

    $crtl = new SetorCTRL();
    $nome = $POST['nome'];
    $vo = new SetorVO();

    $vo->setNomeSetor($nome);
    $ret->$crtl->InserirSetor($vo);

    ExibirMsg($ret);
} else if ($POST['acao'] == 'C') {

    $crtl = new SetorCTRL();
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
}?>