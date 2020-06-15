<?php

require_once '../DAO/EquipamentoDao.php';

class EquipamentoCtrl {

    public function InserirEquipamento(EquipamentoVO $vo) {
            
        if($vo->getDescricao_equipamneto() == ''){
            return 0;
        }
        if($vo->getId_equipamento() == ''){
            return 0;
        }    
        if($vo->getId_movimento() == ''){
            
            return 0;
        }
        if($vo->getId_tipo() == ''){
            
            return 0;
        }
        if($vo->getIdentificacao_equipamento() == ''){
            
            return 0;
        }
        
        $vo->setId_usuario(UtilCtrl::RetornarCodigoUserAdm());
        $dao = new EquipamentoDao();
        
        $ret = $dao->InserirEquipamento($vo);
        return $ret;
    }

}
