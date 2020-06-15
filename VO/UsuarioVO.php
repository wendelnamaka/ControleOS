<?php

class UsuarioVO {

    private $id;
    private $nome;
    private $sobrenome;
    private $login_usuario;
    private $senha_usuario;
    private $tipo_usuario;

    public function setID($id) {
        $this->id = trim($id);
    }

    public function getID() {
        return $this->id;
    }

    public function setNome($nome) {

        $this->nome = trim($nome);
    }

    public function getNome() {
        return $this->nome;
    }
    public function getSobrenome() {
        return $this->sobrenome;
    }
    
    public function setSobrenome($sobrenome) {

        $this->sobrenome = trim($sobrenome);
    }
    
    public function setLogin($login_usuario) {

        $this->login_usuario = trim($login_usuario);
    }

    public function getLogin() {

        return $this->login_usuario;
    }

    public function setSenha($senha_usuario) {

        $this->senha_usuario = trim($senha_usuario);
    }

    public function getSenha() {
        return $this->senha_usuario;
    }

    public function setTipoUsuario($tipo_usuario) {

        $this->tipo_usuario = trim($tipo_usuario);
    }
    
    public function getTipoUsuario() {

         return $this->tipo_usuario;
    }

}
