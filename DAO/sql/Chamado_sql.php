<?php

class Chamado_sql{
    
    public static function AbrirChamado() {
        
     $sql = 'insert into 
             tb_chamado 
             (data_abertura, hora_abertura, descricao_problema, situacao, id_equipamento,id_funcionario_setor)
             values(?,?,?,?,?,?)';   
        
     return $sql;
     
    }

    
    
}