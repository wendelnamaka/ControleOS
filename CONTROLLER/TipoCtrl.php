<?php

require_once '../DAO/TipoDao.php';
require_once 'UtilCtrl.php';

class TipoCTRL{
    
    public function InserirTipo(TipoVO $vo) {
        
        if ($vo->getNome_tipo() == ''){
            return 0;
        }
        
        $vo->setId_usuario(UtilCtrl::RetornarCodigoLogadoAdm());
        $dao = new TipoDao();
        
        $ret = $dao->InserirTipo($vo);
        
        return $ret;
        
    }
    
        public function AlterarTipo(TipoVO $vo) {

        if ($vo->getNome_tipo() == '') {

            return 0;
        }

        $vo->setId_usuario(UtilCtrl::RetornarCodigoLogadoAdm());

        $dao = new TipoDao();

        $ret = $dao->AlterarTipo($vo);

        return $ret;
    }

    public function ConsultarTipo() {

        $dao = new TipoDao();
        $dados = $dao->ConsultarTipo(UtilCtrl::RetornarCodigoLogadoAdm());

        return $dados;
    }
    
      public function ExcluirTipo($id) {

        $dao = new TipoDao();
        $dados = $dao->ExcluirTipo($id);
        return $dados;
    }

 
    
    
}