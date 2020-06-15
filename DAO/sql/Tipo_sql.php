<?php


class Tipo_sql {
    //put your code here
    public static function InserirTipo() {
        
        $sql = 'insert into tb_tipo (nome_tipo,id_usuario)values(?,?)';
        return $sql;
        
    }
    public static function AlterarTipo() {
        
      $sql = 'update tb_tipo set nome_tipo = ?, id_usuario = ? where id_tipo = ?';

        
        return $sql;
    }
    public static function ExcluirTipo(){
        $sql = 'delete from tb_tipo where id_tipo = ?';
        
        return $sql;
        
    }
    public static function ConsultarTipo() {
        $sql = 'select id_usuario,nome_tipo, id_tipo from tb_tipo order by nome_tipo';
        
        return $sql;
    }
    
    
    
    
}
