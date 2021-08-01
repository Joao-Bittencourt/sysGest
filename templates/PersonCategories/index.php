<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoPessoa[]|\Cake\Collection\CollectionInterface $tipoPessoas
 */
?>
<div class="tipoPessoas index content">
    <?= $this->Html->link(__('New Tipo Pessoa'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tipo Pessoas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($person_categories as $tipoPessoa): ?>
                <tr>
                    <td><?= $this->Number->format($tipoPessoa->id) ?></td>
                    <td><?= h($tipoPessoa->tipo) ?></td>
                    <td><?= h($tipoPessoa->created) ?></td>
                    <td><?= h($tipoPessoa->modified) ?></td>
                    <td><?= $this->Number->format($tipoPessoa->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tipoPessoa->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoPessoa->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoPessoa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoPessoa->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
