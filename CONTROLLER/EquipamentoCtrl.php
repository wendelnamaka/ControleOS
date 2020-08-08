<?php

require_once '../DAO/EquipamentoDao.php';
require_once 'UtilCtrl.php';

class EquipamentoCtrl {

    public function InserirEquipamento(EquipamentoVO $vo) {

        if ($vo->getIdentificacao_equipamento() == '' || $vo->getDescricao_equipamento() == '' || $vo->getId_tipo() == '' || $vo->getId_modelo() == '') {
            return 0;
        }

        $vo->setId_usuario_adm(UtilCtrl::RetornarCodigoLogadoAdm());

        $dao = new EquipamentoDao();

        $ret = $dao->InserirEquipamento($vo);

        return $ret;
    }

    public function AlterarEquipamento(EquipamentoVO $vo) {

        if ($vo->getIdentificacao_equipamento() == '' || $vo->getDescricao_equipamento() == '' || $vo->getId_modelo() == '' || $vo->getId_tipo() == '') {
            return 0;
        }
        $vo->setId_usuario_adm(UtilCtrl::RetornarCodigoLogadoAdm());

        $dao = new EquipamentoDao();

        $ret = $dao->AlterarEquipamento($vo);

        return $ret;
    }

    public function FiltrarEquipamento($idMod) {

        $dao = new EquipamentoDao();
        return $dao->FiltrarEquipamento(UtilCtrl::RetornarCodigoLogadoAdm(), $idMod);
    }

    public function FiltrarEquipamentoSetor($idSetor) {

        $dao = new EquipamentoDao();
        return $dao->FiltrarEquipamentoSetor($idSetor);
    }
    public function FiltrarEquipamentoSetorChamado() {

        $dao = new EquipamentoDao();
        return $dao->FiltrarEquipamentoSetorChamado(UtilCtrl::RetornarIdSetor());
    }

    public function DetalharEquipamento($idEquipamento) {

        $dao = new EquipamentoDao();
        return $dao->DetalharEquipamento($idEquipamento, UtilCtrl::RetornarCodigoLogadoAdm());
    }

    public function FiltrarEquipamentoDisponivel() {

        $dao = new EquipamentoDao();
        return $dao->FiltrarEquipamentoDisponivel(UtilCtrl::RetornarCodigoLogadoAdm());
    }

    public function AlocarSetorEquipamento(AlocarVO $vo) {

        $vo->setData_alocar(UtilCtrl::DataAtual());
        $vo->setId_usuario(UtilCtrl::RetornarCodigoLogadoAdm());
        $dao = new EquipamentoDao();
        return $dao->AlocarSetorEquipamento($vo);
    }

    public function RemoverEquipamento(AlocarVO $vo) {

        $dao = new EquipamentoDao();

        $vo->setData_remover(UtilCtrl::DataAtual());

        return $dao->RemoverEquipamento($vo);
    }

}
