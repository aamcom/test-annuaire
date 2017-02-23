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
                ['action' => 'delete', $personne->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $personne->id)]
            )
        */?></li>
        <li><?/*= $this->Html->link(__('List Personnes'), ['action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('List Niveau Etudes'), ['controller' => 'NiveauEtudes', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New Niveau Etude'), ['controller' => 'NiveauEtudes', 'action' => 'add']) */?></li>
        <li><?/*= $this->Html->link(__('List Parcours'), ['controller' => 'Parcours', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New Parcour'), ['controller' => 'Parcours', 'action' => 'add']) */?></li>
    </ul>
</nav>-->
<div class="personnes form large-12 medium-12 columns content">
    <?= $this->Form->create($personne) ?>
    <fieldset>
        <legend><?= __('Edit Personne') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('civilite');
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('date_naissance');
            echo $this->Form->input('adresse');
            echo $this->Form->input('cp');
            echo $this->Form->input('ville');
            echo $this->Form->input('photo');
            echo $this->Form->input('permis');
            echo $this->Form->input('niveau_etude_id', ['options' => $niveauEtudes, 'empty' => true]);
            echo $this->Form->input('longitude');
            echo $this->Form->input('latitude');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
