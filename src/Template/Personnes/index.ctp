<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="personnes index large-12 medium-8 columns content">
    <h3><?= __('Personnes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('civilite') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_naissance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adresse') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ville') ?></th>
                <th scope="col"><?= $this->Paginator->sort('permis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('niveau_etude_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personnes as $personne): ?>
            <tr>
                <td><?= $this->Html->image('avatars' . DS . $personne->avatar, array('style' => 'max-height: 150px;'))?></td>
                <td><?= $this->Number->format($personne->id) ?></td>
                <td><?= h($personne->email) ?></td>
                <td><?= $this->Number->format($personne->civilite) ?></td>
                <td><?= h($personne->nom) ?></td>
                <td><?= h($personne->prenom) ?></td>
                <td><?= h($personne->date_naissance) ?></td>
                <td><?= h($personne->adresse) ?></td>
                <td><?= $this->Number->format($personne->cp) ?></td>
                <td><?= h($personne->ville) ?></td>
                <td><?= h($personne->permis) ?></td>
                <td><?= $personne->has('niveau_etude') ? $this->Html->link($personne->niveau_etude->libelle, ['controller' => 'NiveauEtudes', 'action' => 'view', $personne->niveau_etude->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $personne->id]) ?><br>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personne->id]) ?><br>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personne->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personne->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

</div>
