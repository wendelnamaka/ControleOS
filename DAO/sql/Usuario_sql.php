<?php

class Usuario_sql {

    public static function InserirUsuario() {
        $sql = 'insert into tb_usuario (nome_usuario,sobrenome,login_usuario,senha_usuario,tipo_usuario)
                 values(?,?,?,?,?)';

        return $sql;
    }

    public static function InserirFuncionario() {
        $sql = 'insert into tb_funcionario (email_funcionario,telefone_funcionario,endereco_funcionario,id_usuario_funcionario,id_usuario_adm,id_setor)
               values(?,?,?,?,?,?)';

        return $sql;
    }

    public static function FiltrarUsuario() {

        $sql = 'select   
       
                usu.id_usuario,
                id_funcionario,
                nome_usuario,
                sobrenome,
                tipo_usuario,
                nome_setor,
                se.id_setor,
                fun.email_funcionario,
                fun.telefone_funcionario,
                fun.endereco_funcionario
                from 
                    tb_usuario as usu 
                    
                    left join 
                    
                    tb_funcionario as fun 
                    
                    on 
                    usu.id_usuario = fun.id_usuario_funcionario
                    
                    left join 
                    
                        tb_setor  as  se 
                        
                        on
                        
                        se.id_setor = fun.id_setor
                        where 
                            usu.tipo_usuario = ?
                            order by usu.nome_usuario;
                            order by usu.sobrenome';


        return $sql;
    }

    public function ConsultarEmailDuplicadoCadastro() {

        $sql = 'select count(*) as contar
                from
                tb_funcionario
       where email_funcionario = ?';

        return $sql;
    }

    public function ConsultarEmailDuplicadoAlterar() {

        $sql = 'select count(*) as contar
                from
                tb_funcionario
       where email_funcionario = ? and id_usuario_funcionario <> ?';

        return $sql;
    }

// diferente dele mesmo <> 
    public static function AlterarAdm() {

        $sql = 'update tb_usuario 
                set nome_usuario = ?,
                sobrenome = ?
                where 
                id_usuario = ?';


        return $sql;
    }

    public static function AlterarFuncionario() {

        $sql = 'update tb_funcionario 
                            set email_funcionario = ?,
                            telefone_funcionario = ?,
                            endereco_funcionario = ?,
                            id_setor = ?
                            
                            where 

                 id_usuario_funcionario = ?';


        return $sql;
    }

    public static function AlterarUsuarioNome() {

        $sql = 'update tb_usuario 
            
                            set nome_usuario = ?
                            where 
                            
                            id_usuario = ?
                 ';

        return $sql;
    }

    public static function AlterarUsuarioFuncionario() {

        $sql = 'update tb_funcionario 
                            set email_funcionario = ?,
                            telefone_funcionario = ?,
                            endereco_funcionario = ?
                            where 

                 id_usuario_funcionario = ?';


        return $sql;
    }

    public function ValidarLogin() {

 $sql = 'select 
                us.senha_usuario,
                us.id_usuario,
                us.tipo_usuario,
                fu.id_setor,
                fu.id_funcionario
                
           from tb_usuario as us                         
      left join tb_funcionario as fu 
             on us.id_usuario = fu.id_usuario_funcionario
          where login_usuario = ?';

        return $sql;
    }

    public function CarregarDadosUsuario() {

        $sql = 'select nome_usuario,
                email_funcionario,
                telefone_funcionario,
                endereco_funcionario
                
                from
                
                tb_funcionario  as f 
                
                inner join
                    
                tb_usuario as u    
                
                on 
                    
                f.id_usuario_funcionario = u.id_usuario

                where 
                
                f.id_usuario_funcionario = ?';



        return $sql;
    }

}
