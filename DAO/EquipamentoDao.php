<?php

require_once 'Conexao.php';
require_once 'sql/Equipamento_sql.php';

class EquipamentoDao extends Conexao {

    public function InserirEquipamento(EquipamentoVO $vo) {

        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::InserirEquipamento();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getIdentificacao_equipamento());
        $sql->bindValue(2, $vo->getDescricao_equipamento());
        $sql->bindValue(3, $vo->getId_tipo());
        $sql->bindValue(4, $vo->getId_modelo());
        $sql->bindValue(5, $vo->getId_usuario_adm());

        try {

            $sql->execute();
            return 1;
        } catch (Exception $ex) {

            return -1;
        }
    }

    public function FiltrarEquipamento($idUser, $idMod) {

        $conexao = parent::retornaConexao();
        $comando = Equipamento_sql::FiltrarEquipamento();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idMod);
        $sql->bindValue(2, $idUser);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function FiltrarEquipamentoSetor($idSetor) {

        $conexao = parent::retornaConexao();
        $comando = Equipamento_sql::FiltrarEquipamentoSetor();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idSetor);

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function FiltrarEquipamentoSetorChamado($idSetor) {

        $conexao = parent::retornaConexao();
        $comando = Equipamento_sql::FiltrarEquipamentoSetorChamado();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idSetor);

        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharEquipamento($idEquipamento, $idUser) {

        $conexao = parent::retornaConexao();
        $comando = Equipamento_sql::DetalharEquipamento();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idEquipamento);
        $sql->bindValue(2, $idUser);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function AlterarEquipamento(EquipamentoVO $vo) {

        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::AlterarEquipamento();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getIdentificacao_equipamento());
        $sql->bindValue(2, $vo->getDescricao_equipamento());
        $sql->bindValue(3, $vo->getId_tipo());
        $sql->bindValue(4, $vo->getId_modelo());
        $sql->bindValue(5, $vo->getId_usuario_adm());
        $sql->bindValue(6, $vo->getId_equipamento());


        try {

            $sql->execute();
            return 1;
        } catch (Exception $ex) {

            return -1;
        }
    }

    public function FiltrarEquipamentoDisponivel($idUser) {

        $conexao = parent::retornaConexao();
        $comando = Equipamento_sql::FiltrarEquipamentoDisponivel();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idUser);
        $sql->bindValue(2, $idUser);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function AlocarSetorEquipamento(AlocarVO $vo) {

        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::AlocarSetorEquipamento();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getData_alocar());
        $sql->bindValue(2, $vo->getId_setor());
        $sql->bindValue(3, $vo->getId_Equipamento());
        $sql->bindValue(4, $vo->getId_usuario());

        try {

            $sql->execute();
            return 1;
        } catch (Exception $ex) {

            return -1;
        }
    }

    public function RemoverEquipamento(AlocarVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Equipamento_sql::RemoverEquipamentoSetor();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getData_remover());
        $sql->bindValue(2, $vo->getId_alocar());

        try {

            $sql->execute();
            return 1;
        } catch (Exception $ex) {

            return -1;
        }
    }

    public function ConsultarEquipamento($idAdm) {
        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::ConsultarEquipamento();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idAdm);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

}
