<!DOCTYPE html>
<html lang="pt_BR">

    <?= $this->element('header'); ?>
    <body>
        <div class="wrapper">
        <?= $this->element('menu'); ?>

        <div id="content">
            <div class="card">
                <div class="card-header">
                    Bancos
                    <button type="button" id="sidebarCollapse" class="btn btn-info float-right">
                        <i class="fas fa-align-left"></i>
                    </button>

                   <!--</div>;-->
               <!--</nav>-->
                </div>

                <div class="card-body">
                    <?php
                         echo $this->Flash->render();
                         echo $this->fetch('content');
                    ?>
                </div>
            </div>
        </div>
        <?= $this->element('footer'); ?>
        </div>
    </body>
</html>
