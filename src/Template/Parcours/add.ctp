<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="parcours form large-12 medium-12 columns content">
    <?= $this->Form->create($parcour) ?>
    <fieldset>
        <legend><?= __('Créer Parcour') ?></legend>
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
