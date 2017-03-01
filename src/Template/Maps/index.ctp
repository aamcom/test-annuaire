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
        $options = ['20' => 'Moins de 20 ans', '30' => 'De 20 a 30 ans', '40' => 'De 30 a 40 ans', '50' => 'De 40 a 50 ans', '60' => '50 ans et plus'];
        echo $this->Form->select('age', $options, ['empty' => true, 'class' => 'age_range']);
        ?>
    </div>

    <!--AJAX-->
    <script>
        // ------------------- INIT MAP
        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());
        epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
        projectTo = map.getProjectionObject(); //The map projection
        // ------------------- SET CENTER
        var lonLat = new OpenLayers.LonLat( 2.343779 , 48.860193 ).transform(epsg4326, projectTo);
        var zoom=12;
        map.setCenter (lonLat, zoom);
        // ------------------- MARKERS
        var markers = new OpenLayers.Layer.Markers( "Markers" );
        map.addLayer(markers);

        //------------------- AJAX CALL
        $(document).ready(function() {
            $('.age_range').on('change', function() {
                var range = $('.age_range').val();

                $.ajax({
                    url: '/list-personnes/',
                    type: 'GET',
                    success: function(answer){
                        var data = $.parseJSON(answer);
                        var data_filter;

                        for (var i=0; i<data.length; i++) {
                            if(range == 20) {
                                removeMarker();
                                data_filter = data.filter(function (el) {
                                    return calculateAge(el.date_naissance) < 20;
                                });
                            } else if (range == 30) {
                                removeMarker();
                                data_filter = data.filter(function (el) {
                                    return ((calculateAge(el.date_naissance) < 30) && (calculateAge(el.date_naissance) > 20));
                                });
                            } else if (range == 40) {
                                removeMarker();
                                data_filter = data.filter(function (el) {
                                    return ((calculateAge(el.date_naissance) < 40) && (calculateAge(el.date_naissance) > 30));
                                });
                            } else if (range == 50) {
                                removeMarker();
                                data_filter = data.filter(function (el) {
                                    return ((calculateAge(el.date_naissance) < 50) && (calculateAge(el.date_naissance) > 40));
                                });
                            } else if (range == 60) {
                                removeMarker();
                                data_filter = data.filter(function (el) {
                                    return calculateAge(el.date_naissance) > 50;
                                });
                            }
                        }
                        setMarker(data_filter);
                    },
                    error: function(){
                        alert("Erreur d'importation des contacts");
                    }
                });

                function removeMarker() {
                    markers.clearMarkers();
                }

                function setMarker(personne) {
                    for (var i=0; i<personne.length; i++) {
                        var lat = personne[i].latitude;
                        var long = personne[i].longitude;
                        var coordinates = new OpenLayers.LonLat( long , lat ).transform(epsg4326, projectTo);
                        markers.addMarker(new OpenLayers.Marker(coordinates));
                    }
                }
            });


            // CALCULATE AGE FROM BIRTH DATE
            function calculateAge(personnes) {
                var birth = new Date(personnes).getTime();
                var today = Date.now();
                var age = new Date(today - birth);
                var realAge = Math.abs(age.getUTCFullYear() - 1970 );
                return(realAge);
            }
        });
    </script>
</div>