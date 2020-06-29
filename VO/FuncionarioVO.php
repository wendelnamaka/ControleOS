<?php

   // echo "<pre>";
   // print_r($vofunc);
   // echo "</pre>";
class FuncionarioVO {

    private $id_funcionario;
    private $email_funcionario;
    private $telefone_funcionario;
    private $endereco_funcionario;
    private $id_usuario_funcionario;
    private $id_usuario_adm;
    private $id_setor;
    
   
    public function getId_funcionario() {
        return $this->id_funcionario;
    }

    public function getEmail_funcionario() {
        return $this->email_funcionario;
    }

    public function getTelefone_funcionario() {
        return $this->telefone_funcionario;
    }

    public function getEndereco_funcionario() {
        return $this->endereco_funcionario;
    }

    public function getId_usuario_funcionario() {
        return $this->id_usuario_funcionario;
    }

    public function getId_usuario_adm() {
        return $this->id_usuario_adm;
    }

    public function getId_setor() {
        return $this->id_setor;
    }

    public function setId_funcionario($id_funcionario) {
        $this->id_funcionario = $id_funcionario;
    }

    public function setEmail_funcionario($email_funcionario) {
        $this->email_funcionario = trim($email_funcionario);
    }

    public function setTelefone_funcionario($telefone_funcionario) {
        $this->telefone_funcionario = trim($telefone_funcionario);
    }

    public function setEndereco_funcionario($endereco_funcionario) {
        $this->endereco_funcionario = trim($endereco_funcionario);
    }

    public function setId_usuario_funcionario($id_usuario_funcionario) {
        $this->id_usuario_funcionario = $id_usuario_funcionario;
    }

    public function setId_usuario_adm($id_usuario_adm) {
        $this->id_usuario_adm = $id_usuario_adm;
    }

    public function setId_setor($id_setor) {
        $this->id_setor = $id_setor;
    }




}
