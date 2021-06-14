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
            <?= $this->Html->link(__('Edit Tipo Pessoa'), ['action' => 'edit', $tipoPessoa->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Tipo Pessoa'), ['action' => 'delete', $tipoPessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoPessoa->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tipo Pessoas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Tipo Pessoa'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tipoPessoas view content">
            <h3><?= h($tipoPessoa->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($tipoPessoa->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pessoa') ?></th>
                    <td><?= $tipoPessoa->has('pessoa') ? $this->Html->link($tipoPessoa->pessoa->id, ['controller' => 'Pessoas', 'action' => 'view', $tipoPessoa->pessoa->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tipoPessoa->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($tipoPessoa->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($tipoPessoa->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('modified') ?></th>
                    <td><?= h($tipoPessoa->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
