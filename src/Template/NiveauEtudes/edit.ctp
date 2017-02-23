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
                ['action' => 'delete', $niveauEtude->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $niveauEtude->id)]
            )
        */?></li>
        <li><?/*= $this->Html->link(__('List Niveau Etudes'), ['action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('List Personnes'), ['controller' => 'Personnes', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New Personne'), ['controller' => 'Personnes', 'action' => 'add']) */?></li>
    </ul>
</nav>-->
<div class="niveauEtudes form large-12 medium-12 columns content">
    <?= $this->Form->create($niveauEtude) ?>
    <fieldset>
        <legend><?= __('Edit Niveau Etude') ?></legend>
        <?php
            echo $this->Form->input('libelle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
