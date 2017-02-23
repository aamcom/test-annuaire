<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Parcour'), ['action' => 'edit', $parcour->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Parcour'), ['action' => 'delete', $parcour->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parcour->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parcours'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parcour'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personnes'), ['controller' => 'Personnes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personne'), ['controller' => 'Personnes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Societes'), ['controller' => 'Societes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Societe'), ['controller' => 'Societes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parcours view large-9 medium-8 columns content">
    <h3><?= h($parcour->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Personne') ?></th>
            <td><?= $parcour->has('personne') ? $this->Html->link($parcour->personne->id, ['controller' => 'Personnes', 'action' => 'view', $parcour->personne->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Societe') ?></th>
            <td><?= $parcour->has('societe') ? $this->Html->link($parcour->societe->id, ['controller' => 'Societes', 'action' => 'view', $parcour->societe->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($parcour->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Entree') ?></th>
            <td><?= h($parcour->date_entree) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Sortie') ?></th>
            <td><?= h($parcour->date_sortie) ?></td>
        </tr>
    </table>
</div>
