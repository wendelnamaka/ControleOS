<?php

require_once '../DAO/ChamadaDao.php';
require_once 'UtilCtrl.php';

class ChamadaCtrl {

    public function AbrirChamado(ChamadaVO $vo) {

        if ($vo->getDescricao_problema() == '' || $vo->getId_equipamento() == '') {

            return 0;
        }

        $vo->setId_funcionario_setor(UtilCtrl::RetornarIdFunc());
        $vo->setData_abertura(UtilCtrl::DataAtual());
        $vo->setHora_abertura(UtilCtrl::HoraAtual());
        $vo->setSituacao(1);

        $dao = new ChamadaDao();

        $ret = $dao->AbrirChamado($vo);

        return $ret;
    }

    public function FiltrarMeusChamados($sit) {
        $dao = new ChamadaDao();

        return $dao->FiltrarMeusChamados(UtilCtrl::RetornarIdFunc(), $sit);
    }

    public function FiltrarChamadosTecnicos($sit) {
        $dao = new ChamadaDao();

        return $dao->FiltrarChamadosTecnicos($sit);
    }

    public function AtenderChamados(ChamadaVO $vo) {

        $vo->setData_atendimento(UtilCtrl::DataAtual());
        $vo->setHora_atendimento(UtilCtrl::HoraAtual());
        $vo->setId_funcionario_tecnico(UtilCtrl::RetornarIdFunc());
        $vo->setSituacao(2);
         $dao = new ChamadaDao();
        return $dao->AtenderChamado($vo);
    }
    public function FinalizarChamado(ChamadaVO $vo) {

        $vo->setData_atendimento(UtilCtrl::DataAtual());
        $vo->setHora_atendimento(UtilCtrl::HoraAtual());
        $vo->setId_funcionario_tecnico(UtilCtrl::RetornarIdFunc());
        $vo->setSituacao(3);
        $dao = new ChamadaDao();
        return $dao->FinalizarChamado($vo);
    }

    public function DetalharChamados($id) {
        $dao = new ChamadaDao();

        return $dao->DetalharChamados($id);
    }
    
     public function ResultadoGrafico() {
        $dao = new ChamadaDao();

        return $dao->ResultadoGrafico();
    }

}
