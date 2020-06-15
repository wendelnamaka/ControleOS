<?php

require_once '../DAO/ChamadaDao.php';

class ChamadaCtrl{
    
    public function InserirChamada (ChamadaVO $vo){
        
     if ($vo->getData_abertura() == ''){
         
         return 0;
     }
     if ($vo->getData_atendimento() == ''){
         
         return 0;
     }
     
     if($vo->getDescricao_problema() == ''){
         
         return 0;
     }
     if($vo->getHora_abertura() == ''){
         
         return 0;
     }
     if($vo->getHora_atendimento() == ''){
         
         return 0;
     }
     if($vo->getId_chamado() == ''){
         
         return 0;
     }
     if($vo->getId_equipamento() == ''){
         
         return 0;
         
     }
     if($vo->getId_funcionario_setor() == ''){
         
         return 0;
     }
     if($vo->getId_funcionario_tecnico() == ''){
         
         return 0;
     }
     if($vo->getLaudo_atendimento() == ''){
         
         return 0;
     }
     if($vo->getSituacao() == ''){
         
         return 0;
         
     }

        $vo->setId_usuario(UtilCtrl::RetornarCodigoUserAdm());
        
        $dao = new ChamadaDao();
        
        $ret = $dao->InserirChamada($vo);
        
        return $ret;
        
    }
    
    
    
    
}