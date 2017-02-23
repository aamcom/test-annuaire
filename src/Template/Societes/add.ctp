<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="societes form large-12 medium-8 columns content">
    <?= $this->Form->create($societe) ?>
    <fieldset>
        <legend><?= __('Ajouter Societe') ?></legend>
        <?php
            echo $this->Form->input('siret');
            echo $this->Form->input('nom');
            echo $this->Form->input('adresse');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
