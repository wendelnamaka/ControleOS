<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/DAO/UsuarioFuncionarioDAO.php';
require_once 'UtilCtrl.php';

class UsuarioFuncionarioCTRL {

    public static function InserirAdministrador(UsuarioVO $vo) {

        if ($vo->getNome() == '' || $vo->getSobrenome() == '' || $vo->getTipoUsuario() == '') {

            return 0;
        }
        //CRIA o LOGIN com a regra : NOME.SOBREnome
        $login = strtolower(explode(' ', $vo->getNome())[0] . ' ' . explode(' ', $vo->getSobrenome())[1]);

        //PREENCHA O OBJ VO COM O LOGIN GERADO QUE SERÁ O MESMO PARA SENHA
        $vo->setLogin($login);
        $vo->setSenha(password_hash($login, 1));
        $dao = new UsuarioFuncionarioDAO();

        return $dao->InserirAdministrador($vo);
    }

    public function InserirFuncionario(UsuarioVO $user, FuncionarioVO $func) {

        //Cadastrando Tec e Setor

        if ($user->getTipoUsuario() == '' || $user->getNome() == '' || $func->getEmail_funcionario() == '' || $func->getEndereco_funcionario() == '' || $func->getTelefone_funcionario() == '' || $func->getId_setor() == '') {
            return 0;
        }

        $login = strtolower(explode(' ', $user->getNome())[0] . '.' . explode('@', $func->getEmail_funcionario())[1]);
        $user->setLogin($login);


        $senha = strtolower(explode('@', $func->getEmail_funcionario())[0]);
        $user->setSenha(password_hash($senha, 1));

        $func->setId_usuario_adm(UtilCtrl::RetornarCodigoLogadoAdm());

        // echo '<pre>',print_r($func),'</pre>';
        // echo '<pre>',print_r($user),'</pre>';
        $dao = new UsuarioFuncionarioDAO();

        return $dao->InserirFuncionario($user, $func);
    }

    public function FiltrarUsuario($tipo) {

        if ($tipo == '') {

            return 0;
        }

        $dao = new UsuarioFuncionarioDAO();

        $dados = $dao->FiltrarUsuario($tipo);

        return $dados;
    }

    public function AlterarAdminitrador(UsuarioVO $vo) {

        if ($vo->getNome() == '' || $vo->getSobrenome() == '') {

            return 0;
        }

        $dao = new UsuarioFuncionarioDAO();

        return $dao->AlterarAdminitrador($vo);
    }

    public function AlterarFuncionario(UsuarioVO $uservo, FuncionarioVO $vo) {

        if ($uservo->getNome() == '' || $uservo->getSobrenome() == '') {
            return 0;
        }

        if ($vo->getEmail_funcionario() == '' || $vo->getTelefone_funcionario() == '' || $vo->getEndereco_funcionario() == '' || $vo->getId_setor() == '') {

            return 0;
        }

        $dao = new UsuarioFuncionarioDAO();

        return $dao->AlterarFuncionario($uservo, $vo);
    }

    public function ConsultarEmailDuplicadoCadastro($email) {

        $dao = new UsuarioFuncionarioDAO();

        return $dao->ConsultarEmailDuplicadoCadastro($email);
    }

    public function ConsultarEmailDuplicadoAlterar($email, $id) {

        $dao = new UsuarioFuncionarioDAO();

        return $dao->ConsultarEmailDuplicadoAlterar($email, $id);
    }

    public function CarregarDadosUsuario() {
        $dao = new UsuarioFuncionarioDAO();

        return $dao->CarregarDadosUsuario(UtilCtrl::RetornarCodigoLogadoAdm());
    }

    public function ValidarLogin($login, $senha) {

        if (trim($login) == '' || trim($senha) == '') {
            return 0;
        }
        $dao = new UsuarioFuncionarioDAO();

        $user = $dao->ValidarLogin($login);

        if (count($user) > 0) {

            if (password_verify($senha, $user[0]['senha_usuario'])) {
                
                UtilCtrl::CriarSessao($user[0]['id_usuario'], $user[0]['tipo_usuario'],$user[0]['id_setor'] == ''? '' : $user[0]['id_setor']);

                switch ($user[0]['tipo_usuario']) {

                    case 1:
                        header('location: adm_equipamento_alocar.php');

                        break;

                    case 2:

                        header('location: func_novo_chamado.php');

                        break;

                    case 3:

                        header('location: tec_consultar_chamados.php');

                        break;
                }
            } else {

                return -4;
            }
        } else {
            return -3;
        }
    }

    public function AlterarUsuarioFuncionario(FuncionarioVO $vo) {

        $vo->setId_usuario_adm(UtilCtrl::RetornarCodigoLogadoAdm());
        $dao = new UsuarioFuncionarioDAO();
        
        return $dao->AlterarUsuarioFuncionario($vo);

    }

}
