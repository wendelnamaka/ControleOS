<?php

class Chamado_sql{
    
    public static function AbrirChamado() {
        
     $sql = 'insert into 
             tb_chamado 
             (data_abertura, hora_abertura,descricao_problema,situacao, id_equipamento,id_funcionario_setor)
             values(?,?,?,?,?,?)';   
        
     return $sql;
     
    }
    
   
    public static function FiltrarMeusChamados($sit) {
        
     $sql = 'select
                    ch.data_abertura,
                    ch.hora_abertura,
                    ch.descricao_problema,
                    ch.situacao,
                    ch.data_atendimento,
                    ch.hora_atendimento,
                    ch.laudo_atendimento,
                    us.nome_usuario as nome_tecnico,
                    eq.identificacao_equipamento,
                    eq.descricao_equipamento

                    from tb_chamado as ch 
                    
                    inner join 
                    
                              tb_equipamento as eq 
                              
                              on 
                              
                              ch.id_equipamento = eq.id_equipamento
                              
                              left join
                              
                              tb_funcionario as fu 
                              
                              on
                              
                              fu.id_funcionario = ch.id_funcionario_tecnico
                                                            
                              left join     
                              
                              tb_usuario as us 
                              
                              on 
                               
                              us.id_usuario = fu.id_usuario_funcionario
                              
                              where 
                              
                              ch.id_funcionario_setor = ?
';   

                        if ($sit != '0') {

                               $sql .= ' and ch.situacao_chamado = ?';
                           }




        return $sql;
     
    }
    
   

    
    
}