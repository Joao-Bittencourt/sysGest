<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoPessoa $tipoPessoa
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipoPessoa->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipoPessoa->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tipo Pessoas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tipoPessoas form content">
            <?= $this->Form->create($tipoPessoa) ?>
            <fieldset>
                <legend><?= __('Edit Tipo Pessoa') ?></legend>
                <?php
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
