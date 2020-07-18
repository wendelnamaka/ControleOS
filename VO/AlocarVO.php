<?php

class AlocarVO {

    private $id_alocar;
    private $data_alocar;
    private $data_remover;
    private $id_equipamento;
    private $id_usuario;
    private $id_setor;

    function getId_alocar() {
        return $this->id_alocar;
    }

    function getData_alocar() {
        return $this->data_alocar;
    }

    function getData_remover() {
        return $this->data_remover;
    }

    function getId_equipamento() {
        return $this->id_equipamento;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_setor() {
        return $this->id_setor;
    }

    function setId_alocar($id_alocar) {
        $this->id_alocar = $id_alocar;
    }

    function setData_alocar($data_alocar) {
        $this->data_alocar = $data_alocar;
    }

    function setData_remover($data_remover) {
        $this->data_remover = $data_remover;
    }

    function setId_equipamento($id_equipamento) {
        $this->id_equipamento = $id_equipamento;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_setor($id_setor) {
        $this->id_setor = $id_setor;
    }


}
