<?php

require_once 'Conexao.php';
require_once 'sql/Setor_sql.php';

class SetorDao extends Conexao{
    
    public function InserirSetor(SetorVO $vo) {
        
        //Cria uma varialvel que recebe o obj de conexao
        $conexao = parent::retornaConexao();
        
        $comando = Setor_sql::InserirSetor();
        
        //Cria o obj que será configurado e execitado no BD
        $sql = new PDOStatement();
        
        //Vincular no obj sql a conexao que estará preparada pra o COMANDO
        $sql = $conexao->prepare($comando);
        
        //Vincular os VALORES(pontoo de interrogação que esta no comando SQL) com o valor do parametro.
        $sql->bindValue(1, $vo->getNome_setor());
        $sql->bindValue(2, $vo->getId_usuario());
        
        try{
            $sql->execute();
            return 1;
            
        }  catch (Exception $ex){
            
            return -1;
        }

    }
     
    public function AlterarSetor(SetorVO $vo){
        
        $conexao = parent::retornaConexao();
        $comando = Setor_sql::AlterarSetor();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $vo->getNome_setor());
        $sql->bindValue(2, $vo->getId_usuario());
        $sql->bindValue(3, $vo->getId_setor());
        
        try {
        
            $sql->execute();
            return 1;
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
            
            return -1;
        }
    }
    
    public function ExcluirSetor($idSetor) {
        
        $conexao = parent::retornaConexao();
        $comando = Setor_sql::ExcluirSetor();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idSetor);
        
        try {
        
            $sql->execute();
            return 1;
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();

        }
        
    }
        public function ConsultarSetor() {

        $conexao = parent::retornaConexao();

        $comando = Setor_sql::ConsultarSetor();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        //Elimina o indicine das colunas ,deixandos  o que indices que foram citados.
        $sql->setFetchMode(PDO::FETCH_ASSOC);
            
        $sql->execute();

        return $sql->fetchAll();
    }
    
    
}