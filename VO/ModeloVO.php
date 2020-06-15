<?php

class ModeloVO {

    private $id_modelo;
    private $nome;
    private $id_usuario;


    function getId_modelo() {
        return $this->id_modelo;
    }

    function getNome() {
        return $this->nome;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_modelo($id_modelo) {
        $this->id_modelo = trim($id_modelo);
    }

    function setNome($nome) {
        $this->nome = trim($nome);
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = trim($id_usuario);
    }


}
