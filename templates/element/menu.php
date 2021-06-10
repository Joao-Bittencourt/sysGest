<?php

use Cake\Routing\Router;
?><!-- Sidebar  -->
<nav id="sidebar">
    <div>
        <button type="button" id="sidebarCollapse" class="btn btn-info btn-sm float-right">
            <i class="fas fa-align-left"></i>
        </button>
    </div>
    <br>
    
    <ul class="list-unstyled components">
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-home"></i>
                Home
            </a>


            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#pageSubmenuFinanceiro" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-dollar-sign"></i>
                Financeiro
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenuFinanceiro">

                <li>
                    <a href = <?= Router::url(['controller' => 'Bancos', 'action' => 'listar']); ?>>                    
                        <i class="fas fa-university"></i>
                        Bancos
                    </a>
                </li>
                <li>
                    <a href = <?= Router::url(['controller' => 'Contas', 'action' => 'listar']); ?>>                    
                        <i class="fas fa-id-card"></i>
                        Contas
                    </a>
                </li>

            </ul>
        </li>
        
        <li>
            <a href="#pageSubmenuConfiguracoes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-cog"></i>
                Configurações
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenuConfiguracoes">

               <li>
                    <a href = <?php //echo Router::url(['controller' => 'Bancos', 'action' => 'listar']); ?>>                    
                        <!--<i class="fas fa-university"></i>-->

                    </a>
                </li>
                <!-- 
                <li>
                    <a href = <?php //echo  Router::url(['controller' => 'Contas', 'action' => 'listar']); ?>>                    
                        <i class="fas fa-id-card"></i>

                    </a>
                </li>-->
            </ul>
        </li>
    </ul>
</nav>
