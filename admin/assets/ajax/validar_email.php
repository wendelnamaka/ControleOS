<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/CONTROLLER/UsuarioFuncionarioCTRL.php';



if (isset($_POST['email_user']) && $_POST['acao'] == 'I'){
    
    $email = $_POST['email_user'];
    $ctrl =  new UsuarioFuncionarioCTRL();
    
    if($ctrl->ConsultarEmailDuplicadoCadastro($email) == 1){
        
        echo '1';
        
    }else{
        
        echo '0';
    }

}
else if (isset($_POST['email_user']) && isset($_POST['idUser']) && $_POST['acao'] == 'A'){
    
    $email = $_POST['email_user'];
    $id = $_POST['idUser'];
    
    $ctrl =  new UsuarioFuncionarioCTRL();
    
    if($ctrl->ConsultarEmailDuplicadoAlterar($email , $id) == 1){
        
        echo '1';
        
    }else{
        
        echo '0';
    }

}
