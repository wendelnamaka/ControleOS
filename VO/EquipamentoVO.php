<?php

 class EquipamentoVO{
     
     private $id_equipamento;
     private $identificacao_equipamento;
     private $descricao_equipamneto;
     private $id_tipo;
     private $id_movimento; 
     private $id_usuario;
     
     
     
     
     function getId_equipamento() {
         return $this->id_equipamento;
     }

     function getIdentificacao_equipamento() {
         return $this->identificacao_equipamento;
     }

     function getDescricao_equipamneto() {
         return $this->descricao_equipamneto;
     }

     function getId_tipo() {
         return $this->id_tipo;
     }

     function getId_movimento() {
         return $this->id_movimento;
     }

     function setId_equipamento($id_equipamento) {
         $this->id_equipamento = trim($id_equipamento);
     }

     function setIdentificacao_equipamento($identificacao_equipamento) {
         $this->identificacao_equipamento = trim($identificacao_equipamento);
     }

     function setDescricao_equipamneto($descricao_equipamneto) {
         $this->descricao_equipamneto = trim($descricao_equipamneto);
     }

     function setId_tipo($id_tipo) {
         $this->id_tipo = trim($id_tipo);
     }

     function setId_movimento($id_movimento) {
         $this->id_movimento = trim($id_movimento);
     }


     
     
     
 }