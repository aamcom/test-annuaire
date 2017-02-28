<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="personnes form large-12 medium-8 columns content">
    <?= $this->Form->create($personne, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Ajouter Personne') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('civilite', array('options' => [1 => 'Femme', 2 => 'Homme']));
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('date_naissance', array('minYear' => '1900', 'maxYear' => '2017'));
            echo $this->Form->input('adresse');
            echo $this->Form->input('cp');
            echo $this->Form->input('ville');
            echo $this->Form->input('avatar', array('label' => 'Votre avatar', 'type' => 'file'));
            echo $this->Form->input('permis');
            echo $this->Form->input('niveau_etude_id', ['options' => $niveauEtudes, 'empty' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
