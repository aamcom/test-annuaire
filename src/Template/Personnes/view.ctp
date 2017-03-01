<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="personnes view large-12 medium-12 columns content">
    <div class="large-6 columns">
        <h3><?= $personne->nom ," ", $personne->prenom," -", $personne->id ?></h3>
    </div>
    <div class="large-6 columns">
        <?= $this->Html->image('avatars' . DS . $personne->avatar, array('style' => 'max-height: 150px;')) ?>
    </div>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($personne->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nom') ?></th>
            <td><?= h($personne->nom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenom') ?></th>
            <td><?= h($personne->prenom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adresse') ?></th>
            <td><?= h($personne->adresse) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ville') ?></th>
            <td><?= h($personne->ville) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Niveau Etude') ?></th>
            <td><?= $personne->has('niveau_etude') ? $this->Html->link($personne->niveau_etude->libelle, ['controller' => 'NiveauEtudes', 'action' => 'view', $personne->niveau_etude->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($personne->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Civilite') ?></th>
            <td><?= $this->Number->format($personne->civilite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cp') ?></th>
            <td><?= $this->Number->format($personne->cp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($personne->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($personne->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Naissance') ?></th>
            <td><?= h($personne->date_naissance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permis') ?></th>
            <td><?= $personne->permis ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>

    <h4 style="margin: 40px;"><?= $this->Html->link(__('Edit this Personne'), ['controller' => 'Personnes', 'action' => 'edit', $personne->id]) ?></h4>

    <div class="related">
        <h4><br><?= __('Parcours concernées') ?></h4>
        <?= $this->Html->link(__("Créer un nouveau Parcours"), ['controller' => 'Parcours', 'action' => 'add']) ?>
        <?php if (!empty($personne->parcours)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nom Personne') ?></th>
                <th scope="col"><?= __('Societe ID') ?></th>
                <th scope="col"><?= __('Date Entree') ?></th>
                <th scope="col"><?= __('Date Sortie') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($personne->parcours as $parcours): ?>
            <tr>
                <td><?= h($parcours->id) ?></td>
                <td><?= h($personne->nom) ?></td>
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
