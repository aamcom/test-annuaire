<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?/*= __('Actions') */?></li>
        <li><?/*= $this->Html->link(__('Edit Niveau Etude'), ['action' => 'edit', $niveauEtude->id]) */?> </li>
        <li><?/*= $this->Form->postLink(__('Delete Niveau Etude'), ['action' => 'delete', $niveauEtude->id], ['confirm' => __('Are you sure you want to delete # {0}?', $niveauEtude->id)]) */?> </li>
        <li><?/*= $this->Html->link(__('List Niveau Etudes'), ['action' => 'index']) */?> </li>
        <li><?/*= $this->Html->link(__('New Niveau Etude'), ['action' => 'add']) */?> </li>
        <li><?/*= $this->Html->link(__('List Personnes'), ['controller' => 'Personnes', 'action' => 'index']) */?> </li>
        <li><?/*= $this->Html->link(__('New Personne'), ['controller' => 'Personnes', 'action' => 'add']) */?> </li>
    </ul>
</nav>-->
<div class="niveauEtudes view large-12 medium-12 columns content">
    <h3><?= h($niveauEtude->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Libelle') ?></th>
            <td><?= h($niveauEtude->libelle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($niveauEtude->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Personnes concernées') ?></h4>
        <?php if (!empty($niveauEtude->personnes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Civilite') ?></th>
                <th scope="col"><?= __('Nom') ?></th>
                <th scope="col"><?= __('Prenom') ?></th>
                <th scope="col"><?= __('Date Naissance') ?></th>
                <th scope="col"><?= __('Adresse') ?></th>
                <th scope="col"><?= __('Cp') ?></th>
                <th scope="col"><?= __('Ville') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Permis') ?></th>
                <th scope="col"><?= __('Niveau Etude Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($niveauEtude->personnes as $personnes): ?>
            <tr>
                <td><?= h($personnes->id) ?></td>
                <td><?= h($personnes->email) ?></td>
                <td><?= h($personnes->civilite) ?></td>
                <td><?= h($personnes->nom) ?></td>
                <td><?= h($personnes->prenom) ?></td>
                <td><?= h($personnes->date_naissance) ?></td>
                <td><?= h($personnes->adresse) ?></td>
                <td><?= h($personnes->cp) ?></td>
                <td><?= h($personnes->ville) ?></td>
                <td><?= h($personnes->photo) ?></td>
                <td><?= h($personnes->permis) ?></td>
                <td><?= h($personnes->niveau_etude_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Personnes', 'action' => 'view', $personnes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Personnes', 'action' => 'edit', $personnes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Personnes', 'action' => 'delete', $personnes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personnes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
