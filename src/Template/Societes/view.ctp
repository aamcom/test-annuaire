<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?/*= __('Actions') */?></li>
        <li><?/*= $this->Html->link(__('Edit Societe'), ['action' => 'edit', $societe->id]) */?> </li>
        <li><?/*= $this->Form->postLink(__('Delete Societe'), ['action' => 'delete', $societe->id], ['confirm' => __('Are you sure you want to delete # {0}?', $societe->id)]) */?> </li>
        <li><?/*= $this->Html->link(__('List Societes'), ['action' => 'index']) */?> </li>
        <li><?/*= $this->Html->link(__('New Societe'), ['action' => 'add']) */?> </li>
        <li><?/*= $this->Html->link(__('List Parcours'), ['controller' => 'Parcours', 'action' => 'index']) */?> </li>
        <li><?/*= $this->Html->link(__('New Parcour'), ['controller' => 'Parcours', 'action' => 'add']) */?> </li>
    </ul>
</nav>-->
<div class="societes view large-12 medium-12 columns content">
    <h3><?= h($societe->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($societe->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Siret') ?></th>
            <td><?= h($societe->siret) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse') ?></th>
            <td><?= h($societe->adresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($societe->id) ?></td>
        </tr>
    </table>

    <h4 style="margin: 40px;"><?= $this->Html->link(__('Edit this Societe'), ['controller' => 'Societes', 'action' => 'edit', $societe->id]) ?></h4>

    <div class="related">
        <h4><?= __('Related Parcours') ?></h4>
        <?php if (!empty($societe->parcours)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Personne Id') ?></th>
                <th scope="col"><?= __('Societe Id') ?></th>
                <th scope="col"><?= __('Date Entree') ?></th>
                <th scope="col"><?= __('Date Sortie') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($societe->parcours as $parcours): ?>
            <tr>
                <td><?= h($parcours->id) ?></td>
                <td><?= h($parcours->personne_id) ?></td>
                <td><?= h($parcours->societe_id) ?></td>
                <td><?= h($parcours->date_entree) ?></td>
                <td><?= h($parcours->date_sortie) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Parcours', 'action' => 'view', $parcours->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parcours', 'action' => 'edit', $parcours->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parcours', 'action' => 'delete', $parcours->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcours->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
