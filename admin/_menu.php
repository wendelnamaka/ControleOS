<?php
require_once '../CONTROLLER/UtilCtrl.php';

if (isset($_GET['close']) && $_GET['close'] == '1') {
    UtilCtrl::Deslogar();
    exit();
}

$tipo = UtilCtrl::RetornarTipoLogado();
?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <?php if ($tipo == 1) { ?>
                <li class="text-center">
                    <img src="assets/img/girls.png" class="user-image img-responsive"/>
                </li> 
                <li>
                    <a href="adm_inicial.php"><i class="fa fa-home fa-3x"><span class="menu-text-item"></span></i>Inicio</a>
                </li>
                      	
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i>Setor<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_setor_gerenciar.php">Gerenciar</a>
                        </li>  
                    </ul>
                </li>  

                <li>
                    <a href="#"><i class="fa fa-user fa-3x"></i>Funcionário<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_funcionario_novo.php">Novo</a>
                        </li>
                        <li>
                            <a href="adm_funcionario_consultar.php">Consultar / Alterar</a>
                        </li>

                    </ul>
                </li>  

                <li>
                    <a href="#"><i class="fa fa-cogs  fa-3x"></i>Tipo De Equipamento<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_tipo_gerenciar.php">Gerenciar</a>
                        </li>  
                    </ul>
                </li>  

                <li>
                    <a href="#"><i class="fa fa-desktop fa-3x"></i>Modelo Do Equipamento <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_modelo_gerenciar.php">Gerenciar</a>
                        </li>  
                    </ul>
                </li>  

                <li>
                    <a href="#"><i class="fa fa-cog fa-3x"></i>Equipamento<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_equipamento_novo.php">Novo</a>
                        </li>
                        <li>
                            <a href="adm_equipamento_consultar.php">Consultar</a>
                        </li>
                        <li>
                            <a href="adm_equipamento_alocar.php">Alocar no setor</a>
                        </li>
                        <li>
                            <a href="adm_equipamento_remover.php">Remover do setor</a>
                        </li>

                    </ul>
                </li>  
            <?php } elseif ($tipo == 2) { ?>

                <li>
                    <a href="func_meus_dados.php"><i class="fa fa-user fa-3x"></i><span class="menu-text-item"></span>Meus Dados</a>
                </li>  
                <li>
                    <a href="func_novo_chamado.php"><i class="fa fa-user fa-3x"></i><span class="menu-text-item"></span>Abrir Chamado</a>
                </li>  
                <li>
                    <a href="func_minhas_os.php"><i class="fa fa-user fa-3x"></i><span class="menu-text-item"></span>Minhas OS</a>
                </li>  


            <?php } elseif ($tipo == 3) { ?>

                <li>
                    <a href="tec_meus_dados.php"><i class="fa fa-user fa-3x"></i><span class="menu-text-item"></span>Meus Dados</a>
                </li>  
                <li>
                    <a href="tec_consultar_chamados.php"><i class="fa fa-user fa-3x"></i><span class="menu-text-item"></span>Consultar Chamaddos</a>
                </li>    

            <?php } ?>           
            <li>
                <a href="_menu.php?close=1"><i class="fa fa-square-o fa-3x"><span class="menu-text-item"></span></i>Sair</a>
            </li>	
        </ul>

    </div>

</nav>