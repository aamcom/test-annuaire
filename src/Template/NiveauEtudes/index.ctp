<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="niveauEtudes index large-12 medium-12 columns content">
    <h3><?= __('Niveau Etudes') ?></h3>
    <?= $this->Html->link(__("Créer un nouveau Niveau d'étude"), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('libelle') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($niveauEtudes as $niveauEtude): ?>
            <tr>
                <td><?= $this->Number->format($niveauEtude->id) ?></td>
                <td><?= h($niveauEtude->libelle) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $niveauEtude->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $niveauEtude->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $niveauEtude->id], ['confirm' => __('Are you sure you want to delete # {0}?', $niveauEtude->id)]) ?>
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
