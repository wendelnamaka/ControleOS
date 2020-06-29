<?php

class Equipamento_sql {

    public function InserirEquipamento() {

        $sql = 'insert into tb_equipamento (identificacao_equipamento, descricao_equipamento, id_tipo,id_modelo, id_usuario)values(?,?,?,?,?)';

        return $sql;
    }

    public static function FiltrarEquipamento() {

        $sql = 'select 
                        eq.id_equipamento,
                        nome_tipo,
                        nome,
                        identificacao_equipamento,
                        descricao_equipamento
                        
                    from
                            tb_equipamento as eq
                            
                            inner join
                                tb_modelo as mo
                                
                                on
                                
                                eq.id_modelo = mo.id_modelo
                                
                                inner join
                                
                                tb_tipo as ti
                                
                                on 
                                
                                ti.id_tipo = eq.id_tipo
                                
                                where 
                                    eq.id_modelo = ?
                                    
                                and
                                
                                eq.id_usuario = ?';

        return $sql;
    }

    public static function DetalharEquipamento() {

        $sql = 'select 
                        eq.id_equipamento,
                        id_tipo,
                        id_modelo,
                        identificacao_equipamento,
                        descricao_equipamento
                        
                    from
                            tb_equipamento as eq
                            
                            where             
                            
                            eq.id_equipamento = ?
                            
                            and

                            eq.id_usuario = ?';

        return $sql;
    }

    public static function AlterarEquipamento() {

       $sql = 'update tb_equipamento set identificacao_equipamento=?, descricao_equipamento=?, id_tipo=?,id_modelo=? where id_usuario = ? and id_equipamento=?';


        return $sql;
    }

}
