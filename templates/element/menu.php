<?php
use Cake\Routing\Router;
 ?><!-- Sidebar  -->
<nav id="sidebar">
<!--    <div class="sidebar-header">
    <i class="fas fa-align-left"></i>
    </div>;-->
    <ul class="list-unstyled components">
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-home"></i>
                Home
            </a>
            
            
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>
<!--        <li>
            <a href="#">
                <i class="fas fa-briefcase"></i>
                About
            </a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i>
                Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-image"></i>
                Portfolio
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-question"></i>
                FAQ
            </a>
        </li>-->
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-cog"></i>
                Config
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                
                <li>
                    <a href = <?= Router::url(['controller' => 'Bancos', 'action' => 'listar']); ?>>                    
                        <i class="fas fa-cog"></i>
                        Bancos
                    </a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
            </li>
    </ul>
</nav>
