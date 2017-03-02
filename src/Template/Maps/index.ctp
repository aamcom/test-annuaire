<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="personnes index large-12 medium-8 columns content">
    <h4><?= __('Map') ?></h4>

    <!--OPEN STREET MAP DE MERDE-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>

    <div id="map" style="height:500px; margin-bottom: 40px !important;"></div>

    <div class="large-6 columns">
        <h4>Rang d'ages :</h4>
        <?php
        $options = ['0' => 'Sans filtre','20' => 'Moins de 20 ans', '30' => 'De 20 a 30 ans', '40' => 'De 30 a 40 ans', '50' => 'De 40 a 50 ans', '60' => '50 ans et plus'];
        echo $this->Form->select('age', $options, ['empty' => " ", 'class' => 'age_range']);
        ?>
    </div>

    <!--AJAX-->
    <?php echo $this->Html->script('map') ?>
</div>