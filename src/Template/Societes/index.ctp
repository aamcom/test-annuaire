<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="societes index large-12 medium-8 columns content">
    <h3><?= __('Societes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('siret') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adresse') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($societes as $societe): ?>
            <tr>
                <td><?= $this->Number->format($societe->id) ?></td>
                <td><?= h($societe->siret) ?></td>
                <td><?= h($societe->nom) ?></td>
                <td><?= h($societe->adresse) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $societe->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $societe->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $societe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $societe->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
