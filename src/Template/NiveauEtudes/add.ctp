<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="niveauEtudes form large-12 medium-12 columns content">
    <?= $this->Form->create($niveauEtude) ?>
    <fieldset>
        <legend><?= __('Créer Niveau Etude') ?></legend>
        <?php
            echo $this->Form->input('libelle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
