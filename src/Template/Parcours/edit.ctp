<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?/*= __('Actions') */?></li>
        <li><?/*= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $parcour->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $parcour->id)]
            )
        */?></li>
        <li><?/*= $this->Html->link(__('List Parcours'), ['action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('List Personnes'), ['controller' => 'Personnes', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New Personne'), ['controller' => 'Personnes', 'action' => 'add']) */?></li>
        <li><?/*= $this->Html->link(__('List Societes'), ['controller' => 'Societes', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New Societe'), ['controller' => 'Societes', 'action' => 'add']) */?></li>
    </ul>
</nav>-->
<div class="parcours form large-12 medium-12 columns content">
    <?= $this->Form->create($parcour) ?>
    <fieldset>
        <legend><?= __('Edit Parcour') ?></legend>
        <?php
            echo $this->Form->input('personne_id', ['options' => $personnes]);
            echo $this->Form->input('societe_id', ['options' => $societes]);
            echo $this->Form->input('date_entree');
            echo $this->Form->input('date_sortie', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
