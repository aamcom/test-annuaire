<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="personnes index large-12 medium-8 columns content">
    <h4><?= __('Map') ?></h4>

    <!--OPEN STREET MAP DE MERDE-->
    <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
    <div id="map" style="height:500px"></div>

    <script>


        // INIT MAP
        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());
        epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
        projectTo = map.getProjectionObject(); //The map projection

        //SET CENTER
        var lonLat = new OpenLayers.LonLat( 2.343779 , 48.860193 ).transform(epsg4326, projectTo);
        map.setCenter (lonLat, zoom);
        var zoom=14;

        //MARKERS
        var markers = new OpenLayers.Layer.Markers( "Markers" );
        map.addLayer(markers);

        markers.addMarker(new OpenLayers.Marker(lonLat));
    </script>
</div>