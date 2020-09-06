<?php

function ExibirMsg($ret) {
    switch ($ret) {

        case -4:

            echo '<div class="alert alert-danger">A senha não confere </div>';

            break;
        case -3:

            echo '<div class="alert alert-danger">Login Inexistente</div>';

            break;

        case -2:

            echo '<div class="alert alert-danger">Nao foi possivel excluir </div>';

            break;

        case -1;
            echo '<div class="alert alert-danger">Ocorreu um erro na operação. Tente mais tarde </div>';

            break;

        case 0;
            echo '<div class="alert alert-warning"> Preencha todos os campos obrigatorios </div>';

            break;

        case 1:

            echo ' <div class="alert alert-success"> Ação gravado com sucesso </div>';

            break;

        case 2:

            echo '<center><div class="alert alert-info"> Não foi encontrado nenhum registro</div></center>';

            break;
        case 3:
            
            echo '<center><div class="alert alert-success"> Chamado atendido com sucesso </div></center>';

            break;
        case 4:

            echo '<center><div class="alert alert-success">Chamado finalizado com sucesso </div></center>';

            break;
        case 5:

            echo '<center><div class="alert alert-info">Chamado finalizado</div></center>';

            break;
    }
}
