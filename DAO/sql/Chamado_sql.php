<?php

class Chamado_sql{
    
    public static function AbrirChamado() {
        
     $sql = 'insert into 
             tb_chamado 
             (data_abertura, hora_abertura,descricao_problema,situacao, id_equipamento,id_funcionario_setor)
             values(?,?,?,?,?,?)';   
        
     return $sql;
     
    }
    public static function ResultadoGrafico() {
        
     $sql = 'select   
                    (select count(*) from tb_chamado where situacao = 1) as qtd_aguarde,
                    (select count(*) from tb_chamado where situacao = 2) as qtd_atendimento,
                    (select count(*) from tb_chamado where situacao = 3) as qtd_finalizado
                    from tb_chamado'; 

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

                               $sql .= ' and ch.situacao = ?';
                           }




        return $sql;
     
    }
    
    public static function FiltrarChamadosTecnicos($sit) {
        
     $sql = 'select
                    ch.id_chamado,
                    ch.data_abertura,
                    ch.hora_abertura,
                    ch.descricao_problema,
                    ch.situacao,
                    ch.data_atendimento,
                    ch.hora_atendimento,
                    ch.laudo_atendimento,
                    usu_tec.nome_usuario as nome_tecnico,
                    usu_setor.nome_usuario as nome_func_setor,
                    eq.identificacao_equipamento,
                    eq.descricao_equipamento

                    from tb_chamado as ch 

                    inner join tb_funcionario as fu_setor
                        on fu_setor.id_funcionario = ch.id_funcionario_setor
                    inner join tb_usuario as usu_setor 
                        on usu_setor.id_usuario = fu_setor.id_funcionario

                     left join tb_funcionario as fu_tec 
                        on fu_tec.id_funcionario = ch.id_funcionario_tecnico
                     left join tb_usuario as usu_tec 
                        on usu_tec.id_usuario = fu_tec.id_usuario_funcionario

                         inner join 
                    
                              tb_equipamento as eq 
                              
                              on 
                              
                              ch.id_equipamento = eq.id_equipamento
                              
                              ';   

                        if ($sit != '0') {

                               $sql .= ' where ch.situacao = ?';
                           }



        return $sql;
     
    }
    
     public static function AtenderChamado() {

         $sql =' UPDATE tb_chamado set
                situacao = ?,
                data_atendimento = ?,
                hora_atendimento = ?,
                id_funcionario_tecnico = ?
                where id_chamado = ?' ;
                 
        return $sql;

     }          
     public static function FinalizarChamado() {

         $sql =' UPDATE tb_chamado set
             
                situacao = ?,
                data_atendimento = ?,
                hora_atendimento = ?,
                id_funcionario_tecnico = ?,
                laudo_atendimento = ?
                where id_chamado = ?';
                 
        return $sql;

     }          

       public static function DetalharChamados() {
        
     $sql = 'select
                    ch.id_chamado,
                    ch.data_abertura,
                    ch.hora_abertura,
                    ch.descricao_problema,
                    ch.situacao,
                    ch.data_atendimento,
                    ch.hora_atendimento,
                    ch.laudo_atendimento,
                    usu_tec.nome_usuario as nome_tecnico,
                    usu_setor.nome_usuario as nome_func_setor,
                    eq.identificacao_equipamento,
                    eq.descricao_equipamento,
                    setor.nome_setor,
                    setor_tec.nome_setor

                    from tb_chamado as ch 

                    inner join tb_funcionario as fu_setor
                        on fu_setor.id_funcionario = ch.id_funcionario_setor
                    inner join tb_usuario as usu_setor 
                        on usu_setor.id_usuario = fu_setor.id_funcionario
                        
			inner join tb_setor as setor 
                        on setor.id_usuario 
                        
                     left join tb_funcionario as fu_tec 
                        on fu_tec.id_funcionario = ch.id_funcionario_tecnico
                     left join tb_usuario as usu_tec 
                        on usu_tec.id_usuario = fu_tec.id_usuario_funcionario
                        
                        inner join tb_setor as setor_tec
                        on setor.id_usuario 
                              
                         inner join 
                    
                              tb_equipamento as eq 
                              
                              on 
                              
                              ch.id_equipamento = eq.id_equipamento
                              
                              where ch.id_chamado = ?
                              
                              ';   

        return $sql;
     
    }     
       
    public static function DetalharHistoricoChamados() {
        
     $sql = 'select
                    ch.id_equipamento,
                    ch.data_abertura,
                    ch.hora_abertura,
                    ch.descricao_problema,
                    ch.situacao,
                    ch.data_atendimento,
                    ch.hora_atendimento,
                    ch.laudo_atendimento,
                    eq.identificacao_equipamento,
                    eq.descricao_equipamento

                    from tb_chamado as ch 

                         inner join 
                    
                    tb_equipamento as eq 
                              
                         on 
                              
                    ch.id_equipamento = eq.id_equipamento
                              
                     where ch.id_equipamento = ? order by  ch.id_chamado desc';   
                             
        return $sql;
     
    }     
    
}