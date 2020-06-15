<?php

require_once '../DAO/ModeloDao.php';
require_once 'UtilCtrl.php';

class ModeloCtrl {

    public function InserirModelo(ModeloVO $vo) {

        if ($vo->getNome() == '') {

            return 0;
        }

        $vo->setId_usuario(UtilCtrl::RetornarCodigoUserAdm());
        $dao = new ModeloDao();

        $ret = $dao->InserirModelo($vo);

        return $ret;
    }

    public function AlterarModelo(ModeloVO $vo) {

        if ($vo->getNome() == '') {

            return 0;
        }

        $vo->setId_usuario(UtilCtrl::RetornarCodigoUserAdm());

        $dao = new ModeloDao();

        $ret = $dao->AlterarModelo($vo);

        return $ret;
    }

    public function ConsultarModelo() {

        $dao = new ModeloDao();
        $dados = $dao->ConsultarModelo(UtilCTRL::RetornarCodigoLogadoAdm());

        return $dados;
    }

    public function ExcluirModelo($id) {

        $dao = new ModeloDao();
        $dados = $dao->ExcluirModelo($id);
        return $dados;
    }

}
