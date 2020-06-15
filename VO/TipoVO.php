<?php

 class TipoVO{
     
     private $id_tipo;
     private $nome_tipo;
     private $id_usuario;
     
     
     function getId_tipo() {
         return $this->id_tipo;
     }

     function getNome_tipo() {
         return $this->nome_tipo;
     }

     function getId_usuario() {
         return $this->id_usuario;
     }

     function setId_tipo($id_tipo) {
         $this->id_tipo = trim($id_tipo);
     }

     function setNome_tipo($nome_tipo) {
         $this->nome_tipo = trim($nome_tipo);
     }

     function setId_usuario($id_usuario) {
         $this->id_usuario = trim($id_usuario);
     }


     
     
     
     
     
     
     
     
     
     
 }
