<nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Personnes'), ['controller' => 'Personnes','action' => 'index']) ?></li>
        <ul class="db_option">
            <li><?= $this->Html->link(__('Add Personne'), ['controller' => 'Personnes','action' => 'add']) ?></li>
        </ul>
        <li><?= $this->Html->link(__('Societes'), ['controller' => 'Societes', 'action' => 'index']) ?></li>
        <ul class="db_option">
            <li><?= $this->Html->link(__('Add Societe'), ['controller' => 'Societes','action' => 'add']) ?></li>
        </ul>
        <hr>
        <li><?= $this->Html->link(__('Parcours'), ['controller' => 'Parcours','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__("Niveau d'etudes"), ['controller' => 'NiveauEtudes','action' => 'index']) ?></li>
        <hr>
<!--        <li><?/*= $this->Html->link(__('JSON File'), ['controller' => 'ListPersonnes','action' => 'index']) */?></li>
-->        <li><?= $this->Html->link(__('Map'), ['controller' => 'Maps','action' => 'index']) ?></li>
    </ul>
</nav>