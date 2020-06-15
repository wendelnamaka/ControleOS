<?php

require_once 'Conexao.php';
require_once 'sql/Tipo_sql.php';

class TipoDao extends Conexao{
    
    public function InserirTipo(TipoVO $vo) {
        
        $conexao = parent::retornaConexao();
        
        $comando = Tipo_sql::InserirTipo();
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $vo->getNome_tipo());
        $sql->bindValue(2, $vo->getId_usuario());
        
        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            
            return -1;
        }
    }
        public function AlterarTipo(TipoVO $vo){
        
        $conexao = parent::retornaConexao();
        $comando = Tipo_sql::AlterarTipo();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getNome_tipo());
        $sql->bindValue(2, $vo->getId_usuario());
        $sql->bindValue(3, $vo->getId_tipo());
        
        try {
        
            $sql->execute();
            return 1;
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
            
            return -1;
        }
    }
       public function ExcluirTipo($idTipo) {
        
        $conexao = parent::retornaConexao();
        $comando = Tipo_sql::ExcluirTipo();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idTipo);
        
        try {
        
            $sql->execute();
            return 1;
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();

        }
        
    }
 
         public function ConsultarTipo() {

        $conexao = parent::retornaConexao();

        $comando = Tipo_sql::Consultartipo();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        //Elimina o indicine das colunas ,deixandos  o que indices que foram citados.
        $sql->setFetchMode(PDO::FETCH_ASSOC);
            
        $sql->execute();

        return $sql->fetchAll();
    }
    

     
}