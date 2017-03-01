<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="parcours view large-12 medium-8 columns content">
    <h3><?= h($parcour->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Personne') ?></th>
            <td><?= $parcour->has('personne') ? $this->Html->link($parcour->personne->id, ['controller' => 'Personnes', 'action' => 'view', $parcour->personne->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Societe') ?></th>
            <td><?= $parcour->has('societe') ? $this->Html->link($parcour->societe->id, ['controller' => 'Societes', 'action' => 'view', $parcour->societe->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($parcour->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Entree') ?></th>
            <td><?= h($parcour->date_entree) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Sortie') ?></th>
            <td><?= h($parcour->date_sortie) ?></td>
        </tr>
    </table>
</div>
