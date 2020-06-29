<?php

// Configurações do site
define('HOST', 'localhost'); //IP
define('USER', 'root'); //usuario
define('PASS', null); //Senha
define('DB', 'db_controle_os'); //Banco
/**
 * Conexao.class TIPO [Conexão]
 * Descricao: Estabelece conexões com o banco usando SingleTon
 * @copyright (c) year, Wladimir M. Barros
 */

class Conexao {

    /** @var PDO */
    private static $Connect;

    public function run() {
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call('UsersTableSeeder');
        $this->call('PostsTableSeeder');

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private static function Conectar() {
        try {

            //Verifica se a conexão não existe
            if (self::$Connect == null):

                $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;

                self::$Connect = new PDO($dsn, USER, PASS, null);
            endif;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        //Seta os atributos para que seja retornado as excessões do banco
        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$Connect;
    }

    public function retornaConexao() {
        return self::Conectar();
    }

}
