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
                ['action' => 'delete', $societe->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $societe->id)]
            )
        */?></li>
        <li><?/*= $this->Html->link(__('List Societes'), ['action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('List Parcours'), ['controller' => 'Parcours', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New Parcour'), ['controller' => 'Parcours', 'action' => 'add']) */?></li>
    </ul>
</nav>-->
<div class="societes form large-12 medium-12 columns content">
    <?= $this->Form->create($societe) ?>
    <fieldset>
        <legend><?= __('Edit Societe') ?></legend>
        <?php
            echo $this->Form->input('siret');
            echo $this->Form->input('nom');
            echo $this->Form->input('adresse');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
