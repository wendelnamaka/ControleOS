<?php

require_once '../DAO/ChamadaDao.php';
require_once 'UtilCtrl.php';

class ChamadaCtrl{
    
    public function AbrirChamado(ChamadaVO $vo){
        
   if($vo->getDescricao_problema() == '' || $vo->getId_equipamento() == ''){
       
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
       
       return $dao->FiltrarMeusChamados(UtilCtrl::RetornarIdFunc(),$sit);
             
 
   }

    
    
}

