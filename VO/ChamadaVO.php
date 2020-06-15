<?php

class ChamadaVO {

    private $id_chamado;
    private $data_abertura;
    private $hora_abertura;
    private $descricao_problema;
    private $situacao;
    private $data_atendimento;
    private $hora_atendimento;
    private $laudo_atendimento;
    private $id_funcionario_setor;
    private $id_equipamento;
    private $id_funcionario_tecnico;

    function getId_chamado() {
        return $this->id_chamado;
    }

    function getData_abertura() {
        return $this->data_abertura;
    }

    function getHora_abertura() {
        return $this->hora_abertura;
    }

    function getDescricao_problema() {
        return $this->descricao_problema;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getData_atendimento() {
        return $this->data_atendimento;
    }

    function getHora_atendimento() {
        return $this->hora_atendimento;
    }

    function getLaudo_atendimento() {
        return $this->laudo_atendimento;
    }

    function getId_funcionario_setor() {
        return $this->id_funcionario_setor;
    }

    function getId_equipamento() {
        return $this->id_equipamento;
    }

    function getId_funcionario_tecnico() {
        return $this->id_funcionario_tecnico;
    }

    function setId_chamado($id_chamado) {
        $this->id_chamado = trim($id_chamado);
    }

    function setData_abertura($data_abertura) {
        $this->data_abertura = trim($data_abertura);
    }

    function setHora_abertura($hora_abertura) {
        $this->hora_abertura = trim($hora_abertura);
    }

    function setDescricao_problema($descricao_problema) {
        $this->descricao_problema = trim($descricao_problema);
    }

    function setSituacao($situacao) {
        $this->situacao = trim($situacao);
    }

    function setData_atendimento($data_atendimento) {
        $this->data_atendimento = trim($data_atendimento);
    }

    function setHora_atendimento($hora_atendimento) {
        $this->hora_atendimento = $hora_atendimento;
    }

    function setLaudo_atendimento($laudo_atendimento) {
        $this->laudo_atendimento = $laudo_atendimento;
    }

    function setId_funcionario_setor($id_funcionario_setor) {
        $this->id_funcionario_setor = $id_funcionario_setor;
    }

    function setId_equipamento($id_equipamento) {
        $this->id_equipamento = $id_equipamento;
    }

    function setId_funcionario_tecnico($id_funcionario_tecnico) {
        $this->id_funcionario_tecnico = $id_funcionario_tecnico;
    }

    
    }


