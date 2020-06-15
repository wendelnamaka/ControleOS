<?php

require_once '../DAO/SetorDao.php';
require_once 'UtilCtrl.php';

class SetorCTRL {

    public function InserirSetor(SetorVO $vo) {

        if ($vo->getNome_setor() == '') {

            return 0;
        }

        $vo->setId_usuario(UtilCtrl::RetornarCodigoLogadoAdm());

        $dao = new SetorDao();

        $ret = $dao->InserirSetor($vo);

        return $ret;
    }

    public function AlterarSetor(SetorVO $vo) {

        if ($vo->getNome_setor() == '') {

            return 0;
        }

        $vo->setId_usuario(UtilCtrl::RetornarCodigoLogadoAdm());

        $dao = new SetorDao();

        $ret = $dao->AlterarSetor($vo);

        return $ret;
    }

    public function ConsultarSetor() {

        $dao = new SetorDao();
        $dados = $dao->ConsultarSetor(UtilCTRL::RetornarCodigoLogadoAdm());

        return $dados;
    }
    public function ExcluirSetor($id) {

        $dao = new SetorDao();
        $dados = $dao->ExcluirSetor($id);
        return $dados;
    }

    
    
}
