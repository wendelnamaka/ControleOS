<?php

class Modelo_sql {

    public static function InserirModelo() {

        $sql = 'insert into tb_modelo (nome,id_usuario)values(?,?)';

        return $sql;
    }

    public static function AlterarModelo() {

        $sql = 'update tb_modelo set nome = ?, id_usuario = ? where id_modelo = ?';


        return $sql;
    }

    public static function ConsultarModelo() {
        $sql = 'select id_usuario,nome, id_modelo from tb_modelo order by nome';

        return $sql;
    }

    public static function ExcluirModelo() {
        $sql = 'delete from tb_modelo where id_modelo = ?';

        return $sql;
    }
} 