<?php

function ExibirMsg($ret) {
    switch ($ret) {

        case -2:

            echo '<div class="alert alert-danger">Nao foi possivel excluir </div>';


        case -1;
            echo '<div class="alert alert-danger">Ocorreu um erro na operação. Tente mais tarde </div>';

            break;

        case 0;
            echo ' <div class="alert alert-warning"> Preencher todos os campos obrigatorios </div>';

            break;

        case 1:

            echo ' <div class="alert alert-success"> Ação gravado com sucesso </div>';

            break;
        
        case 2:

            echo ' <div class="alert alert-info"> Não apareceu nenhum registro</div>';

            break;
        
    }
}
