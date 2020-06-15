<?php

class UtilCtrl {

    public static function RetornarCodigoLogadoAdm() {

        return 1; // Simula o numero do id usuario adm logado
    }

    public static function RetornaTipoUsuario($tipo) {

        $nome = '';

        switch ($tipo) {

            case 1:
                $nome = 'Admnistrador';

                break;

            case 2:
                $nome = 'Setor';

                break;

            case 3:

                $nome = 'Técnico';

                break;
        }

        return $nome;
    }

}
