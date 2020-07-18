<?php

class ModeloVO {

    private $id_modelo;
    private $nome;
    private $id_usuario;


    public function getId_modelo() {
        return $this->id_modelo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_modelo($id_modelo) {
        $this->id_modelo = trim($id_modelo);
    }

    public function setNome($nome) {
        $this->nome = trim($nome);
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = trim($id_usuario);
    }


}
