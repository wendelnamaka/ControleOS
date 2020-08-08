<?php

class UtilCtrl {

    private static function IniciarSessao() {

        if (!isset($_SESSION)) {

            session_start();
        }
    }

    public static function CriarSessao($id, $tipo, $idSetor) {

        self::IniciarSessao();
        $_SESSION['tipo'] = $tipo;
        $_SESSION['idUser'] = $id;
        if($idSetor != ''){
            
            $_SESSION['idsetor'] = $idSetor;
        }

    }

    public static function Deslogar() {

        self::IniciarSessao();
        unset($_SESSION['tipo']);
        unset($_SESSION['idUser']);

        if(isset($_SESSION['idsetor'])){
            unset($_SESSION['idsetor']);
        }
        
        header('location: login.php');
    }

    public static function VerTipoPermissao($tipo) {

        if ($tipo != self::RetornarTipoLogado()) {

            self::Deslogar();
        }
    }

    public static function VerificarLogado() {
        self::IniciarSessao();

        if (!(isset($_SESSION['idUser'])) && !(isset($_SESSION['tipo']))) {
            header('location: login.php');
        }
    }
    
    public static function RetornarIdSetor() {
        self::IniciarSessao();
        return $_SESSION['idsetor'];
    }
    
    public static function RetornarCodigoLogadoAdm() {
        self::IniciarSessao();
        return $_SESSION['idUser'];
    }

    public static function RetornarTipoLogado() {
        self::IniciarSessao();
        return $_SESSION['tipo'];
    }

    public static function RetornaTipoUsuario($tipo) {

        $nome = '';

        switch ($tipo) {

            case 1:
                $nome = 'Administrador';

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

    private static function SetarFusoHoario() {

        return date_default_timezone_set('America/Sao_Paulo');
    }

    public static function DataAtual() {
        self::SetarFusoHoario();
        return date('Y-m-d');
    }

}
