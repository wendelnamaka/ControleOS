<?php

 class EquipamentoVO{
     
     private $id_equipamento;
     private $identificacao_equipamento;
     private $descricao_equipamento;
     private $id_tipo;
     private $id_modelo; 
     private $id_usuario_adm;
     
     function getId_equipamento() {
         return $this->id_equipamento;
     }

     function getIdentificacao_equipamento() {
         return $this->identificacao_equipamento;
     }

     function getDescricao_equipamento() {
         return $this->descricao_equipamento;
     }

     function getId_tipo() {
         return $this->id_tipo;
     }

     function getId_modelo() {
         return $this->id_modelo;
     }

     function getId_usuario_adm() {
         return $this->id_usuario_adm;
     }

     function setId_equipamento($id_equipamento) {
         $this->id_equipamento = $id_equipamento;
     }

     function setIdentificacao_equipamento($identificacao_equipamento) {
         $this->identificacao_equipamento = (trim($identificacao_equipamento));
     }

     function setDescricao_equipamento($descricao_equipamento) {
         $this->descricao_equipamento = (trim($descricao_equipamento));
     }

     function setId_tipo($id_tipo) {
         $this->id_tipo = $id_tipo;
     }

     function setId_modelo($id_modelo) {
         $this->id_modelo = $id_modelo;
     }

     function setId_usuario_adm($id_usuario_adm) {
         $this->id_usuario_adm = $id_usuario_adm;
     }


     
     
 }