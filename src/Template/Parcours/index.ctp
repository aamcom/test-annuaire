<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="parcours index large-12 medium-8 columns content">
    <h3><?= __('Parcours') ?></h3>
    <?= $this->Html->link(__("Créer un nouveau Parcours"), ['action' => 'add']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('personne_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('societe_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_entree') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_sortie') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parcours as $parcour): ?>
            <tr>
                <td><?= $this->Number->format($parcour->id) ?></td>
                <td><?= $parcour->has('personne') ? $this->Html->link($parcour->personne->nom, ['controller' => 'Personnes', 'action' => 'view', $parcour->personne->id]) : '' ?></td>
                <td><?= $parcour->has('societe') ? $this->Html->link($parcour->societe->nom, ['controller' => 'Societes', 'action' => 'view', $parcour->societe->id]) : '' ?></td>
                <td><?= h($parcour->date_entree) ?></td>
                <td><?= h($parcour->date_sortie) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $parcour->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $parcour->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $parcour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcour->id)]) ?>
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
