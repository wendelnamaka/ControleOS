<?php

require_once 'Conexao.php';
require_once 'sql/Chamado_sql.php';

class ChamadaDao extends Conexao {

    public function AbrirChamado(ChamadaVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::AbrirChamado();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getData_abertura());
        $sql->bindValue(2, $vo->getHora_abertura());
        $sql->bindValue(3, $vo->getDescricao_problema());
        $sql->bindValue(4, $vo->getSituacao());
        $sql->bindValue(5, $vo->getId_equipamento());
        $sql->bindValue(6, $vo->getId_funcionario_setor());

        try {

            $sql->execute();
            return 1;
        } catch (Exception $ex) {

            return -1;
        }
    }

    public function ResultadoGrafico() {
        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::ResultadoGrafico();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function FiltrarMeusChamados($idFunc, $sit) {
        $conexao = parent::retornaConexao();

        $comando = Chamado_sql::FiltrarMeusChamados($sit);
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idFunc);

        if ($sit != '0') {
            $sql->bindValue(2, $sit);
        }
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function FiltrarChamadosTecnicos($sit) {
        $conexao = parent::retornaConexao();

        $comando = Chamado_sql::FiltrarChamadosTecnicos($sit);
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        if ($sit != '0') {
            $sql->bindValue(1, $sit);
        }
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharChamados($id) {
        $conexao = parent::retornaConexao();

        $comando = Chamado_sql::DetalharChamados();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $id);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AtenderChamado(ChamadaVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::AtenderChamado();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getSituacao());
        $sql->bindValue(2, $vo->getData_atendimento());
        $sql->bindValue(3, $vo->getHora_atendimento());
        $sql->bindValue(4, $vo->getId_funcionario_tecnico());
        $sql->bindValue(5, $vo->getId_chamado());

        try {

            $sql->execute();
            return 3;
        } catch (Exception $ex) {


            echo $ex->getMessage();

            return -1;
        }
    }

    public function FinalizarChamado(ChamadaVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::FinalizarChamado();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getSituacao());
        $sql->bindValue(2, $vo->getData_atendimento());
        $sql->bindValue(3, $vo->getHora_atendimento());
        $sql->bindValue(4, $vo->getId_funcionario_tecnico());
        $sql->bindValue(5, $vo->getLaudo_atendimento());
        $sql->bindValue(6, $vo->getId_chamado());

        try {

            $sql->execute();
            return 4;
        } catch (Exception $ex) {

            return -1;
        }
    }

}
