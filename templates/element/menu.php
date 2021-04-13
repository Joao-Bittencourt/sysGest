<?php
?><!-- Left Panel -->
<div class="main-header">
    <div class="logo-header" data-background-color="blue">
        <a href="/" class="logo">
            <!--@ToDo verificar logo-->
         <?='';// $this->Html->image('sysGest01.png', ['alt' => 'navbar brand', 'class' => 'navbar-brand']); ?> 
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <?= $this->Html->image('admin.png', ['alt' => 'image profile', 'class' => 'avatar-img rounded-circle']); ?> 
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="u-text ml-auto mr-auto">
                                        <a href="/logout" class="btn btn-xs btn-danger">Sair</a>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>

<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="/" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="/customers" class="collapsed">
                        <i class="fas fa-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/plans" class="collapsed">
                        <i class="fas fa-cart-plus"></i>
                        <p>Planos</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/invoices" class="collapsed">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>Faturas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="collapsed">
                        <i class="fas fa-chart-line"></i>
                        <p>Despesas</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>