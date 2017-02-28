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
    <div id="map" style="height:500px"></div>

    <!--AJAX-->
    <script>
        // INIT MAP
        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());
        epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
        projectTo = map.getProjectionObject(); //The map projection

        //SET CENTER
        var lonLat = new OpenLayers.LonLat( 2.343779 , 48.860193 ).transform(epsg4326, projectTo);
        var zoom=12;
        map.setCenter (lonLat, zoom);

        //MARKERS
        var markers = new OpenLayers.Layer.Markers( "Markers" );
        map.addLayer(markers);

        //AJAX CALL
        $(document).ready(function() {
            $.ajax({
                url: '/list-personnes/',
                type: 'GET',
                success: function(answer){
                    var data = $.parseJSON(answer);
 /*                   var data2 = data.filter(function (el) {
                       return el.civilite > 1;
                    });
                    console.log(data2)*/
                    setMarker(data);
                },
                error: function(){
                    alert("Erreur d'importation des contacts");
                }
            });

            // MARKERS
            function setMarker(personnes) {
                for (var i=0; i<personnes.length; i++) {
                    var lat = personnes[i].latitude;
                    var long = personnes[i].longitude;
                    var coordinates = new OpenLayers.LonLat( long , lat ).transform(epsg4326, projectTo);
                    markers.addMarker(new OpenLayers.Marker(coordinates));
                }
            }
        });
    </script>
</div>