<?php

require_once 'Conexao.php';
require_once 'sql/Modelo_sql.php';

class ModeloDao extends Conexao {

    public function InserirModelo(ModeloVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Modelo_sql::InserirModelo();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getId_usuario());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {

            return -1;
        }
    }

    public function AlterarModelo(ModeloVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Modelo_sql::AlterarModelo();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getId_usuario());
        $sql->bindValue(3, $vo->getId_modelo());

        try {

            $sql->execute();
            return 1;
        } catch (Exception $ex) {

            echo $ex->getMessage();

            return -1;
        }
    }

    public function ConsultarModelo() {

        $conexao = parent::retornaConexao();

        $comando = Modelo_sql::ConsultarModelo();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        //Elimina o indicine das colunas ,deixandos  o que indices que foram citados.
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function ExcluirModelo($idTipo) {

        $conexao = parent::retornaConexao();
        $comando = Modelo_sql::ExcluirModelo();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idTipo);

        try {

            $sql->execute();
            return 1;
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }
    }

}
