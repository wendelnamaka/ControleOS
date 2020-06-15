<?php

class SetorVO{
    
    private $id_setor;
    private $nome_setor;
    private $id_usuario;
    
    function getId_setor() {
        return $this->id_setor;
    }

    function getNome_setor() {
        return $this->nome_setor;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function setId_setor($id_setor) {
        $this->id_setor = trim($id_setor);
    }

    function setNome_setor($nome_setor) {
        $this->nome_setor = trim($nome_setor);
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = trim($id_usuario);
    }


}