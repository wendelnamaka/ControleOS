<?php

require_once 'Conexao.php';
require_once 'sql/Usuario_sql.php';

class UsuarioFuncionarioDAO extends Conexao {

    public function InserirAdministrador(UsuarioVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::InserirUsuario();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getSobrenome());
        $sql->bindValue(3, $vo->getLogin());
        $sql->bindValue(4, $vo->getSenha());
        $sql->bindValue(5, $vo->getTipoUsuario());


        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function InserirFuncionario(UsuarioVO $voUser, FuncionarioVO $voFunc) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::InserirUsuario();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $voUser->getNome());
        $sql->bindValue(2, $voUser->getSobrenome());
        $sql->bindValue(3, $voUser->getLogin());
        $sql->bindValue(4, $voUser->getSenha());
        $sql->bindValue(5, $voUser->getTipoUsuario());

        $conexao->beginTransaction();

        try {

            $sql->execute();

            $id_usuario_funcionario = $conexao->lastInsertId();

            $comando = Usuario_sql::InserirFuncionario();

            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $voFunc->getEmail_funcionario());
            $sql->bindValue(2, $voFunc->getTelefone_funcionario());
            $sql->bindValue(3, $voFunc->getEndereco_funcionario());
            $sql->bindValue(4, $id_usuario_funcionario);
            $sql->bindValue(5, $voFunc->getId_usuario_adm());
            $sql->bindValue(6, $voFunc->getId_Setor());

            $sql->execute();

            // confirmar a transação.
            $conexao->commit();
            return 1;
        } catch (Exception $ex) {

            $conexao->rollBack();
            echo $ex->getMessage();
            print_r($voFunc);
            return -1;
        }
    }

    public function FiltrarUsuario($tipo) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::FiltrarUsuario();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $tipo);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function ConsultarEmailDuplicadoCadastro($email) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::ConsultarEmailDuplicadoCadastro();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $email);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        $ret = $sql->fetchAll();

        return $ret[0]['contar'];
    }

    public function ConsultarEmailDuplicadoAlterar($email, $id) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::ConsultarEmailDuplicadoAlterar();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $email);
        $sql->bindValue(2, $id);

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        $ret = $sql->fetchAll();

        return $ret[0]['contar'];
    }

    public function AlterarAdminitrador(UsuarioVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::AlterarAdm();
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getSobrenome());
        $sql->bindValue(3, $vo->getID());


        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return - 1;
        }
    }

    public function AlterarFuncionario(UsuarioVO $uservo, FuncionarioVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::AlterarFuncionario();
        $sql = new PDOStatement;
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getEmail_funcionario());
        $sql->bindValue(2, $vo->getTelefone_funcionario());
        $sql->bindValue(3, $vo->getEndereco_funcionario());
        $sql->bindValue(4, $vo->getId_Setor());
        $sql->bindValue(5, $vo->getId_usuario_funcionario());


        $conexao->beginTransaction();


        try {
            $sql->execute();

            $comando = Usuario_sql::AlterarAdm();

            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $uservo->getNome());
            $sql->bindValue(2, $uservo->getSobrenome());
            $sql->bindValue(3, $uservo->getID());

            $sql->execute();

            $conexao->commit();

            return 1;
        } catch (Exception $ex) {
            $conexao->rollBack();

            return - 1;
        }
    }

    public function ValidarLogin($login) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::ValidarLogin();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $login);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

}
