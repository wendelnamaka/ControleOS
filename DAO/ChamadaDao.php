<?php

require_once 'Conexao.php';
require_once 'sql/Chamado_sql.php';

class ChamadaDao extends Conexao{
    
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
            
        } catch (Exception $ex){
            
            return -1 ;
            
        }
               
    }
        public function FiltrarMeusChamados($idFunc, $sit) {
            $conexao = parent::retornaConexao();
            
            $comando = Chamado_sql::FiltrarMeusChamados($sit);
            $sql = new PDOStatement();
            $sql = $conexao->prepare($comando);
            
            $sql->bindValue(1,$idFunc);
            
            if($sit != '0'){
                $sql->bindValue(2, $sit);
            }
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            
            $sql->execute();
            
            return $sql->fetchAll();

        }
     
}