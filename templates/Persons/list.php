<?php
use Cake\Routing\Router;
?>

<div class="card">
    <div class="card-header">
        <?php echo 'PESSOAS ';?>
        <a class="btn btn-info btn-sm float-right" href="<?= Router::url(['controller' => 'Pessoas', 'action' => 'cadastrar']); ?>">
            <i class="bi bi-clipboard-minus"></i>
        </a>
    </div>
    <div class="card-body">
        <?php
        echo $this->Field->elementPaginator($this->Paginator);
        include('_lista_pessoa.php');
        ?>

    </div>
</div>