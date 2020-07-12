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

    public static function SetarFusoHoario(){
        
        return date_default_timezone_set('America/Sao_Paulo');
        
    }
    public static function DataAtual(){
        self::SetarVusoHoario();
        return date('Y-m-d');
        
    }
    
    
}
